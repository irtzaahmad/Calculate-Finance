<?php
/**
 * CalcFinance Archive Template
 *
 * @package CalcFinance
 */

get_header();
?>

<section class="section" style="padding-top: 140px;">
    <div class="container">
        
        <header class="page-header" style="text-align: center; margin-bottom: 3rem;">
            <h1 class="page-title" style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800;">
                <?php
                if (is_category()) {
                    single_cat_title();
                } elseif (is_tag()) {
                    single_tag_title();
                } elseif (is_author()) {
                    the_post();
                    printf(esc_html__('Author: %s', 'calcfinance'), esc_html(get_the_author()));
                    rewind_posts();
                } elseif (is_day()) {
                    printf(esc_html__('Day: %s', 'calcfinance'), esc_html(get_the_date()));
                } elseif (is_month()) {
                    printf(esc_html__('Month: %s', 'calcfinance'), esc_html(get_the_date('F Y')));
                } elseif (is_year()) {
                    printf(esc_html__('Year: %s', 'calcfinance'), esc_html(get_the_date('Y')));
                } else {
                    esc_html_e('Archives', 'calcfinance');
                }
                ?>
            </h1>
            <?php
            $term_description = term_description();
            if (!empty($term_description)) {
                echo '<div style="color: var(--text-muted); max-width: 700px; margin: 0.5rem auto 0;">' . wp_kses_post($term_description) . '</div>';
            }
            ?>
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
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📭</div>
                    <h3><?php esc_html_e('No posts found', 'calcfinance'); ?></h3>
                    <p style="color: var(--text-muted);"><?php esc_html_e('There are no posts in this category yet. Check back later!', 'calcfinance'); ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Pagination -->
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
