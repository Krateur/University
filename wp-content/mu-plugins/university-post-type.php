<?php
declare(strict_types=1);

function university_post_types() {
    register_post_type('event', [
        'supports' => ['editor', 'title', 'excerpt'],
        'rewrite' => [
            'slug' => 'event'
        ],
        'has_archive' => true,
        'public' => true,
        'labels' => [
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ],
        'menu_icon' => 'dashicons-calendar'
    ]);
}
add_action('init', 'university_post_types');