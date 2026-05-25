<?php
/**
 * CalcFinance Index Template
 * Fallback for all template types
 *
 * @package CalcFinance
 */

get_header();
?>

<section class="section" style="padding-top: 140px;">
    <div class="container">
        
        <header class="page-header" style="text-align: center; margin-bottom: 3rem;">
            <h1 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800;">
                <?php
                if (is_home()) {
                    esc_html_e('Latest Posts', 'calcfinance');
                } else {
                    the_archive_title();
                }
                ?>
            </h1>
        </header>
        
        <div class="article-grid">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="card-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('calcfinance-card', array('loading' => 'lazy')); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="card-meta">
                            <?php echo calcfinance_post_category(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <span><i class="far fa-clock"></i> <?php echo esc_html(calcfinance_reading_time()); ?> min</span>
                        </div>
                        <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="card-excerpt"><?php echo esc_html(calcfinance_excerpt(18)); ?></p>
                    </div>
                    <div class="card-footer">
                        <span class="card-date"><i class="far fa-calendar"></i> <?php echo esc_html(calcfinance_post_date()); ?></span>
                        <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary"><?php esc_html_e('Read More', 'calcfinance'); ?></a>
                    </div>
                </article>
            <?php
                endwhile;
            else :
            ?>
                <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                    <p><?php esc_html_e('No posts found.', 'calcfinance'); ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <?php
        the_posts_pagination(array(
            'mid_size'  => 2,
            'prev_text' => '<i class="fas fa-chevron-left"></i>',
            'next_text' => '<i class="fas fa-chevron-right"></i>',
        ));
        ?>
        
    </div>
</section>

<?php get_footer(); ?>
