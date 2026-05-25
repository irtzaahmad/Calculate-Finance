<?php
/**
 * CalcFinance Search Results Template
 *
 * @package CalcFinance
 */

get_header();

$search_query = get_search_query();
?>

<section class="search-page">
    <div class="container">
        
        <div class="search-header">
            <h1 style="font-size: clamp(1.5rem, 4vw, 2.5rem); font-weight: 800; margin-bottom: 0.5rem;">
                <?php esc_html_e('Search Results', 'calcfinance'); ?>
            </h1>
            <p style="color: var(--text-muted); font-size: 1.1rem;">
                <?php
                printf(
                    esc_html__('Found %1$s results for "%2$s"', 'calcfinance'),
                    '<strong>' . esc_html($wp_query->found_posts) . '</strong>',
                    '<span class="search-term">' . esc_html($search_query) . '</span>'
                );
                ?>
            </p>
        </div>
        
        <!-- Large Search Form -->
        <div class="search-form-large">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="search-box">
                    <input type="text" name="s" value="<?php echo esc_attr($search_query); ?>" placeholder="<?php esc_attr_e('Search again...', 'calcfinance'); ?>" aria-label="<?php esc_attr_e('Search', 'calcfinance'); ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        
        <!-- Results -->
        <?php if (have_posts()) : ?>
            <div class="article-grid">
                <?php while (have_posts()) : the_post(); ?>
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
                <?php endwhile; ?>
            </div>
            
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
            ));
            ?>
            
        <?php else : ?>
            <div style="text-align: center; padding: 4rem 2rem;">
                <div style="font-size: 4rem; margin-bottom: 1.5rem;">🔍</div>
                <h2><?php esc_html_e('No results found', 'calcfinance'); ?></h2>
                <p style="color: var(--text-muted); max-width: 500px; margin: 0.5rem auto 2rem;">
                    <?php esc_html_e('We could not find any content matching your search. Try different keywords or browse our categories.', 'calcfinance'); ?>
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <i class="fas fa-home"></i> <?php esc_html_e('Go Home', 'calcfinance'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline">
                        <i class="fas fa-newspaper"></i> <?php esc_html_e('Browse Articles', 'calcfinance'); ?>
                    </a>
                </div>
                
                <!-- Suggested Searches -->
                <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                    <h4 style="margin-bottom: 1rem;"><?php esc_html_e('Popular Searches', 'calcfinance'); ?></h4>
                    <div style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;">
                        <?php
                        $popular_searches = array('mortgage rates', 'credit cards', 'personal loan', 'savings account', 'insurance');
                        foreach ($popular_searches as $term) :
                        ?>
                            <a href="<?php echo esc_url(home_url('/?s=' . urlencode($term))); ?>" style="display: inline-block; padding: 0.5rem 1rem; background: var(--bg-section); border-radius: var(--radius-full); font-size: 0.875rem; color: var(--text-secondary);">
                                <?php echo esc_html($term); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
    </div>
</section>

<?php get_footer(); ?>
