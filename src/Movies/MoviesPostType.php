<?php

namespace AmirSasani\RealtynaTest\Movies;

class MoviesPostType
{
    private string $SLUG = "movies";

    public function __construct()
    {
        // register Movies post type
        register_post_type($this->SLUG, $this->registerArgs());

        // register Genres
        $genresTaxonomy = new GenresTaxonomy($this->SLUG);
    }

    public function registerArgs(): array
    {
        /**
         * Post Type: Movies.
         */

        $labels = [
            "name" => esc_html__("Movies", "realtyna-test"),
            "singular_name" => esc_html__("Movie", "realtyna-test"),
            "menu_name" => esc_html__("My Movies", "realtyna-test"),
            "all_items" => esc_html__("All Movies", "realtyna-test"),
            "add_new" => esc_html__("Add new", "realtyna-test"),
            "add_new_item" => esc_html__("Add new Movie", "realtyna-test"),
            "edit_item" => esc_html__("Edit Movie", "realtyna-test"),
            "new_item" => esc_html__("New Movie", "realtyna-test"),
            "view_item" => esc_html__("View Movie", "realtyna-test"),
            "view_items" => esc_html__("View Movies", "realtyna-test"),
            "search_items" => esc_html__("Search Movies", "realtyna-test"),
            "not_found" => esc_html__("No Movies found", "realtyna-test"),
            "not_found_in_trash" => esc_html__("No Movies found in trash", "realtyna-test"),
            "parent" => esc_html__("Parent Movie:", "realtyna-test"),
            "featured_image" => esc_html__("Featured image for this Movie", "realtyna-test"),
            "set_featured_image" => esc_html__("Set featured image for this Movie", "realtyna-test"),
            "remove_featured_image" => esc_html__("Remove featured image for this Movie", "realtyna-test"),
            "use_featured_image" => esc_html__("Use as featured image for this Movie", "realtyna-test"),
            "archives" => esc_html__("Movie archives", "realtyna-test"),
            "insert_into_item" => esc_html__("Insert into Movie", "realtyna-test"),
            "uploaded_to_this_item" => esc_html__("Upload to this Movie", "realtyna-test"),
            "filter_items_list" => esc_html__("Filter Movies list", "realtyna-test"),
            "items_list_navigation" => esc_html__("Movies list navigation", "realtyna-test"),
            "items_list" => esc_html__("Movies list", "realtyna-test"),
            "attributes" => esc_html__("Movies attributes", "realtyna-test"),
            "name_admin_bar" => esc_html__("Movie", "realtyna-test"),
            "item_published" => esc_html__("Movie published", "realtyna-test"),
            "item_published_privately" => esc_html__("Movie published privately.", "realtyna-test"),
            "item_reverted_to_draft" => esc_html__("Movie reverted to draft.", "realtyna-test"),
            "item_scheduled" => esc_html__("Movie scheduled", "realtyna-test"),
            "item_updated" => esc_html__("Movie updated.", "realtyna-test"),
            "parent_item_colon" => esc_html__("Parent Movie:", "realtyna-test"),
        ];

        $args = [
            "label" => esc_html__("Movies", "realtyna-test"),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => true,
            "rewrite" => ["slug" => $this->SLUG, "with_front" => true],
            "query_var" => true,
            "menu_icon" => "dashicons-media-video",
            "supports" => ["title", "editor", "thumbnail", "excerpt"],
            "taxonomies" => ["post_tag"],
            "show_in_graphql" => false,
        ];

        return $args;
    }
}