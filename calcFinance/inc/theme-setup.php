<?php
/**
 * CalcFinance Theme Setup
 *
 * @package CalcFinance
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', 'calcfinance_setup');

if (!function_exists('calcfinance_setup')) :
function calcfinance_setup() {
    
    /**
     * Make theme available for translation
     */
    load_theme_textdomain('calcfinance', CALCFINANCE_DIR . '/languages');
    
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support('automatic-feed-links');
    
    /**
     * Let WordPress manage the document title
     */
    add_theme_support('title-tag');
    
    /**
     * Enable post thumbnails
     */
    add_theme_support('post-thumbnails');
    
    /**
     * Custom logo support
     */
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    
    /**
     * HTML5 markup support
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ))
    ;
    
    /**
     * Responsive embeds
     */
    add_theme_support('responsive-embeds');
    
    /**
     * Block editor styles
     */
    add_theme_support('editor-styles');
    
    /**
     * Wide alignment
     */
    add_theme_support('align-wide');
    
    /**
     * WooCommerce support (optional)
     */
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    /**
     * Register Navigation Menus
     */
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'calcfinance'),
        'footer'  => esc_html__('Footer Menu', 'calcfinance'),
        'mobile'  => esc_html__('Mobile Menu', 'calcfinance'),
    ))
    ;
    
    /**
     * Custom image sizes
     */
    add_image_size('calcfinance-card', 600, 375, true);
    add_image_size('calcfinance-featured', 1200, 600, true);
    add_image_size('calcfinance-thumb', 300, 200, true);
    add_image_size('calcfinance-hero', 800, 600, true);
    
    /**
     * Add theme support for selective refresh in widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
    
}
endif;
