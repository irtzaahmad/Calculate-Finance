<?php
/**
 * CalcFinance Page Template
 *
 * @package CalcFinance
 */

get_header();

while (have_posts()) :
    the_post();
?>

<section class="section" style="padding-top: 140px;">
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="page-header" style="text-align: center; margin-bottom: 3rem;">
                <h1 class="page-title" style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800;"><?php the_title(); ?></h1>
                <?php if (has_excerpt()) : ?>
                    <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 700px; margin: 0 auto;"><?php echo esc_html(get_the_excerpt()); ?></p>
                <?php endif; ?>
            </header>
            
            <?php if (has_post_thumbnail()) : ?>
            <div style="margin-bottom: 3rem; border-radius: var(--radius-lg); overflow: hidden;">
                <?php the_post_thumbnail('calcfinance-featured', array('style' => 'width:100%; aspect-ratio:21/9; object-fit:cover;')); ?>
            </div>
            <?php endif; ?>
            
            <div class="entry-content" style="max-width: 900px; margin: 0 auto;">
                <?php the_content(); ?>
                
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'calcfinance'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </article>
    </div>
</section>

<?php
endwhile;
get_footer();
