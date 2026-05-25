<?php
/**
 * CalcFinance Custom Post Types
 *
 * @package CalcFinance
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Calculator post type
 */
add_action('init', 'calcfinance_register_calculator_post_type', 0);

if (!function_exists('calcfinance_register_calculator_post_type')) :
function calcfinance_register_calculator_post_type() {
    
    $labels = array(
        'name'                  => _x('Calculators', 'Post Type General Name', 'calcfinance'),
        'singular_name'         => _x('Calculator', 'Post Type Singular Name', 'calcfinance'),
        'menu_name'             => esc_html__('Calculators', 'calcfinance'),
        'name_admin_bar'        => esc_html__('Calculator', 'calcfinance'),
        'archives'              => esc_html__('Calculator Archives', 'calcfinance'),
        'attributes'            => esc_html__('Calculator Attributes', 'calcfinance'),
        'parent_item_colon'     => esc_html__('Parent Calculator:', 'calcfinance'),
        'all_items'             => esc_html__('All Calculators', 'calcfinance'),
        'add_new_item'          => esc_html__('Add New Calculator', 'calcfinance'),
        'add_new'               => esc_html__('Add New', 'calcfinance'),
        'new_item'              => esc_html__('New Calculator', 'calcfinance'),
        'edit_item'             => esc_html__('Edit Calculator', 'calcfinance'),
        'update_item'           => esc_html__('Update Calculator', 'calcfinance'),
        'view_item'             => esc_html__('View Calculator', 'calcfinance'),
        'view_items'            => esc_html__('View Calculators', 'calcfinance'),
        'search_items'          => esc_html__('Search Calculator', 'calcfinance'),
        'not_found'             => esc_html__('Not found', 'calcfinance'),
        'not_found_in_trash'    => esc_html__('Not found in Trash', 'calcfinance'),
        'featured_image'        => esc_html__('Featured Image', 'calcfinance'),
        'set_featured_image'    => esc_html__('Set featured image', 'calcfinance'),
        'remove_featured_image' => esc_html__('Remove featured image', 'calcfinance'),
        'use_featured_image'    => esc_html__('Use as featured image', 'calcfinance'),
        'insert_into_item'      => esc_html__('Insert into calculator', 'calcfinance'),
        'uploaded_to_this_item' => esc_html__('Uploaded to this calculator', 'calcfinance'),
        'items_list'            => esc_html__('Calculators list', 'calcfinance'),
        'items_list_navigation' => esc_html__('Calculators list navigation', 'calcfinance'),
        'filter_items_list'     => esc_html__('Filter calculators list', 'calcfinance'),
    );
    
    $args = array(
        'label'               => esc_html__('Calculator', 'calcfinance'),
        'description'         => esc_html__('Financial calculators', 'calcfinance'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields'),
        'taxonomies'          => array('calculator_category'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calculator',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'calculator'),
    );
    
    register_post_type('calculator', $args);
}
endif;

/**
 * Register Calculator Category taxonomy
 */
add_action('init', 'calcfinance_register_calculator_taxonomy', 0);

if (!function_exists('calcfinance_register_calculator_taxonomy')) :
function calcfinance_register_calculator_taxonomy() {
    
    $labels = array(
        'name'                       => _x('Calculator Categories', 'Taxonomy General Name', 'calcfinance'),
        'singular_name'              => _x('Calculator Category', 'Taxonomy Singular Name', 'calcfinance'),
        'menu_name'                  => esc_html__('Categories', 'calcfinance'),
        'all_items'                  => esc_html__('All Categories', 'calcfinance'),
        'parent_item'                => esc_html__('Parent Category', 'calcfinance'),
        'parent_item_colon'          => esc_html__('Parent Category:', 'calcfinance'),
        'new_item_name'              => esc_html__('New Category Name', 'calcfinance'),
        'add_new_item'               => esc_html__('Add New Category', 'calcfinance'),
        'edit_item'                  => esc_html__('Edit Category', 'calcfinance'),
        'update_item'                => esc_html__('Update Category', 'calcfinance'),
        'view_item'                  => esc_html__('View Category', 'calcfinance'),
        'separate_items_with_commas' => esc_html__('Separate categories with commas', 'calcfinance'),
        'add_or_remove_items'        => esc_html__('Add or remove categories', 'calcfinance'),
        'choose_from_most_used'      => esc_html__('Choose from the most used', 'calcfinance'),
        'popular_items'              => esc_html__('Popular Categories', 'calcfinance'),
        'search_items'               => esc_html__('Search Categories', 'calcfinance'),
        'not_found'                  => esc_html__('Not Found', 'calcfinance'),
        'no_terms'                   => esc_html__('No categories', 'calcfinance'),
        'items_list'                 => esc_html__('Categories list', 'calcfinance'),
        'items_list_navigation'      => esc_html__('Categories list navigation', 'calcfinance'),
    );
    
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => array('slug' => 'calculator-category'),
    );
    
    register_taxonomy('calculator_category', array('calculator'), $args);
}
endif;

/**
 * Register Guide post type
 */
add_action('init', 'calcfinance_register_guide_post_type', 0);

if (!function_exists('calcfinance_register_guide_post_type')) :
function calcfinance_register_guide_post_type() {
    
    $labels = array(
        'name'                  => _x('Guides', 'Post Type General Name', 'calcfinance'),
        'singular_name'         => _x('Guide', 'Post Type Singular Name', 'calcfinance'),
        'menu_name'             => esc_html__('Guides', 'calcfinance'),
        'name_admin_bar'        => esc_html__('Guide', 'calcfinance'),
        'archives'              => esc_html__('Guide Archives', 'calcfinance'),
        'all_items'             => esc_html__('All Guides', 'calcfinance'),
        'add_new_item'          => esc_html__('Add New Guide', 'calcfinance'),
        'add_new'               => esc_html__('Add New', 'calcfinance'),
        'new_item'              => esc_html__('New Guide', 'calcfinance'),
        'edit_item'             => esc_html__('Edit Guide', 'calcfinance'),
        'view_item'             => esc_html__('View Guide', 'calcfinance'),
        'search_items'          => esc_html__('Search Guides', 'calcfinance'),
        'not_found'             => esc_html__('Not found', 'calcfinance'),
        'not_found_in_trash'    => esc_html__('Not found in Trash', 'calcfinance'),
    );
    
    $args = array(
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-book-alt',
        'has_archive'         => true,
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'guide'),
    );
    
    register_post_type('guide', $args);
}
endif;

/**
 * Add default calculator categories on theme activation
 */
add_action('after_switch_theme', 'calcfinance_default_calculator_categories');

if (!function_exists('calcfinance_default_calculator_categories')) :
function calcfinance_default_calculator_categories() {
    $categories = array(
        'mortgage'     => 'Mortgage',
        'loan'         => 'Loan',
        'savings'      => 'Savings',
        'credit-score' => 'Credit Score',
        'investment'   => 'Investment',
        'budget'       => 'Budget',
    );
    
    foreach ($categories as $slug => $name) {
        if (!term_exists($slug, 'calculator_category')) {
            wp_insert_term($name, 'calculator_category', array('slug' => $slug));
        }
    }
}
endif;

/**
 * Add custom meta boxes for calculators
 */
add_action('add_meta_boxes', 'calcfinance_calculator_meta_boxes');

if (!function_exists('calcfinance_calculator_meta_boxes')) :
function calcfinance_calculator_meta_boxes() {
    add_meta_box(
        'calcfinance_calculator_details',
        esc_html__('Calculator Details', 'calcfinance'),
        'calcfinance_calculator_meta_box_callback',
        'calculator',
        'normal',
        'high'
    );
}
endif;

if (!function_exists('calcfinance_calculator_meta_box_callback')) :
function calcfinance_calculator_meta_box_callback($post) {
    wp_nonce_field('calcfinance_calculator_meta', 'calcfinance_calculator_meta_nonce');
    
    $shortcode = get_post_meta($post->ID, '_calcfinance_calculator_shortcode', true);
    $formula = get_post_meta($post->ID, '_calcfinance_calculator_formula', true);
    ?>
    <p>
        <label for="calcfinance_calculator_shortcode"><?php esc_html_e('Calculator Shortcode', 'calcfinance'); ?></label><br>
        <input type="text" id="calcfinance_calculator_shortcode" name="calcfinance_calculator_shortcode" 
               value="<?php echo esc_attr($shortcode); ?>" class="widefat" 
               placeholder="[calculator type=\"mortgage\"]">
    </p>
    <p class="description"><?php esc_html_e('Enter the shortcode to display this calculator.', 'calcfinance'); ?></p>
    <?php
}
endif;

/**
 * Save calculator meta box data
 */
add_action('save_post', 'calcfinance_save_calculator_meta');

if (!function_exists('calcfinance_save_calculator_meta')) :
function calcfinance_save_calculator_meta($post_id) {
    if (!isset($_POST['calcfinance_calculator_meta_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['calcfinance_calculator_meta_nonce'], 'calcfinance_calculator_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['calcfinance_calculator_shortcode'])) {
        update_post_meta($post_id, '_calcfinance_calculator_shortcode', sanitize_text_field($_POST['calcfinance_calculator_shortcode']));
    }
}
endif;

/**
 * Flush rewrite rules on theme activation
 */
add_action('after_switch_theme', 'calcfinance_flush_rewrite_rules');

if (!function_exists('calcfinance_flush_rewrite_rules')) :
function calcfinance_flush_rewrite_rules() {
    calcfinance_register_calculator_post_type();
    calcfinance_register_guide_post_type();
    calcfinance_register_calculator_taxonomy();
    flush_rewrite_rules();
}
endif;
