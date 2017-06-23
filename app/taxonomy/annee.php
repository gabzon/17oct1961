<?php
if ( ! function_exists( 'annee_taxonomy' ) ) {

    // Register Custom Taxonomy
    function annee_taxonomy() {

        $labels = array(
            'name'                       => _x( 'annees', 'Taxonomy General Name', 'sage' ),
            'singular_name'              => _x( 'annee', 'Taxonomy Singular Name', 'sage' ),
            'menu_name'                  => __( 'Annees', 'sage' ),
            'all_items'                  => __( 'All annees', 'sage' ),
            'parent_item'                => __( 'Parent annee', 'sage' ),
            'parent_item_colon'          => __( 'Parent annee:', 'sage' ),
            'new_item_name'              => __( 'New annee Name', 'sage' ),
            'add_new_item'               => __( 'Add New annee', 'sage' ),
            'edit_item'                  => __( 'Edit annee', 'sage' ),
            'update_item'                => __( 'Update annee', 'sage' ),
            'view_item'                  => __( 'View annee', 'sage' ),
            'separate_items_with_commas' => __( 'Separate annees with commas', 'sage' ),
            'add_or_remove_items'        => __( 'Add or remove annees', 'sage' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
            'popular_items'              => __( 'Popular annees', 'sage' ),
            'search_items'               => __( 'Search annee', 'sage' ),
            'not_found'                  => __( 'Not Found', 'sage' ),
            'no_terms'                   => __( 'No annees', 'sage' ),
            'items_list'                 => __( 'annee list', 'sage' ),
            'items_list_navigation'      => __( 'annees list navigation', 'sage' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
        );
        register_taxonomy( 'annee', array( 'post', ' jetpack-portfolio' ), $args );

    }
    add_action( 'init', 'annee_taxonomy', 0 );

}
?>
