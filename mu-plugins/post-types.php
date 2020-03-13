<?php

function scill_post_types() {
    register_post_type('event', array(
        'supports' => array('title', 'editor', 'excerpt'),
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_item' => 'Event'
         )
        ));
}

add_action('init', 'scill_post_types');