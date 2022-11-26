<?php

namespace AmirSasani\RealtynaTest\Movies;

class TagsTaxonomy
{
    private string $SLUG = "tags";

    public function __construct(string $moviesSlug)
    {
        // register Tags taxonomy
        register_taxonomy($this->SLUG, [$moviesSlug], $this->registerArgs());
    }

    public function registerArgs(): array
    {
        /**
         * Taxonomy: Tags.
         */

        $labels = [
            "name" => esc_html__("Tags", "realtyna-test"),
            "singular_name" => esc_html__("Tag", "realtyna-test"),
            "menu_name" => esc_html__("Tags", "realtyna-test"),
            "all_items" => esc_html__("All Tags", "realtyna-test"),
            "edit_item" => esc_html__("Edit Tag", "realtyna-test"),
            "view_item" => esc_html__("View Tag", "realtyna-test"),
            "update_item" => esc_html__("Update Tag name", "realtyna-test"),
            "add_new_item" => esc_html__("Add new Tag", "realtyna-test"),
            "new_item_name" => esc_html__("New Tag name", "realtyna-test"),
            "parent_item" => esc_html__("Parent Tag", "realtyna-test"),
            "parent_item_colon" => esc_html__("Parent Tag:", "realtyna-test"),
            "search_items" => esc_html__("Search Tags", "realtyna-test"),
            "popular_items" => esc_html__("Popular Tags", "realtyna-test"),
            "separate_items_with_commas" => esc_html__("Separate Tags with commas", "realtyna-test"),
            "add_or_remove_items" => esc_html__("Add or remove Tags", "realtyna-test"),
            "choose_from_most_used" => esc_html__("Choose from the most used Tags", "realtyna-test"),
            "not_found" => esc_html__("No Tags found", "realtyna-test"),
            "no_terms" => esc_html__("No Tags", "realtyna-test"),
            "items_list_navigation" => esc_html__("Tags list navigation", "realtyna-test"),
            "items_list" => esc_html__("Tags list", "realtyna-test"),
            "back_to_items" => esc_html__("Back to Tags", "realtyna-test"),
            "name_field_description" => esc_html__("The name is how it appears on your site.", "realtyna-test"),
            "parent_field_description" => esc_html__("Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "realtyna-test"),
            "slug_field_description" => esc_html__("The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "realtyna-test"),
            "desc_field_description" => esc_html__("The description is not prominent by default; however, some themes may show it.", "realtyna-test"),
        ];

        $args = [
            "label" => esc_html__("Tags", "realtyna-test"),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => false,
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