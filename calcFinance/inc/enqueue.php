<?php
/**
 * CalcFinance Enqueue Scripts & Styles
 *
 * @package CalcFinance
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', 'calcfinance_enqueue_scripts');

if (!function_exists('calcfinance_enqueue_scripts')) :
function calcfinance_enqueue_scripts() {
    
    // Google Fonts - Inter
    wp_enqueue_style(
        'calcfinance-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',
        array(),
        null
    );
    
    // Font Awesome
    wp_enqueue_style(
        'calcfinance-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );
    
    // Main theme stylesheet
    wp_enqueue_style(
        'calcfinance-style',
        CALCFINANCE_URI . '/style.css',
        array(),
        CALCFINANCE_VERSION
    );
    
    // Main JavaScript
    wp_enqueue_script(
        'calcfinance-main',
        CALCFINANCE_URI . '/assets/js/main.js',
        array(),
        CALCFINANCE_VERSION,
        true
    );
    
    // Calculator JavaScript (only on calculator pages)
    if (is_page_template('template-calculator.php') || 
        is_page_template('calculators/template-mortgage.php') ||
        is_page_template('calculators/template-emi.php') ||
        is_page_template('calculators/template-loan.php') ||
        is_page_template('calculators/template-savings.php') ||
        is_page_template('calculators/template-credit-score.php')) {
        wp_enqueue_script(
            'calcfinance-calculators',
            CALCFINANCE_URI . '/assets/js/calculators.js',
            array(),
            CALCFINANCE_VERSION,
            true
        );
    }
    
    // Pass AJAX URL to JavaScript
    wp_localize_script('calcfinance-main', 'calcfinanceAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('calcfinance_nonce'),
    ));
    
    // Comment reply script on singular posts
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
endif;

/**
 * Admin styles
 */
add_action('admin_enqueue_scripts', function($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_style(
            'calcfinance-admin',
            CALCFINANCE_URI . '/assets/css/admin.css',
            array(),
            CALCFINANCE_VERSION
        );
    }
});
