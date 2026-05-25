<?php
/**
 * CalcFinance Homepage Template
 *
 * @package CalcFinance
 */

get_header();

// Get customizer settings
$show_hero        = get_theme_mod('calcfinance_show_hero', true);
$show_trending    = get_theme_mod('calcfinance_show_trending', true);
$show_categories  = get_theme_mod('calcfinance_show_categories', true);
$show_calculators = get_theme_mod('calcfinance_show_calculators', true);
$show_latest      = get_theme_mod('calcfinance_show_latest', true);
$trending_count   = get_theme_mod('calcfinance_trending_count', 6);
$latest_count     = get_theme_mod('calcfinance_latest_count', 6);
$featured_posts   = get_theme_mod('calcfinance_featured_posts', '');
?>

<!-- ==================== HERO SECTION ==================== -->
<?php if ($show_hero) : ?>
<section class="hero" id="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-chart-line"></i>
                    <span><?php esc_html_e('Trusted by 50,000+ users', 'calcfinance'); ?></span>
                </div>
                <h1 class="hero-title">
                    <?php echo esc_html(get_theme_mod('calcfinance_hero_title', 'Smart Financial Decisions Start Here')); ?>
                </h1>
                <p class="hero-subtitle">
                    <?php echo esc_html(get_theme_mod('calcfinance_hero_subtitle', 'Compare financial products, calculate costs and discover smarter money strategies.')); ?>
                </p>
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(get_theme_mod('calcfinance_hero_btn1_url', '#articles')); ?>" class="btn btn-primary btn-lg">
                        <?php echo esc_html(get_theme_mod('calcfinance_hero_btn1_text', 'Explore Guides')); ?>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="<?php echo esc_url(get_theme_mod('calcfinance_hero_btn2_url', '#calculators')); ?>" class="btn btn-ghost btn-lg">
                        <i class="fas fa-calculator"></i>
                        <?php echo esc_html(get_theme_mod('calcfinance_hero_btn2_text', 'Use Calculators')); ?>
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-number">25+</div>
                        <div class="hero-stat-label"><?php esc_html_e('Calculators', 'calcfinance'); ?></div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number">500+</div>
                        <div class="hero-stat-label"><?php esc_html_e('Articles', 'calcfinance'); ?></div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number">50K+</div>
                        <div class="hero-stat-label"><?php esc_html_e('Readers', 'calcfinance'); ?></div>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <?php $hero_image = get_theme_mod('calcfinance_hero_image', ''); ?>
                <?php if (!empty($hero_image)) : ?>
                    <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Financial planning illustration', 'calcfinance'); ?>" loading="eager">
                <?php else : ?>
                    <img src="<?php echo esc_url(CALCFINANCE_URI . '/assets/images/hero-illustration.svg'); ?>" alt="<?php esc_attr_e('Financial planning illustration', 'calcfinance'); ?>" loading="eager" onerror="this.outerHTML='<div style=\'background:linear-gradient(135deg,rgba(37,99,235,0.2),rgba(20,184,166,0.2));border-radius:24px;height:400px;display:flex;align-items:center;justify-content:center;font-size:4rem;color:rgba(255,255,255,0.3);\'><i class=\'fas fa-chart-pie\'></i></div>'">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==================== TRENDING ARTICLES ==================== -->
<?php if ($show_trending) : ?>
<section class="section" id="articles">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('Trending Articles', 'calcfinance'); ?></h2>
            <p><?php esc_html_e('Stay ahead with our most popular financial guides and insights.', 'calcfinance'); ?></p>
        </div>
        
        <?php
        $trending_args = array(
            'posts_per_page'      => $trending_count,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'meta_key'            => '_calcfinance_views',
            'orderby'             => 'meta_value_num',
            'order'               => 'DESC',
        );
        
        // If featured posts are set, prioritize them
        if (!empty($featured_posts)) {
            $featured_ids = array_map('intval', explode(',', $featured_posts));
            $trending_args['post__in'] = $featured_ids;
            $trending_args['orderby'] = 'post__in';
            unset($trending_args['meta_key']);
        }
        
        $trending_query = new WP_Query($trending_args);
        ?>
        
        <?php if ($trending_query->have_posts()) : ?>
        <div class="article-grid<?php echo !empty($featured_posts) ? ' article-grid-featured' : ''; ?>">
            <?php while ($trending_query->have_posts()) : $trending_query->the_post(); ?>
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
        <?php else : ?>
            <div class="notice notice-info" style="text-align:center;">
                <p><?php esc_html_e('No articles found. Start publishing to see them here!', 'calcfinance'); ?></p>
            </div>
        <?php endif; wp_reset_postdata(); ?>
        
    </div>
</section>
<?php endif; ?>

<!-- ==================== FINANCE CATEGORIES ==================== -->
<?php if ($show_categories) : ?>
<section class="section section-alt" id="categories">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('Explore Financial Topics', 'calcfinance'); ?></h2>
            <p><?php esc_html_e('Browse our comprehensive guides across all major financial categories.', 'calcfinance'); ?></p>
        </div>
        
        <div class="category-grid">
            <?php
            $categories = array(
                array(
                    'name'  => 'Credit Cards',
                    'slug'  => 'credit-cards',
                    'icon'  => 'fa-credit-card',
                    'color' => '#2563eb',
                ),
                array(
                    'name'  => 'Insurance',
                    'slug'  => 'insurance',
                    'icon'  => 'fa-shield-halved',
                    'color' => '#14b8a6',
                ),
                array(
                    'name'  => 'Loans',
                    'slug'  => 'loans',
                    'icon'  => 'fa-hand-holding-dollar',
                    'color' => '#f59e0b',
                ),
                array(
                    'name'  => 'Mortgage',
                    'slug'  => 'mortgage',
                    'icon'  => 'fa-house-chimney',
                    'color' => '#8b5cf6',
                ),
                array(
                    'name'  => 'Savings',
                    'slug'  => 'savings',
                    'icon'  => 'fa-piggy-bank',
                    'color' => '#10b981',
                ),
                array(
                    'name'  => 'Finance News',
                    'slug'  => 'finance-news',
                    'icon'  => 'fa-newspaper',
                    'color' => '#ef4444',
                ),
            );
            
            foreach ($categories as $cat) :
                $category = get_category_by_slug($cat['slug']);
                $link = $category ? get_category_link($category->term_id) : '#';
                $count = $category ? $category->count : 0;
            ?>
                <a href="<?php echo esc_url($link); ?>" class="category-card">
                    <div class="category-icon" style="color: <?php echo esc_attr($cat['color']); ?>;">
                        <i class="fas <?php echo esc_attr($cat['icon']); ?>"></i>
                    </div>
                    <span class="category-title"><?php echo esc_html($cat['name']); ?></span>
                    <span class="category-count"><?php echo esc_html($count); ?> <?php esc_html_e('articles', 'calcfinance'); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==================== FEATURED CALCULATORS ==================== -->
<?php if ($show_calculators) : ?>
<section class="section" id="calculators">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('Financial Calculators', 'calcfinance'); ?></h2>
            <p><?php esc_html_e('Make informed decisions with our free, easy-to-use financial calculators.', 'calcfinance'); ?></p>
        </div>
        
        <div class="calculator-grid">
            
            <a href="<?php echo esc_url(home_url('/mortgage-calculator')); ?>" class="calculator-card">
                <div class="calculator-icon">
                    <i class="fas fa-house-chimney"></i>
                </div>
                <h3 class="calculator-title"><?php esc_html_e('Mortgage Calculator', 'calcfinance'); ?></h3>
                <p class="calculator-desc"><?php esc_html_e('Calculate your monthly mortgage payments and see the total cost of your home loan.', 'calcfinance'); ?></p>
                <span class="calculator-link"><?php esc_html_e('Use Calculator', 'calcfinance'); ?> <i class="fas fa-arrow-right"></i></span>
            </a>
            
            <a href="<?php echo esc_url(home_url('/emi-calculator')); ?>" class="calculator-card">
                <div class="calculator-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <h3 class="calculator-title"><?php esc_html_e('EMI Calculator', 'calcfinance'); ?></h3>
                <p class="calculator-desc"><?php esc_html_e('Calculate Equated Monthly Installments for any loan amount, interest rate and tenure.', 'calcfinance'); ?></p>
                <span class="calculator-link"><?php esc_html_e('Use Calculator', 'calcfinance'); ?> <i class="fas fa-arrow-right"></i></span>
            </a>
            
            <a href="<?php echo esc_url(home_url('/loan-calculator')); ?>" class="calculator-card">
                <div class="calculator-icon">
                    <i class="fas fa-hand-holding-dollar"></i>
                </div>
                <h3 class="calculator-title"><?php esc_html_e('Loan Calculator', 'calcfinance'); ?></h3>
                <p class="calculator-desc"><?php esc_html_e('Estimate personal loan payments, total interest, and amortization schedule.', 'calcfinance'); ?></p>
                <span class="calculator-link"><?php esc_html_e('Use Calculator', 'calcfinance'); ?> <i class="fas fa-arrow-right"></i></span>
            </a>
            
            <a href="<?php echo esc_url(home_url('/savings-calculator')); ?>" class="calculator-card">
                <div class="calculator-icon">
                    <i class="fas fa-piggy-bank"></i>
                </div>
                <h3 class="calculator-title"><?php esc_html_e('Savings Calculator', 'calcfinance'); ?></h3>
                <p class="calculator-desc"><?php esc_html_e('See how much you can save over time with regular deposits and compound interest.', 'calcfinance'); ?></p>
                <span class="calculator-link"><?php esc_html_e('Use Calculator', 'calcfinance'); ?> <i class="fas fa-arrow-right"></i></span>
            </a>
            
            <a href="<?php echo esc_url(home_url('/credit-score-estimator')); ?>" class="calculator-card">
                <div class="calculator-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="calculator-title"><?php esc_html_e('Credit Score Estimator', 'calcfinance'); ?></h3>
                <p class="calculator-desc"><?php esc_html_e('Answer a few questions to get an estimated range of your credit score.', 'calcfinance'); ?></p>
                <span class="calculator-link"><?php esc_html_e('Use Calculator', 'calcfinance'); ?> <i class="fas fa-arrow-right"></i></span>
            </a>
            
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==================== LATEST ARTICLES ==================== -->
<?php if ($show_latest) : ?>
<section class="section section-alt" id="latest">
    <div class="container">
        <div class="section-header">
            <h2><?php esc_html_e('Latest Articles', 'calcfinance'); ?></h2>
            <p><?php esc_html_e('Fresh insights and guides published this week.', 'calcfinance'); ?></p>
        </div>
        
        <?php
        $latest_query = new WP_Query(array(
            'posts_per_page'      => $latest_count,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ));
        ?>
        
        <?php if ($latest_query->have_posts()) : ?>
        <div class="article-grid">
            <?php while ($latest_query->have_posts()) : $latest_query->the_post(); ?>
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
        
        <div style="text-align: center; margin-top: 3rem;">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline btn-lg">
                <?php esc_html_e('View All Articles', 'calcfinance'); ?>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <?php else : ?>
            <div class="notice notice-info" style="text-align:center;">
                <p><?php esc_html_e('No articles yet. Start writing your first post!', 'calcfinance'); ?></p>
            </div>
        <?php endif; wp_reset_postdata(); ?>
        
    </div>
</section>
<?php endif; ?>

<!-- ==================== AD PLACEHOLDER: ARTICLE BOTTOM ==================== -->
<div class="container">
    <div class="ad-placeholder ad-article">
        <span><i class="fas fa-ad"></i> <?php esc_html_e('Advertisement Space', 'calcfinance'); ?></span>
    </div>
</div>

<?php get_footer(); ?>
