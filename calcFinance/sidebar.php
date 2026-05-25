<?php
/**
 * CalcFinance Sidebar Template
 *
 * @package CalcFinance
 */

// Determine which sidebar to use
$sidebar_id = 'blog-sidebar';

if (is_front_page() || is_home()) {
    $sidebar_id = 'homepage-sidebar';
} elseif (is_page_template('template-calculator.php') || 
          is_page_template('calculators/template-mortgage.php') ||
          is_page_template('calculators/template-emi.php') ||
          is_page_template('calculators/template-loan.php') ||
          is_page_template('calculators/template-savings.php') ||
          is_page_template('calculators/template-credit-score.php')) {
    $sidebar_id = 'calculator-sidebar';
}

if (!is_active_sidebar($sidebar_id)) {
    return;
}
?>

<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e('Sidebar', 'calcfinance'); ?>">
    
    <!-- Sidebar Ad -->
    <?php $sidebar_ad = get_theme_mod('calcfinance_ad_sidebar', ''); ?>
    <?php if (!empty($sidebar_ad)) : ?>
    <div class="ad-placeholder ad-sidebar">
        <?php echo wp_kses_post($sidebar_ad); ?>
    </div>
    <?php else : ?>
    <div class="ad-placeholder ad-sidebar">
        <span><i class="fas fa-ad"></i> <?php esc_html_e('Sidebar Ad Space', 'calcfinance'); ?><br><small><?php esc_html_e('300x250 or similar', 'calcfinance'); ?></small></span>
    </div>
    <?php endif; ?>
    
    <?php dynamic_sidebar($sidebar_id); ?>
    
    <!-- Newsletter Widget -->
    <div class="widget">
        <h3 class="widget-title"><?php esc_html_e('Subscribe', 'calcfinance'); ?></h3>
        <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1rem;">
            <?php esc_html_e('Get the latest financial tips and guides delivered to your inbox.', 'calcfinance'); ?>
        </p>
        <form method="post" action="#" style="display: flex; gap: 0.5rem;" onsubmit="event.preventDefault(); alert('Please configure your newsletter service in Customizer.');">
            <input type="email" placeholder="Your email" required style="flex: 1; padding: 0.625rem; border: 1px solid var(--border); border-radius: var(--radius); background: var(--bg-body); color: var(--text-primary); font-size: 0.875rem;">
            <button type="submit" class="btn btn-sm btn-primary" style="padding: 0.625rem 1rem;">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
    
    <!-- Categories Widget -->
    <div class="widget">
        <h3 class="widget-title"><?php esc_html_e('Categories', 'calcfinance'); ?></h3>
        <ul>
            <?php
            wp_list_categories(array(
                'title_li'   => '',
                'orderby'    => 'count',
                'order'      => 'DESC',
                'number'     => 10,
                'show_count' => true,
            ));
            ?>
        </ul>
    </div>
    
    <!-- Tags Cloud -->
    <div class="widget widget_tag_cloud">
        <h3 class="widget-title"><?php esc_html_e('Popular Tags', 'calcfinance'); ?></h3>
        <?php
        wp_tag_cloud(array(
            'number'   => 20,
            'orderby'  => 'count',
            'order'    => 'DESC',
            'smallest' => 12,
            'largest'  => 12,
            'unit'     => 'px',
        ));
        ?>
    </div>
    
</aside>
