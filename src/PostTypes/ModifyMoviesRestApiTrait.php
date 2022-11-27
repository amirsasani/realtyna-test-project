<?php

namespace AmirSasani\RealtynaTest\PostTypes;

use WP_REST_Request;
use WP_REST_Response;

trait ModifyMoviesRestApiTrait
{
    public function modifyMoviesRestApi()
    {
        // modify WordPress core rest api for post types
        add_filter('rest_request_after_callbacks', [$this, 'moviesRestAfterRequestCallback'], 10, 3);
    }

    public function moviesRestAfterRequestCallback($response, array $handler, WP_REST_Request $request)
    {
        if ($this->isMoviesRequest($request)) {
            $this->modifyMoviesRestResponse($response);
        }
        return $response;
    }

    public function isMoviesRequest(WP_REST_Request $request)
    {
        return $request->get_route() === "/wp/v2/{$this->SLUG}" && $request->get_method() === 'GET';
    }

    public function modifyMoviesRestResponse($response)
    {
        if (!($response instanceof WP_REST_Response)) {
            return;
        }

        $data = $response->get_data();
        $data = array_map([$this, 'modifyTagsInMoviesRestApi'], $data);
        $data = array_map([$this, 'modifyGenresInMoviesRestApi'], $data);
        $data = array_map([$this, 'modifyFeaturedMediaInMoviesRestApi'], $data);

        $response->set_data($data);
    }

    public function modifyTagsInMoviesRestApi(array $post)
    {
        if (isset($post['tags'])) {
            $tags = [];
            foreach ($post['tags'] as $tag_id) {
                $tags[] = $tag = get_term_by('id', $tag_id, 'post_tag');
            }
            $post['tags'] = $tags;
        }

        return $post;
    }

    public function modifyGenresInMoviesRestApi(array $post)
    {
        if (isset($post['genres'])) {
            $genres = [];
            foreach ($post['genres'] as $genre_id) {
                $genres[] = $tag = get_term_by('id', $genre_id, 'genres');
            }
            $post['genres'] = $genres;
        }

        return $post;
    }

    public function modifyFeaturedMediaInMoviesRestApi(array $post)
    {
        if (isset($post['featured_media'])) {
            $post['featured_media'] =wp_get_attachment_url($post['featured_media']);
        }

        return $post;
    }
}