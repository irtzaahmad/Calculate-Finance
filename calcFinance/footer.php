    </main><!-- #primary-content -->
    
    <!-- Newsletter Section -->
    <?php if (get_theme_mod('calcfinance_show_newsletter', true) && (is_front_page() || is_home())) : ?>
    <section class="newsletter-section" id="newsletter">
        <div class="container">
            <div class="newsletter-inner">
                <div class="newsletter-content">
                    <h2 class="newsletter-title"><?php echo esc_html(get_theme_mod('calcfinance_newsletter_title', 'Get Smart Financial Insights')); ?></h2>
                    <p class="newsletter-desc"><?php echo esc_html(get_theme_mod('calcfinance_newsletter_desc', 'Join 50,000+ subscribers getting weekly money tips, guides, and exclusive offers.')); ?></p>
                    
                    <?php $newsletter_form = get_theme_mod('calcfinance_newsletter_form', ''); ?>
                    <?php if (!empty($newsletter_form)) : ?>
                        <?php echo do_shortcode(wp_kses_post($newsletter_form)); ?>
                    <?php else : ?>
                    <form class="newsletter-form" method="post" action="#" onsubmit="event.preventDefault(); alert('Please configure your newsletter service in Customizer > CalcFinance Settings > Newsletter Section');">
                        <input type="email" name="email" placeholder="<?php esc_attr_e('Enter your email address', 'calcfinance'); ?>" required>
                        <button type="submit"><?php esc_html_e('Subscribe', 'calcfinance'); ?></button>
                    </form>
                    <?php endif; ?>
                    
                    <div class="newsletter-guarantee">
                        <i class="fas fa-lock"></i>
                        <span><?php esc_html_e('No spam. Unsubscribe anytime.', 'calcfinance'); ?></span>
                    </div>
                </div>
                <div class="newsletter-image">
                    <img src="<?php echo esc_url(CALCFINANCE_URI . '/assets/images/newsletter-illustration.svg'); ?>" alt="<?php esc_attr_e('Newsletter', 'calcfinance'); ?>" onerror="this.style.display='none'" loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    
    <!-- Footer Ad -->
    <?php $footer_ad = get_theme_mod('calcfinance_ad_footer', ''); ?>
    <?php if (!empty($footer_ad)) : ?>
    <div class="ad-footer container">
        <?php echo wp_kses_post($footer_ad); ?>
    </div>
    <?php endif; ?>
    
    <!-- Site Footer -->
    <footer class="site-footer" role="contentinfo">
        <div class="container">
            <div class="footer-grid">
                
                <!-- Brand Column -->
                <div class="footer-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <span class="logo-text"><?php bloginfo('name'); ?></span>
                        <?php endif; ?>
                    </a>
                    <p><?php echo esc_html(get_theme_mod('calcfinance_footer_about', 'CalcFinance helps you make smarter financial decisions with expert guides, powerful calculators, and unbiased comparisons.')); ?></p>
                    
                    <!-- Social Links -->
                    <div class="footer-social">
                        <?php $socials = array('facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'tiktok'); ?>
                        <?php foreach ($socials as $social) : ?>
                            <?php $url = get_theme_mod("calcfinance_social_{$social}", ''); ?>
                            <?php if (!empty($url)) : ?>
                                <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr(ucfirst($social)); ?>">
                                    <i class="fab fa-<?php echo esc_attr($social === 'twitter' ? 'x-twitter' : $social); ?>"></i>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Footer Menu 1 -->
                <div class="footer-menu-column">
                    <h4 class="footer-title"><?php esc_html_e('Categories', 'calcfinance'); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-links',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>
                
                <!-- Quick Links -->
                <div class="footer-menu-column">
                    <h4 class="footer-title"><?php esc_html_e('Quick Links', 'calcfinance'); ?></h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('calculator')); ?>"><?php esc_html_e('Calculators', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php esc_html_e('Privacy Policy', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/terms-of-service')); ?>"><?php esc_html_e('Terms of Service', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact Us', 'calcfinance'); ?></a></li>
                    </ul>
                </div>
                
                <!-- Calculators -->
                <div class="footer-menu-column">
                    <h4 class="footer-title"><?php esc_html_e('Calculators', 'calcfinance'); ?></h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/mortgage-calculator')); ?>"><?php esc_html_e('Mortgage Calculator', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/emi-calculator')); ?>"><?php esc_html_e('EMI Calculator', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/loan-calculator')); ?>"><?php esc_html_e('Loan Calculator', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/savings-calculator')); ?>"><?php esc_html_e('Savings Calculator', 'calcfinance'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/credit-score-estimator')); ?>"><?php esc_html_e('Credit Score Estimator', 'calcfinance'); ?></a></li>
                    </ul>
                </div>
                
            </div>
            
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p><?php echo esc_html(get_theme_mod('calcfinance_footer_copyright', '© ' . date('Y') . ' CalcFinance. All rights reserved.')); ?></p>
                <p>
                    <?php esc_html_e('Powered by', 'calcfinance'); ?> 
                    <a href="https://wordpress.org" target="_blank" rel="noopener"><?php esc_html_e('WordPress', 'calcfinance'); ?></a> | 
                    <?php esc_html_e('Theme:', 'calcfinance'); ?> 
                    <a href="<?php echo esc_url(CALCFINANCE_URI); ?>"><?php esc_html_e('CalcFinance', 'calcfinance'); ?></a>
                </p>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button class="back-to-top" id="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'calcfinance'); ?>">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <?php wp_footer(); ?>
    
</body>
</html>
