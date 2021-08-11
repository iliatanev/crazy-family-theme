<?php

function family_post_types() {

    // Campus post type
    register_post_type( 'campus', array(
        'supports' => array( 'title','editor' , 'excerpt' ),
        'rewrite' => array( 'slug' => 'campus' ),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name'=> 'Campuses',
            'add_new_item' => 'Add New Campus',
            'edit_item' => 'Edit Campus',
            'all_items' => 'All Campuses',
            'view_item' => 'View Campus'
        ),
        'menu_icon' => 'dashicons-location-alt'
    ));

    // Events post type
    register_post_type( 'event', array(
        'supports' => array( 'title','editor' , 'excerpt' ),
        'rewrite' => array( 'slug' => 'events' ),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name'=> 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events'
        ),
        'menu_icon' => 'dashicons-wordpress'
    ));

    // Programs post type
    register_post_type( 'program', array(
        'supports' => array( 'title','editor' , 'excerpt' ),
        'rewrite' => array( 'slug' => 'programs' ),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name'=> 'Programs',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs'
        ),
        'menu_icon' => 'dashicons-awards'
    ));


    // Members post type
    register_post_type( 'member', array(
        'supports' => array( 'title','editor' , 'excerpt', 'thumbnail' ),
        'public' => true,
        'labels' => array(
            'name'=> 'Members',
            'add_new_item' => 'Add New Member',
            'edit_item' => 'Edit Member',
            'all_items' => 'All Members'
        ),
        'menu_icon' => 'dashicons-welcome-learn-more'
    ));
}

add_action( 'init', 'family_post_types' );