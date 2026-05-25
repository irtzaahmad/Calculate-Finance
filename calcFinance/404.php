<?php
/**
 * CalcFinance 404 Template
 *
 * @package CalcFinance
 */

get_header();
?>

<section class="error-404">
    <div class="container" style="text-align: center; max-width: 700px; margin: 0 auto;">
        
        <div class="error-code">404</div>
        
        <h1 class="error-title"><?php esc_html_e('Page Not Found', 'calcfinance'); ?></h1>
        <p class="error-desc">
            <?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'calcfinance'); ?>
        </p>
        
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3rem;">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-home"></i> <?php esc_html_e('Go Home', 'calcfinance'); ?>
            </a>
            <button onclick="document.getElementById('search-toggle').click()" class="btn btn-outline btn-lg">
                <i class="fas fa-search"></i> <?php esc_html_e('Search', 'calcfinance'); ?>
            </button>
        </div>
        
        <!-- Quick Links -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: left;">
            
            <div>
                <h4 style="margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 2px solid var(--border-light);">
                    <i class="fas fa-newspaper" style="color: var(--accent);"></i> 
                    <?php esc_html_e('Latest Articles', 'calcfinance'); ?>
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <?php
                    $recent = new WP_Query(array(
                        'posts_per_page'      => 5,
                        'post_status'         => 'publish',
                        'ignore_sticky_posts' => true,
                    ));
                    while ($recent->have_posts()) : $recent->the_post();
                    ?>
                        <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--border-light);">
                            <a href="<?php the_permalink(); ?>" style="color: var(--text-secondary); font-size: 0.9rem;">
                                <i class="fas fa-chevron-right" style="font-size: 0.7rem; color: var(--accent); margin-right: 0.5rem;"></i>
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </div>
            
            <div>
                <h4 style="margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 2px solid var(--border-light);">
                    <i class="fas fa-calculator" style="color: var(--secondary);"></i> 
                    <?php esc_html_e('Calculators', 'calcfinance'); ?>
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--border-light);">
                        <a href="<?php echo esc_url(home_url('/mortgage-calculator')); ?>" style="color: var(--text-secondary); font-size: 0.9rem;">
                            <i class="fas fa-chevron-right" style="font-size: 0.7rem; color: var(--secondary); margin-right: 0.5rem;"></i>
                            <?php esc_html_e('Mortgage Calculator', 'calcfinance'); ?>
                        </a>
                    </li>
                    <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--border-light);">
                        <a href="<?php echo esc_url(home_url('/emi-calculator')); ?>" style="color: var(--text-secondary); font-size: 0.9rem;">
                            <i class="fas fa-chevron-right" style="font-size: 0.7rem; color: var(--secondary); margin-right: 0.5rem;"></i>
                            <?php esc_html_e('EMI Calculator', 'calcfinance'); ?>
                        </a>
                    </li>
                    <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--border-light);">
                        <a href="<?php echo esc_url(home_url('/loan-calculator')); ?>" style="color: var(--text-secondary); font-size: 0.9rem;">
                            <i class="fas fa-chevron-right" style="font-size: 0.7rem; color: var(--secondary); margin-right: 0.5rem;"></i>
                            <?php esc_html_e('Loan Calculator', 'calcfinance'); ?>
                        </a>
                    </li>
                    <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--border-light);">
                        <a href="<?php echo esc_url(home_url('/savings-calculator')); ?>" style="color: var(--text-secondary); font-size: 0.9rem;">
                            <i class="fas fa-chevron-right" style="font-size: 0.7rem; color: var(--secondary); margin-right: 0.5rem;"></i>
                            <?php esc_html_e('Savings Calculator', 'calcfinance'); ?>
                        </a>
                    </li>
                    <li style="padding: 0.5rem 0;">
                        <a href="<?php echo esc_url(home_url('/credit-score-estimator')); ?>" style="color: var(--text-secondary); font-size: 0.9rem;">
                            <i class="fas fa-chevron-right" style="font-size: 0.7rem; color: var(--secondary); margin-right: 0.5rem;"></i>
                            <?php esc_html_e('Credit Score Estimator', 'calcfinance'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
        
    </div>
</section>

<?php get_footer(); ?>
