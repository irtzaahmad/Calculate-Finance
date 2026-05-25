<?php
/**
 * CalcFinance Customizer
 *
 * @package CalcFinance
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('customize_register', 'calcfinance_customize_register');

if (!function_exists('calcfinance_customize_register')) :
function calcfinance_customize_register($wp_customize) {
    
    // ============================================
    // Theme Settings Panel
    // ============================================
    $wp_customize->add_panel('calcfinance_settings', array(
        'title'    => esc_html__('CalcFinance Settings', 'calcfinance'),
        'priority' => 30,
    ));
    
    // ============================================
    // Hero Section
    // ============================================
    $wp_customize->add_section('calcfinance_hero', array(
        'title' => esc_html__('Hero Section', 'calcfinance'),
        'panel' => 'calcfinance_settings',
    ));
    
    // Hero Title
    $wp_customize->add_setting('calcfinance_hero_title', array(
        'default'           => 'Smart Financial Decisions Start Here',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('calcfinance_hero_title', array(
        'label'   => esc_html__('Hero Title', 'calcfinance'),
        'section' => 'calcfinance_hero',
        'type'    => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('calcfinance_hero_subtitle', array(
        'default'           => 'Compare financial products, calculate costs and discover smarter money strategies.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('calcfinance_hero_subtitle', array(
        'label'   => esc_html__('Hero Subtitle', 'calcfinance'),
        'section' => 'calcfinance_hero',
        'type'    => 'textarea',
    ));
    
    // Hero Button 1 Text
    $wp_customize->add_setting('calcfinance_hero_btn1_text', array(
        'default'           => 'Explore Guides',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('calcfinance_hero_btn1_text', array(
        'label'   => esc_html__('Button 1 Text', 'calcfinance'),
        'section' => 'calcfinance_hero',
        'type'    => 'text',
    ));
    
    // Hero Button 1 URL
    $wp_customize->add_setting('calcfinance_hero_btn1_url', array(
        'default'           => '#articles',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('calcfinance_hero_btn1_url', array(
        'label'   => esc_html__('Button 1 URL', 'calcfinance'),
        'section' => 'calcfinance_hero',
        'type'    => 'url',
    ));
    
    // Hero Button 2 Text
    $wp_customize->add_setting('calcfinance_hero_btn2_text', array(
        'default'           => 'Use Calculators',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('calcfinance_hero_btn2_text', array(
        'label'   => esc_html__('Button 2 Text', 'calcfinance'),
        'section' => 'calcfinance_hero',
        'type'    => 'text',
    ));
    
    // Hero Button 2 URL
    $wp_customize->add_setting('calcfinance_hero_btn2_url', array(
        'default'           => '#calculators',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('calcfinance_hero_btn2_url', array(
        'label'   => esc_html__('Button 2 URL', 'calcfinance'),
        'section' => 'calcfinance_hero',
        'type'    => 'url',
    ));
    
    // Hero Image
    $wp_customize->add_setting('calcfinance_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'calcfinance_hero_image', array(
        'label'   => esc_html__('Hero Image', 'calcfinance'),
        'section' => 'calcfinance_hero',
    )));
    
    // Show Hero
    $wp_customize->add_setting('calcfinance_show_hero', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('calcfinance_show_hero', array(
        'label'   => esc_html__('Show Hero Section', 'calcfinance'),
        'section' => 'calcfinance_hero',
        'type'    => 'checkbox',
    ));
    
    // ============================================
    // Newsletter Section
    // ============================================
    $wp_customize->add_section('calcfinance_newsletter', array(
        'title' => esc_html__('Newsletter Section', 'calcfinance'),
        'panel' => 'calcfinance_settings',
    ));
    
    $wp_customize->add_setting('calcfinance_newsletter_title', array(
        'default'           => 'Get Smart Financial Insights',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('calcfinance_newsletter_title', array(
        'label'   => esc_html__('Newsletter Title', 'calcfinance'),
        'section' => 'calcfinance_newsletter',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('calcfinance_newsletter_desc', array(
        'default'           => 'Join 50,000+ subscribers getting weekly money tips, guides, and exclusive offers.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('calcfinance_newsletter_desc', array(
        'label'   => esc_html__('Newsletter Description', 'calcfinance'),
        'section' => 'calcfinance_newsletter',
        'type'    => 'textarea',
    ));
    
    $wp_customize->add_setting('calcfinance_newsletter_form', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('calcfinance_newsletter_form', array(
        'label'       => esc_html__('Newsletter Form Shortcode', 'calcfinance'),
        'description' => esc_html__('Paste your email service shortcode here (e.g., Mailchimp, ConvertKit)', 'calcfinance'),
        'section'     => 'calcfinance_newsletter',
        'type'        => 'textarea',
    ));
    
    $wp_customize->add_setting('calcfinance_show_newsletter', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('calcfinance_show_newsletter', array(
        'label'   => esc_html__('Show Newsletter Section', 'calcfinance'),
        'section' => 'calcfinance_newsletter',
        'type'    => 'checkbox',
    ));
    
    // ============================================
    // Footer Settings
    // ============================================
    $wp_customize->add_section('calcfinance_footer', array(
        'title' => esc_html__('Footer Settings', 'calcfinance'),
        'panel' => 'calcfinance_settings',
    ));
    
    $wp_customize->add_setting('calcfinance_footer_about', array(
        'default'           => 'CalcFinance helps you make smarter financial decisions with expert guides, powerful calculators, and unbiased comparisons.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('calcfinance_footer_about', array(
        'label'   => esc_html__('Footer About Text', 'calcfinance'),
        'section' => 'calcfinance_footer',
        'type'    => 'textarea',
    ));
    
    $wp_customize->add_setting('calcfinance_footer_copyright', array(
        'default'           => '© ' . date('Y') . ' CalcFinance. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('calcfinance_footer_copyright', array(
        'label'   => esc_html__('Copyright Text', 'calcfinance'),
        'section' => 'calcfinance_footer',
        'type'    => 'text',
    ));
    
    // Social Links
    $social_networks = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter/X',
        'instagram' => 'Instagram',
        'linkedin'  => 'LinkedIn',
        'youtube'   => 'YouTube',
        'tiktok'    => 'TikTok',
    );
    
    foreach ($social_networks as $key => $label) {
        $wp_customize->add_setting("calcfinance_social_{$key}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("calcfinance_social_{$key}", array(
            'label'   => esc_html($label),
            'section' => 'calcfinance_footer',
            'type'    => 'url',
        ));
    }
    
    // ============================================
    // Ad Settings
    // ============================================
    $wp_customize->add_section('calcfinance_ads', array(
        'title'       => esc_html__('Ad Placements', 'calcfinance'),
        'panel'       => 'calcfinance_settings',
        'description' => esc_html__('Add your ad code for different placements.', 'calcfinance'),
    ));
    
    // Header Ad
    $wp_customize->add_setting('calcfinance_ad_header', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('calcfinance_ad_header', array(
        'label'       => esc_html__('Header Ad Code', 'calcfinance'),
        'description' => esc_html__('Appears below the navigation', 'calcfinance'),
        'section'     => 'calcfinance_ads',
        'type'        => 'textarea',
    ));
    
    // Sidebar Ad
    $wp_customize->add_setting('calcfinance_ad_sidebar', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('calcfinance_ad_sidebar', array(
        'label'       => esc_html__('Sidebar Ad Code', 'calcfinance'),
        'section'     => 'calcfinance_ads',
        'type'        => 'textarea',
    ));
    
    // Article Ad Top
    $wp_customize->add_setting('calcfinance_ad_article_top', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('calcfinance_ad_article_top', array(
        'label'       => esc_html__('Article Top Ad', 'calcfinance'),
        'description' => esc_html__('Appears at the top of article content', 'calcfinance'),
        'section'     => 'calcfinance_ads',
        'type'        => 'textarea',
    ));
    
    // Article Ad Middle
    $wp_customize->add_setting('calcfinance_ad_article_middle', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('calcfinance_ad_article_middle', array(
        'label'       => esc_html__('Article Middle Ad', 'calcfinance'),
        'description' => esc_html__('Appears in the middle of article content', 'calcfinance'),
        'section'     => 'calcfinance_ads',
        'type'        => 'textarea',
    ));
    
    // Article Ad Bottom
    $wp_customize->add_setting('calcfinance_ad_article_bottom', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('calcfinance_ad_article_bottom', array(
        'label'       => esc_html__('Article Bottom Ad', 'calcfinance'),
        'section'     => 'calcfinance_ads',
        'type'        => 'textarea',
    ));
    
    // ============================================
    // Color Settings
    // ============================================
    $wp_customize->add_section('calcfinance_colors', array(
        'title' => esc_html__('Theme Colors', 'calcfinance'),
        'panel' => 'calcfinance_settings',
    ));
    
    $wp_customize->add_setting('calcfinance_primary_color', array(
        'default'           => '#0f172a',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'calcfinance_primary_color', array(
        'label'   => esc_html__('Primary Color', 'calcfinance'),
        'section' => 'calcfinance_colors',
    )));
    
    $wp_customize->add_setting('calcfinance_accent_color', array(
        'default'           => '#2563eb',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'calcfinance_accent_color', array(
        'label'   => esc_html__('Accent Color', 'calcfinance'),
        'section' => 'calcfinance_colors',
    )));
    
    $wp_customize->add_setting('calcfinance_secondary_color', array(
        'default'           => '#14b8a6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'calcfinance_secondary_color', array(
        'label'   => esc_html__('Secondary Color', 'calcfinance'),
        'section' => 'calcfinance_colors',
    )));
    
    // ============================================
    // Homepage Settings
    // ============================================
    $wp_customize->add_section('calcfinance_homepage', array(
        'title' => esc_html__('Homepage Layout', 'calcfinance'),
        'panel' => 'calcfinance_settings',
    ));
    
    // Show Trending Articles
    $wp_customize->add_setting('calcfinance_show_trending', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('calcfinance_show_trending', array(
        'label'   => esc_html__('Show Trending Articles', 'calcfinance'),
        'section' => 'calcfinance_homepage',
        'type'    => 'checkbox',
    ));
    
    // Trending Posts Count
    $wp_customize->add_setting('calcfinance_trending_count', array(
        'default'           => 6,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('calcfinance_trending_count', array(
        'label'       => esc_html__('Trending Posts Count', 'calcfinance'),
        'section'     => 'calcfinance_homepage',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 12,
            'step' => 1,
        ),
    ));
    
    // Show Categories
    $wp_customize->add_setting('calcfinance_show_categories', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('calcfinance_show_categories', array(
        'label'   => esc_html__('Show Categories Grid', 'calcfinance'),
        'section' => 'calcfinance_homepage',
        'type'    => 'checkbox',
    ));
    
    // Show Calculators
    $wp_customize->add_setting('calcfinance_show_calculators', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('calcfinance_show_calculators', array(
        'label'   => esc_html__('Show Calculators Section', 'calcfinance'),
        'section' => 'calcfinance_homepage',
        'type'    => 'checkbox',
    ));
    
    // Show Latest Articles
    $wp_customize->add_setting('calcfinance_show_latest', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('calcfinance_show_latest', array(
        'label'   => esc_html__('Show Latest Articles', 'calcfinance'),
        'section' => 'calcfinance_homepage',
        'type'    => 'checkbox',
    ));
    
    // Latest Posts Count
    $wp_customize->add_setting('calcfinance_latest_count', array(
        'default'           => 6,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('calcfinance_latest_count', array(
        'label'       => esc_html__('Latest Posts Count', 'calcfinance'),
        'section'     => 'calcfinance_homepage',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 12,
            'step' => 1,
        ),
    ));
    
    // Featured Post IDs
    $wp_customize->add_setting('calcfinance_featured_posts', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('calcfinance_featured_posts', array(
        'label'       => esc_html__('Featured Post IDs', 'calcfinance'),
        'description' => esc_html__('Enter comma-separated post IDs to feature', 'calcfinance'),
        'section'     => 'calcfinance_homepage',
        'type'        => 'text',
    ));
    
}
endif;

/**
 * Output custom CSS from Customizer
 */
add_action('wp_head', 'calcfinance_customizer_css');

if (!function_exists('calcfinance_customizer_css')) :
function calcfinance_customizer_css() {
    $primary = get_theme_mod('calcfinance_primary_color', '#0f172a');
    $accent = get_theme_mod('calcfinance_accent_color', '#2563eb');
    $secondary = get_theme_mod('calcfinance_secondary_color', '#14b8a6');
    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo esc_attr($primary); ?>;
            --accent: <?php echo esc_attr($accent); ?>;
            --secondary: <?php echo esc_attr($secondary); ?>;
            --accent-hover: <?php echo esc_attr(calcfinance_adjust_brightness($accent, -20)); ?>;
            --secondary-hover: <?php echo esc_attr(calcfinance_adjust_brightness($secondary, -20)); ?>;
            --bg-hero: linear-gradient(135deg, <?php echo esc_attr($primary); ?> 0%, <?php echo esc_attr(calcfinance_adjust_brightness($primary, 20)); ?> 50%, <?php echo esc_attr($primary); ?> 100%);
        }
        
        .newsletter-section,
        .hero {
            background: var(--bg-hero);
        }
    </style>
    <?php
}
endif;

/**
 * Helper: Adjust color brightness
 */
if (!function_exists('calcfinance_adjust_brightness')) :
function calcfinance_adjust_brightness($hex, $steps) {
    $hex = ltrim($hex, '#');
    $r = max(0, min(255, hexdec(substr($hex, 0, 2)) + $steps));
    $g = max(0, min(255, hexdec(substr($hex, 2, 2)) + $steps));
    $b = max(0, min(255, hexdec(substr($hex, 4, 2)) + $steps));
    return '#' . dechex($r) . dechex($g) . dechex($b);
}
endif;
