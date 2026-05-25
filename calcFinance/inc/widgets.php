<?php
/**
 * CalcFinance Widget Areas
 *
 * @package CalcFinance
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('widgets_init', 'calcfinance_widgets_init');

if (!function_exists('calcfinance_widgets_init')) :
function calcfinance_widgets_init() {
    
    /**
     * Homepage Sidebar
     */
    register_sidebar(array(
        'name'          => esc_html__('Homepage Sidebar', 'calcfinance'),
        'id'            => 'homepage-sidebar',
        'description'   => esc_html__('Add widgets here to appear on the homepage sidebar.', 'calcfinance'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    /**
     * Blog Sidebar
     */
    register_sidebar(array(
        'name'          => esc_html__('Blog Sidebar', 'calcfinance'),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__('Add widgets here to appear on blog posts and archive pages.', 'calcfinance'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    /**
     * Footer Widget 1
     */
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 1', 'calcfinance'),
        'id'            => 'footer-1',
        'description'   => esc_html__('First footer widget area.', 'calcfinance'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
    
    /**
     * Footer Widget 2
     */
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 2', 'calcfinance'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Second footer widget area.', 'calcfinance'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
    
    /**
     * Footer Widget 3
     */
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 3', 'calcfinance'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Third footer widget area.', 'calcfinance'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
    
    /**
     * Footer Widget 4
     */
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 4', 'calcfinance'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Fourth footer widget area.', 'calcfinance'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
    
    /**
     * Calculator Sidebar
     */
    register_sidebar(array(
        'name'          => esc_html__('Calculator Sidebar', 'calcfinance'),
        'id'            => 'calculator-sidebar',
        'description'   => esc_html__('Sidebar for calculator pages.', 'calcfinance'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    /**
     * Before Content
     */
    register_sidebar(array(
        'name'          => esc_html__('Before Content', 'calcfinance'),
        'id'            => 'before-content',
        'description'   => esc_html__('Appears before the main content area.', 'calcfinance'),
        'before_widget' => '<div id="%1$s" class="widget-before-content %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    /**
     * After Content
     */
    register_sidebar(array(
        'name'          => esc_html__('After Content', 'calcfinance'),
        'id'            => 'after-content',
        'description'   => esc_html__('Appears after the main content area.', 'calcfinance'),
        'before_widget' => '<div id="%1$s" class="widget-after-content %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
endif;

/**
 * Custom Recent Posts Widget with thumbnails
 */
add_action('widgets_init', function() {
    register_widget('CalcFinance_Recent_Posts');
});

class CalcFinance_Recent_Posts extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'calcfinance_recent_posts',
            esc_html__('CalcFinance: Recent Posts', 'calcfinance'),
            array(
                'description' => esc_html__('Recent posts with thumbnails and meta.', 'calcfinance'),
                'classname'   => 'widget-calcfinance-recent-posts',
            )
        );
    }
    
    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Recent Posts', 'calcfinance');
        $count = !empty($instance['count']) ? absint($instance['count']) : 5;
        $show_thumb = !empty($instance['show_thumb']) ? true : false;
        
        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title) . $args['after_title'];
        
        $query = new WP_Query(array(
            'posts_per_page'      => $count,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ));
        
        if ($query->have_posts()) : ?>
            <div class="recent-posts-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="recent-post-item">
                        <?php if ($show_thumb && has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="recent-post-thumb">
                                <?php the_post_thumbnail('calcfinance-thumb'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="recent-post-body">
                            <h4 class="recent-post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <div class="recent-post-meta">
                                <span><?php echo calcfinance_post_date(); ?></span>
                                <span><?php echo calcfinance_reading_time(); ?> min read</span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $count = !empty($instance['count']) ? $instance['count'] : 5;
        $show_thumb = !empty($instance['show_thumb']) ? $instance['show_thumb'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'calcfinance'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Number of posts:', 'calcfinance'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>" type="number" step="1" min="1" max="10" value="<?php echo esc_attr($count); ?>">
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_thumb, 'on'); ?> id="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>" name="<?php echo esc_attr($this->get_field_name('show_thumb')); ?>">
            <label for="<?php echo esc_attr($this->get_field_id('show_thumb')); ?>"><?php esc_html_e('Show thumbnails', 'calcfinance'); ?></label>
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['count'] = (!empty($new_instance['count'])) ? absint($new_instance['count']) : 5;
        $instance['show_thumb'] = (!empty($new_instance['show_thumb'])) ? 'on' : '';
        return $instance;
    }
}

/**
 * Custom Popular Posts Widget (by view count)
 */
add_action('widgets_init', function() {
    register_widget('CalcFinance_Popular_Posts');
});

class CalcFinance_Popular_Posts extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'calcfinance_popular_posts',
            esc_html__('CalcFinance: Popular Posts', 'calcfinance'),
            array(
                'description' => esc_html__('Most viewed posts.', 'calcfinance'),
                'classname'   => 'widget-calcfinance-popular-posts',
            )
        );
    }
    
    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Popular Posts', 'calcfinance');
        $count = !empty($instance['count']) ? absint($instance['count']) : 5;
        
        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title) . $args['after_title'];
        
        $query = new WP_Query(array(
            'posts_per_page'      => $count,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'meta_key'            => '_calcfinance_views',
            'orderby'             => 'meta_value_num',
            'order'               => 'DESC',
        ));
        
        if ($query->have_posts()) : ?>
            <div class="popular-posts-list">
                <?php $i = 1; while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="popular-post-item">
                        <span class="popular-rank"><?php echo esc_html($i); ?></span>
                        <div class="popular-post-body">
                            <h4 class="popular-post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <div class="popular-post-meta">
                                <span><?php echo calcfinance_get_views(); ?> views</span>
                            </div>
                        </div>
                    </article>
                <?php $i++; endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $count = !empty($instance['count']) ? $instance['count'] : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'calcfinance'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Number of posts:', 'calcfinance'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>" type="number" step="1" min="1" max="10" value="<?php echo esc_attr($count); ?>">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['count'] = (!empty($new_instance['count'])) ? absint($new_instance['count']) : 5;
        return $instance;
    }
}
