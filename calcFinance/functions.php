<?php
/**
 * CalcFinance Theme Functions
 *
 * @package CalcFinance
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('CALCFINANCE_VERSION', '1.0.0');
define('CALCFINANCE_DIR', get_template_directory());
define('CALCFINANCE_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
require_once CALCFINANCE_DIR . '/inc/theme-setup.php';

/**
 * Enqueue Scripts & Styles
 */
require_once CALCFINANCE_DIR . '/inc/enqueue.php';

/**
 * Customizer Options
 */
require_once CALCFINANCE_DIR . '/inc/customizer.php';

/**
 * Widget Areas
 */
require_once CALCFINANCE_DIR . '/inc/widgets.php';

/**
 * SEO Functions
 */
require_once CALCFINANCE_DIR . '/inc/seo.php';

/**
 * Custom Post Types
 */
require_once CALCFINANCE_DIR . '/inc/post-types.php';

/**
 * Helper: Get post reading time
 */
if (!function_exists('calcfinance_reading_time')) :
function calcfinance_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return $reading_time;
}
endif;

/**
 * Helper: Get post view count
 */
if (!function_exists('calcfinance_get_views')) :
function calcfinance_get_views($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $views = get_post_meta($post_id, '_calcfinance_views', true);
    return $views ? absint($views) : 0;
}
endif;

/**
 * Helper: Set post view count
 */
if (!function_exists('calcfinance_set_views')) :
function calcfinance_set_views($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    if (is_single() && !is_user_logged_in()) {
        $views = calcfinance_get_views($post_id);
        $views++;
        update_post_meta($post_id, '_calcfinance_views', $views);
    }
}
add_action('wp', 'calcfinance_set_views');
endif;

/**
 * Helper: Format number with commas
 */
if (!function_exists('calcfinance_format_number')) :
function calcfinance_format_number($number) {
    return number_format_i18n($number);
}
endif;

/**
 * Helper: Get formatted date
 */
if (!function_exists('calcfinance_post_date')) :
function calcfinance_post_date() {
    return get_the_date('M j, Y');
}
endif;

/**
 * Helper: Get category with link
 */
if (!function_exists('calcfinance_post_category')) :
function calcfinance_post_category() {
    $categories = get_the_category();
    if (!empty($categories)) {
        $cat = $categories[0];
        return '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="badge badge-primary">' . esc_html($cat->name) . '</a>';
    }
    return '';
}
endif;

/**
 * Helper: Truncate excerpt
 */
if (!function_exists('calcfinance_excerpt')) :
function calcfinance_excerpt($length = 20) {
    $excerpt = get_the_excerpt();
    if (empty($excerpt)) {
        $excerpt = wp_trim_words(get_the_content(), $length, '...');
    } else {
        $excerpt = wp_trim_words($excerpt, $length, '...');
    }
    return $excerpt;
}
endif;

/**
 * Add custom image sizes
 */
add_action('after_setup_theme', function() {
    add_image_size('calcfinance-card', 600, 375, true);
    add_image_size('calcfinance-featured', 1200, 600, true);
    add_image_size('calcfinance-thumb', 300, 200, true);
});

/**
 * Custom excerpt length
 */
add_filter('excerpt_length', function($length) {
    return 25;
});

/**
 * Custom excerpt more
 */
add_filter('excerpt_more', function($more) {
    return '...';
});

/**
 * Add reading time to post content
 */
add_filter('the_content', function($content) {
    if (is_single() && in_the_loop() && is_main_query()) {
        // Reading time is shown in template
    }
    return $content;
});

/**
 * Disable WordPress default gallery styles
 */
add_filter('use_default_gallery_style', '__return_false');

/**
 * Add responsive embeds
 */
add_theme_support('responsive-embeds');

/**
 * Add HTML5 support
 */
add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
));

/**
 * Custom body classes
 */
add_filter('body_class', function($classes) {
    if (is_singular()) {
        $classes[] = 'singular';
    }
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }
    return $classes;
});

/**
 * Add defer attribute to scripts
 */
add_filter('script_loader_tag', function($tag, $handle) {
    $defer_handles = array('calcfinance-main');
    if (in_array($handle, $defer_handles)) {
        return str_replace(' src=', ' defer src=', $tag);
    }
    return $tag;
}, 10, 2);

/**
 * Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Clean up head
 */
add_action('init', function() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
});

/**
 * Custom login logo URL
 */
add_filter('login_headerurl', function() {
    return home_url('/');
});

/**
 * Custom login logo title
 */
add_filter('login_headertext', function() {
    return get_bloginfo('name');
});

/**
 * Add editor styles
 */
add_action('admin_init', function() {
    add_editor_style('assets/css/editor-style.css');
});

/**
 * Disable emojis for performance
 */
add_action('init', function() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', function($plugins) {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        }
        return array();
    });
});

/**
 * Disable embeds for performance
 */
add_action('init', function() {
    wp_deregister_script('wp-embed');
}, 100);

/**
 * Limit post revisions
 */
if (!defined('WP_POST_REVISIONS')) {
    define('WP_POST_REVISIONS', 5);
}

/**
 * Autosave interval
 */
if (!defined('AUTOSAVE_INTERVAL')) {
    define('AUTOSAVE_INTERVAL', 120);
}

/**
 * Add async to certain scripts
 */
add_filter('script_loader_tag', function($tag, $handle) {
    $async_scripts = array(
        'calcfinance-fontawesome',
    );
    if (in_array($handle, $async_scripts)) {
        return str_replace(' src=', ' async src=', $tag);
    }
    return $tag;
}, 10, 2);
