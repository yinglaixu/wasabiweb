<?php
/**
 * Remove Meta generator tag in meta head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Remove RSD and Manifest in meta head
 */
function removeHeadLinks()
{
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');

/**
 * Add Custom header support
 */
$customHeader = array(
    'random-default' => false,
    'header-text' => false,
    'uploads' => true
);
add_theme_support('custom-header', $customHeader);
