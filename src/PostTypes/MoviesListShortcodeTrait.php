<?php

namespace AmirSasani\RealtynaTest\PostTypes;

trait MoviesListShortcodeTrait
{
    public function initializeMoviesListShortcode()
    {
        add_action('wp_enqueue_scripts', [$this, 'registerMoviesListShortcodeStyle']);
        add_shortcode('movies-list', [$this, 'moviesListShortcodeCallback']);
    }

    public function registerMoviesListShortcodeStyle()
    {
        wp_register_style('movies-list-shortcode-style', plugins_url('/assets/css/movies_list_shortcode.css', dirname(__DIR__)), [], '1.0.0');
    }

    public function moviesListShortcodeCallback($atts, $content, $tag)
    {
        $default_posts_per_page = get_option('posts_per_page');

        extract(shortcode_atts([
            'posts' => $default_posts_per_page,
        ], $atts));

        query_posts(['orderby' => 'date', 'order' => 'DESC', 'post_type' => 'movies', 'showposts' => $posts]);


        wp_enqueue_style('movies-list-shortcode-style');

        $return_string = '<div class="moviesListShortcodeContainer">';
        if (have_posts()) :
            while (have_posts()) : the_post();
                $return_string .= '<a href="' . get_permalink() . '" class="moviesListShortcode__item">';

                if (has_post_thumbnail()) {
                    $return_string .= get_the_post_thumbnail();
                } else {
                    $return_string .= '<img src="' . plugins_url('/assets/images/placeholder.png', dirname(__DIR__)) . '">';
                }
                $return_string .= '<p>' . get_the_title() . '</p>';

                $return_string .= '</a>';
            endwhile;
        endif;
        $return_string .= '</div>';

        wp_reset_query();
        return $return_string;
    }
}