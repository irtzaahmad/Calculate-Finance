<?php
/**
 * CalcFinance SEO Functions
 *
 * @package CalcFinance
 * @description Schema markup, Open Graph, meta tags, breadcrumbs
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add meta description
 */
add_action('wp_head', 'calcfinance_meta_description', 1);

if (!function_exists('calcfinance_meta_description')) :
function calcfinance_meta_description() {
    if (is_front_page() || is_home()) {
        $description = get_bloginfo('description');
    } elseif (is_singular()) {
        $description = get_the_excerpt();
        if (empty($description)) {
            $description = wp_trim_words(get_the_content(), 30, '...');
        }
    } elseif (is_category() || is_tag() || is_tax()) {
        $description = term_description();
    } elseif (is_archive()) {
        $description = get_the_archive_description();
    } elseif (is_search()) {
        $description = sprintf(esc_html__('Search results for: %s', 'calcfinance'), get_search_query());
    } else {
        $description = get_bloginfo('description');
    }
    
    $description = wp_strip_all_tags($description);
    $description = substr($description, 0, 160);
    
    if (!empty($description)) {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
}
endif;

/**
 * Add Open Graph tags
 */
add_action('wp_head', 'calcfinance_open_graph', 2);

if (!function_exists('calcfinance_open_graph')) :
function calcfinance_open_graph() {
    if (!is_singular() && !is_front_page()) {
        return;
    }
    
    $og = array();
    
    if (is_front_page() || is_home()) {
        $og['title'] = get_bloginfo('name');
        $og['description'] = get_bloginfo('description');
        $og['url'] = home_url('/');
        $og['type'] = 'website';
        $og['image'] = get_theme_mod('calcfinance_hero_image', '');
    } elseif (is_singular()) {
        $og['title'] = get_the_title();
        $og['description'] = wp_strip_all_tags(get_the_excerpt());
        $og['url'] = get_permalink();
        $og['type'] = 'article';
        if (has_post_thumbnail()) {
            $og['image'] = get_the_post_thumbnail_url(null, 'large');
        }
    }
    
    $og['site_name'] = get_bloginfo('name');
    $og['locale'] = get_locale();
    
    // Twitter handle (customizable)
    $twitter_site = get_theme_mod('calcfinance_social_twitter', '');
    if (!empty($twitter_site)) {
        $twitter_handle = basename(parse_url($twitter_site, PHP_URL_PATH));
        echo '<meta name="twitter:site" content="@' . esc_attr($twitter_handle) . '">' . "\n";
    }
    
    echo '<meta property="og:title" content="' . esc_attr($og['title']) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($og['description']) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($og['url']) . '">' . "\n";
    echo '<meta property="og:type" content="' . esc_attr($og['type']) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($og['site_name']) . '">' . "\n";
    echo '<meta property="og:locale" content="' . esc_attr($og['locale']) . '">' . "\n";
    
    if (!empty($og['image'])) {
        echo '<meta property="og:image" content="' . esc_url($og['image']) . '">' . "\n";
        echo '<meta name="twitter:image" content="' . esc_url($og['image']) . '">' . "\n";
    }
    
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($og['title']) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($og['description']) . '">' . "\n";
    
    // Article specific
    if (is_singular('post')) {
        echo '<meta property="article:published_time" content="' . esc_attr(get_the_date('c')) . '">' . "\n";
        echo '<meta property="article:modified_time" content="' . esc_attr(get_the_modified_date('c')) . '">' . "\n";
        
        $categories = get_the_category();
        foreach ($categories as $category) {
            echo '<meta property="article:section" content="' . esc_attr($category->name) . '">' . "\n";
        }
        
        $tags = get_the_tags();
        if ($tags) {
            foreach ($tags as $tag) {
                echo '<meta property="article:tag" content="' . esc_attr($tag->name) . '">' . "\n";
            }
        }
        
        $author = get_the_author_meta('display_name');
        if ($author) {
            echo '<meta name="author" content="' . esc_attr($author) . '">' . "\n";
        }
    }
}
endif;

/**
 * Add Schema.org JSON-LD markup
 */
add_action('wp_footer', 'calcfinance_schema_markup', 99);

if (!function_exists('calcfinance_schema_markup')) :
function calcfinance_schema_markup() {
    $schemas = array();
    
    // Website Schema
    $schemas[] = array(
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        'name'     => get_bloginfo('name'),
        'url'      => home_url('/'),
        'potentialAction' => array(
            '@type'       => 'SearchAction',
            'target'      => array(
                '@type'       => 'EntryPoint',
                'urlTemplate' => home_url('/?s={search_term_string}'),
            ),
            'query-input' => 'required name=search_term_string',
        ),
    );
    
    // Organization Schema
    $schemas[] = array(
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => get_bloginfo('name'),
        'url'      => home_url('/'),
        'logo'     => array(
            '@type' => 'ImageObject',
            'url'   => get_custom_logo() ? wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] : '',
        ),
    );
    
    // Article Schema for single posts
    if (is_singular('post')) {
        $post_schema = array(
            '@context'         => 'https://schema.org',
            '@type'            => 'Article',
            'headline'         => get_the_title(),
            'description'      => wp_strip_all_tags(get_the_excerpt()),
            'url'              => get_permalink(),
            'datePublished'    => get_the_date('c'),
            'dateModified'     => get_the_modified_date('c'),
            'author'           => array(
                '@type' => 'Person',
                'name'  => get_the_author_meta('display_name'),
                'url'   => get_author_posts_url(get_the_author_meta('ID')),
            ),
            'publisher'        => array(
                '@type' => 'Organization',
                'name'  => get_bloginfo('name'),
                'logo'  => array(
                    '@type' => 'ImageObject',
                    'url'   => get_custom_logo() ? wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] : '',
                ),
            ),
            'mainEntityOfPage' => array(
                '@type' => 'WebPage',
                '@id'   => get_permalink(),
            ),
        );
        
        if (has_post_thumbnail()) {
            $post_schema['image'] = array(
                '@type' => 'ImageObject',
                'url'   => get_the_post_thumbnail_url(null, 'full'),
                'width' => 1200,
                'height' => 630,
            );
        }
        
        $schemas[] = $post_schema;
    }
    
    // BreadcrumbList Schema
    if (!is_front_page()) {
        $breadcrumbs = array(
            array(
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => esc_html__('Home', 'calcfinance'),
                'item'     => home_url('/'),
            ),
        );
        
        $position = 2;
        
        if (is_category()) {
            $category = get_queried_object();
            $breadcrumbs[] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => $category->name,
                'item'     => get_category_link($category->term_id),
            );
        } elseif (is_singular('post')) {
            $categories = get_the_category();
            if (!empty($categories)) {
                $breadcrumbs[] = array(
                    '@type'    => 'ListItem',
                    'position' => $position,
                    'name'     => $categories[0]->name,
                    'item'     => get_category_link($categories[0]->term_id),
                );
                $position++;
            }
            
            $breadcrumbs[] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => get_the_title(),
                'item'     => get_permalink(),
            );
        } elseif (is_page()) {
            $breadcrumbs[] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => get_the_title(),
                'item'     => get_permalink(),
            );
        } elseif (is_search()) {
            $breadcrumbs[] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => sprintf(esc_html__('Search: %s', 'calcfinance'), get_search_query()),
                'item'     => get_search_link(),
            );
        } elseif (is_404()) {
            $breadcrumbs[] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => esc_html__('Page Not Found', 'calcfinance'),
            );
        }
        
        $schemas[] = array(
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $breadcrumbs,
        );
    }
    
    // Financial Product Schema for calculator pages
    if (is_page_template('template-calculator.php') || is_page_template('calculators/template-mortgage.php')) {
        $schemas[] = array(
            '@context' => 'https://schema.org',
            '@type'    => 'SoftwareApplication',
            'name'     => get_the_title(),
            'url'      => get_permalink(),
            'applicationCategory' => 'FinanceApplication',
            'operatingSystem'     => 'Any',
            'offers'              => array(
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'USD',
            ),
        );
    }
    
    // Output all schemas
    foreach ($schemas as $schema) {
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
endif;

/**
 * Breadcrumbs function
 */
if (!function_exists('calcfinance_breadcrumbs')) :
function calcfinance_breadcrumbs() {
    global $post;
    if (is_front_page()) {
        return;
    }
    
    $sep = '<span class="separator"><i class="fas fa-chevron-right" style="font-size:0.7rem;"></i></span>';
    
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<div class="container">';
    echo '<ol>';
    
    // Home
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'calcfinance') . '</a></li>';
    echo '<li>' . $sep . '</li>';
    
    if (is_category()) {
        $category = get_queried_object();
        echo '<li>' . esc_html($category->name) . '</li>';
        
    } elseif (is_single()) {
        $categories = get_the_category();
        if (!empty($categories)) {
            echo '<li><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a></li>';
            echo '<li>' . $sep . '</li>';
        }
        echo '<li>' . esc_html(get_the_title()) . '</li>';
        
    } elseif (is_page()) {
        if ($post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_post($parent_id);
                $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) {
                echo $crumb;
                echo '<li>' . $sep . '</li>';
            }
        }
        echo '<li>' . esc_html(get_the_title()) . '</li>';
        
    } elseif (is_search()) {
        echo '<li>' . sprintf(esc_html__('Search results for "%s"', 'calcfinance'), esc_html(get_search_query())) . '</li>';
        
    } elseif (is_404()) {
        echo '<li>' . esc_html__('Page Not Found', 'calcfinance') . '</li>';
        
    } elseif (is_archive()) {
        echo '<li>' . esc_html(get_the_archive_title()) . '</li>';
    }
    
    echo '</ol>';
    echo '</div>';
    echo '</nav>';
}
endif;

/**
 * Add robots meta tag
 */
add_action('wp_head', 'calcfinance_robots_meta', 1);

if (!function_exists('calcfinance_robots_meta')) :
function calcfinance_robots_meta() {
    if (is_search() || is_404()) {
        echo '<meta name="robots" content="noindex, follow">' . "\n";
    }
}
endif;

/**
 * Canonical URL
 */
add_action('wp_head', 'calcfinance_canonical_url', 3);

if (!function_exists('calcfinance_canonical_url')) :
function calcfinance_canonical_url() {
    if (is_singular()) {
        echo '<link rel="canonical" href="' . esc_url(get_permalink()) . '">' . "\n";
    } elseif (is_front_page()) {
        echo '<link rel="canonical" href="' . esc_url(home_url('/')) . '">' . "\n";
    }
}
endif;

/**
 * Add preload for critical fonts
 */
add_action('wp_head', 'calcfinance_resource_hints', 1);

if (!function_exists('calcfinance_resource_hints')) :
function calcfinance_resource_hints() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>' . "\n";
}
endif;
