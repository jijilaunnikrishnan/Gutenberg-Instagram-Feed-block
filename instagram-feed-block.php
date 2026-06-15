<?php
/**
 * Plugin Name: Instagram Feed Block
 * Description: Simple Gutenberg block to display Instagram feed.
 * Version: 1.0
 * Author: Jijila
 */

 if (!defined('ABSPATH')) {
    exit;
}

/**
 * Render callback for the block
 */
function ifb_render_instagram_feed_block($attributes) {

    $profile_url = isset($attributes['profileUrl'])
        ? esc_url($attributes['profileUrl'])
        : '';

    $output = '<div class="instagram-feed-block">';

    $output .= '<h3>Instagram Feed</h3>';

    if (!empty($profile_url)) {
        $output .= '<p>';
        $output .= '<a href="' . $profile_url . '" target="_blank" rel="noopener noreferrer">';
        $output .= 'View Instagram Profile';
        $output .= '</a>';
        $output .= '</p>';
    } else {
        $output .= '<p>No Instagram profile URL provided.</p>';
    }

    // Placeholder for future embed / API feed integration
    $output .= '<div class="instagram-feed-placeholder">';
    $output .= '<p>Instagram posts will appear here.</p>';
    $output .= '</div>';

    $output .= '</div>';

    return $output;
}

/**
 * Register block
 */
function ifb_register_instagram_feed_block() {

    register_block_type(__DIR__, [
        'render_callback' => 'ifb_render_instagram_feed_block',
    ]);
}

add_action('init', 'ifb_register_instagram_feed_block');