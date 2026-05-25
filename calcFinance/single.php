<?php
/**
 * CalcFinance Single Post Template
 *
 * @package CalcFinance
 */

get_header();

while (have_posts()) :
    the_post();
?>

<!-- Single Post Hero -->
<section class="single-hero">
    <div class="container">
        <div class="single-meta">
            <?php echo calcfinance_post_category(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            <span><i class="far fa-calendar"></i> <?php echo esc_html(calcfinance_post_date()); ?></span>
            <span><i class="far fa-clock"></i> <?php echo esc_html(calcfinance_reading_time()); ?> <?php esc_html_e('min read', 'calcfinance'); ?></span>
            <span><i class="far fa-eye"></i> <?php echo esc_html(calcfinance_format_number(calcfinance_get_views())); ?> <?php esc_html_e('views', 'calcfinance'); ?></span>
        </div>
        <h1 class="single-title"><?php the_title(); ?></h1>
        <div class="post-share">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Share on Facebook', 'calcfinance'); ?>"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo esc_attr(get_the_title()); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Share on Twitter', 'calcfinance'); ?>"><i class="fab fa-x-twitter"></i></a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_permalink()); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Share on LinkedIn', 'calcfinance'); ?>"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://wa.me/?text=<?php echo esc_url(get_permalink()); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Share on WhatsApp', 'calcfinance'); ?>"><i class="fab fa-whatsapp"></i></a>
            <a href="mailto:?subject=<?php echo esc_attr(get_the_title()); ?>&body=<?php echo esc_url(get_permalink()); ?>" aria-label="<?php esc_attr_e('Share via Email', 'calcfinance'); ?>"><i class="fas fa-envelope"></i></a>
        </div>
    </div>
</section>

<!-- Article Top Ad -->
<?php $article_top_ad = get_theme_mod('calcfinance_ad_article_top', ''); ?>
<?php if (!empty($article_top_ad)) : ?>
<div class="container">
    <div class="ad-placeholder ad-article">
        <?php echo wp_kses_post($article_top_ad); ?>
    </div>
</div>
<?php endif; ?>

<div class="content-layout container">
    
    <!-- Main Content -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-content'); ?>>
        
        <?php if (has_post_thumbnail()) : ?>
        <div class="single-featured-image">
            <?php the_post_thumbnail('calcfinance-featured', array('loading' => 'eager')); ?>
        </div>
        <?php endif; ?>
        
        <div class="entry-content">
            <?php the_content(); ?>
            
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'calcfinance'),
                'after'  => '</div>',
            ));
            ?>
        </div>
        
        <!-- Article Middle Ad -->
        <?php $article_middle_ad = get_theme_mod('calcfinance_ad_article_middle', ''); ?>
        <?php if (!empty($article_middle_ad)) : ?>
        <div class="ad-placeholder ad-article">
            <?php echo wp_kses_post($article_middle_ad); ?>
        </div>
        <?php endif; ?>
        
        <!-- Post Footer -->
        <div class="post-footer">
            
            <!-- Tags -->
            <?php $tags = get_the_tags(); ?>
            <?php if ($tags) : ?>
            <div class="post-tags">
                <i class="fas fa-tags" style="color: var(--text-muted); margin-right: 0.5rem;"></i>
                <?php foreach ($tags as $tag) : ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
            <!-- Author Box -->
            <div class="author-box">
                <div class="author-avatar">
                    <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'author-avatar-img')); ?>
                </div>
                <div class="author-info">
                    <h4 class="author-name">
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                            <?php echo esc_html(get_the_author_meta('display_name')); ?>
                        </a>
                    </h4>
                    <p class="author-bio"><?php echo esc_html(get_the_author_meta('description')); ?></p>
                </div>
            </div>
            
            <!-- Article Bottom Ad -->
            <?php $article_bottom_ad = get_theme_mod('calcfinance_ad_article_bottom', ''); ?>
            <?php if (!empty($article_bottom_ad)) : ?>
            <div class="ad-placeholder ad-article">
                <?php echo wp_kses_post($article_bottom_ad); ?>
            </div>
            <?php endif; ?>
            
            <!-- Related Posts -->
            <div class="related-posts">
                <h3 class="related-posts-title"><?php esc_html_e('Related Articles', 'calcfinance'); ?></h3>
                <div class="article-grid">
                    <?php
                    $categories = get_the_category();
                    $cat_ids = array();
                    if (!empty($categories)) {
                        foreach ($categories as $cat) {
                            $cat_ids[] = $cat->term_id;
                        }
                    }
                    
                    $related = new WP_Query(array(
                        'category__in'        => $cat_ids,
                        'posts_per_page'      => 3,
                        'post__not_in'        => array(get_the_ID()),
                        'ignore_sticky_posts' => true,
                    ));
                    
                    if ($related->have_posts()) :
                        while ($related->have_posts()) : $related->the_post();
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
                                    <span><i class="far fa-clock"></i> <?php echo esc_html(calcfinance_reading_time()); ?> min</span>
                                </div>
                                <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                        </article>
                    <?php
                        endwhile;
                    else :
                        echo '<p>' . esc_html__('No related articles found.', 'calcfinance') . '</p>';
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            
        </div>
        
    </article>
    
    <!-- Sidebar -->
    <?php get_sidebar(); ?>
    
</div>

<?php
endwhile;
get_footer();
