<?php

namespace AmirSasani\RealtynaTest\Taxonomies;

class GenresTaxonomy
{
    private string $SLUG = "genres";

    public function __construct(string $moviesSlug)
    {
        // register Genres taxonomy
        register_taxonomy($this->SLUG, [$moviesSlug], $this->registerArgs());
    }

    public function registerArgs(): array
    {
        /**
         * Taxonomy: Taxonomies.
         */

        $labels = [
            "name" => esc_html__("Taxonomies", "realtyna-test"),
            "singular_name" => esc_html__("Genre", "realtyna-test"),
            "menu_name" => esc_html__("Taxonomies", "realtyna-test"),
            "all_items" => esc_html__("All Taxonomies", "realtyna-test"),
            "edit_item" => esc_html__("Edit Genre", "realtyna-test"),
            "view_item" => esc_html__("View Genre", "realtyna-test"),
            "update_item" => esc_html__("Update Genre name", "realtyna-test"),
            "add_new_item" => esc_html__("Add new Genre", "realtyna-test"),
            "new_item_name" => esc_html__("New Genre name", "realtyna-test"),
            "parent_item" => esc_html__("Parent Genre", "realtyna-test"),
            "parent_item_colon" => esc_html__("Parent Genre:", "realtyna-test"),
            "search_items" => esc_html__("Search Taxonomies", "realtyna-test"),
            "popular_items" => esc_html__("Popular Taxonomies", "realtyna-test"),
            "separate_items_with_commas" => esc_html__("Separate Taxonomies with commas", "realtyna-test"),
            "add_or_remove_items" => esc_html__("Add or remove Taxonomies", "realtyna-test"),
            "choose_from_most_used" => esc_html__("Choose from the most used Taxonomies", "realtyna-test"),
            "not_found" => esc_html__("No Taxonomies found", "realtyna-test"),
            "no_terms" => esc_html__("No Taxonomies", "realtyna-test"),
            "items_list_navigation" => esc_html__("Taxonomies list navigation", "realtyna-test"),
            "items_list" => esc_html__("Taxonomies list", "realtyna-test"),
            "back_to_items" => esc_html__("Back to Taxonomies", "realtyna-test"),
            "name_field_description" => esc_html__("The name is how it appears on your site.", "realtyna-test"),
            "parent_field_description" => esc_html__("Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "realtyna-test"),
            "slug_field_description" => esc_html__("The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "realtyna-test"),
            "desc_field_description" => esc_html__("The description is not prominent by default; however, some themes may show it.", "realtyna-test"),
        ];

        $args = [
            "label" => esc_html__("Taxonomies", "realtyna-test"),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => ['slug' => $this->SLUG, 'with_front' => true,],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => $this->SLUG,
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];

        return $args;
    }
}