<?php
/**
 * CalcFinance Header Template
 *
 * @package CalcFinance
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-theme="light">
    
    <!-- Reading Progress Bar (Single Posts Only) -->
    <?php if (is_single()) : ?>
    <div class="reading-progress" id="reading-progress"></div>
    <?php endif; ?>
    
    <!-- Skip to Content Link -->
    <a href="#primary-content" class="skip-link"><?php esc_html_e('Skip to main content', 'calcfinance'); ?></a>
    
    <!-- Search Overlay -->
    <div class="search-overlay" id="search-overlay" role="dialog" aria-label="<?php esc_attr_e('Search', 'calcfinance'); ?>">
        <button class="search-close" id="search-close" aria-label="<?php esc_attr_e('Close search', 'calcfinance'); ?>">
            <i class="fas fa-times"></i>
        </button>
        <div class="search-box">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" name="s" placeholder="<?php esc_attr_e('Search articles, guides, calculators...', 'calcfinance'); ?>" aria-label="<?php esc_attr_e('Search', 'calcfinance'); ?>" autocomplete="off" autofocus>
                <button type="submit" aria-label="<?php esc_attr_e('Submit search', 'calcfinance'); ?>">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    
    <!-- Header Ad -->
    <?php $header_ad = get_theme_mod('calcfinance_ad_header', ''); ?>
    <?php if (!empty($header_ad)) : ?>
    <div class="ad-header">
        <div class="container">
            <?php echo wp_kses_post($header_ad); ?>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Site Header -->
    <header class="site-header" id="site-header">
        <div class="container">
            <div class="header-inner">
                
                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <span class="logo-text"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </a>
                
                <!-- Main Navigation -->
                <nav class="main-nav" id="main-nav" aria-label="<?php esc_attr_e('Primary Menu', 'calcfinance'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'menu_id'         => 'primary-menu',
                        'menu_class'      => 'nav-menu',
                        'container'       => false,
                        'fallback_cb'     => false,
                        'depth'           => 2,
                    ));
                    ?>
                </nav>
                
                <!-- Header Actions -->
                <div class="header-actions">
                    <button class="icon-btn search-toggle" id="search-toggle" aria-label="<?php esc_attr_e('Toggle search', 'calcfinance'); ?>">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="icon-btn dark-mode-toggle" id="dark-mode-toggle" aria-label="<?php esc_attr_e('Toggle dark mode', 'calcfinance'); ?>">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                    </button>
                    <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="<?php esc_attr_e('Toggle mobile menu', 'calcfinance'); ?>" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                
            </div>
        </div>
    </header>
    
    <!-- Spacer for fixed header -->
    <div class="header-spacer" style="height: 72px;"></div>
    
    <!-- Breadcrumbs (not on homepage) -->
    <?php if (!is_front_page() && !is_home()) : ?>
        <?php calcfinance_breadcrumbs(); ?>
    <?php endif; ?>
    
    <!-- Main Content Start -->
    <main id="primary-content" class="site-main">
