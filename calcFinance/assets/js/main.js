/**
 * CalcFinance Main JavaScript
 *
 * @package CalcFinance
 * @version 1.0.0
 */

(function() {
    'use strict';
    
    // ============================
    // DARK MODE TOGGLE
    // ============================
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const body = document.body;
    
    // Check for saved theme preference or system preference
    function getTheme() {
        const savedTheme = localStorage.getItem('calcfinance-theme');
        if (savedTheme) {
            return savedTheme;
        }
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            return 'dark';
        }
        return 'light';
    }
    
    // Apply theme
    function applyTheme(theme) {
        body.setAttribute('data-theme', theme);
        localStorage.setItem('calcfinance-theme', theme);
    }
    
    // Initialize theme
    applyTheme(getTheme());
    
    // Toggle handler
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            applyTheme(newTheme);
        });
    }
    
    // Listen for system theme changes
    if (window.matchMedia) {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
            if (!localStorage.getItem('calcfinance-theme')) {
                applyTheme(e.matches ? 'dark' : 'light');
            }
        });
    }
    
    // ============================
    // MOBILE MENU TOGGLE
    // ============================
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mainNav = document.getElementById('main-nav');
    
    if (mobileMenuToggle && mainNav) {
        mobileMenuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            mainNav.classList.toggle('active');
            const isExpanded = this.classList.contains('active');
            this.setAttribute('aria-expanded', isExpanded);
        });
        
        // Close menu when clicking on a link
        const navLinks = mainNav.querySelectorAll('a');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileMenuToggle.classList.remove('active');
                mainNav.classList.remove('active');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }
    
    // Dropdown toggle for mobile
    const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children > a');
    menuItemsWithChildren.forEach(function(item) {
        item.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                this.parentElement.classList.toggle('active');
            }
        });
    });
    
    // ============================
    // SEARCH OVERLAY
    // ============================
    const searchToggle = document.getElementById('search-toggle');
    const searchOverlay = document.getElementById('search-overlay');
    const searchClose = document.getElementById('search-close');
    
    if (searchToggle && searchOverlay) {
        searchToggle.addEventListener('click', function() {
            searchOverlay.classList.add('active');
            const searchInput = searchOverlay.querySelector('input[type="search"]');
            if (searchInput) {
                setTimeout(function() {
                    searchInput.focus();
                }, 100);
            }
            document.body.style.overflow = 'hidden';
        });
    }
    
    if (searchClose && searchOverlay) {
        searchClose.addEventListener('click', closeSearch);
        
        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
                closeSearch();
            }
        });
        
        // Close on backdrop click
        searchOverlay.addEventListener('click', function(e) {
            if (e.target === searchOverlay) {
                closeSearch();
            }
        });
    }
    
    function closeSearch() {
        searchOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    // ============================
    // STICKY HEADER
    // ============================
    const siteHeader = document.getElementById('site-header');
    let lastScrollY = 0;
    
    function handleScroll() {
        const scrollY = window.scrollY;
        
        // Add scrolled class
        if (siteHeader) {
            if (scrollY > 10) {
                siteHeader.classList.add('scrolled');
            } else {
                siteHeader.classList.remove('scrolled');
            }
        }
        
        lastScrollY = scrollY;
    }
    
    // Throttled scroll handler
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                handleScroll();
                ticking = false;
            });
            ticking = true;
        }
    });
    
    // ============================
    // BACK TO TOP BUTTON
    // ============================
    const backToTop = document.getElementById('back-to-top');
    
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // ============================
    // READING PROGRESS BAR
    // ============================
    const readingProgress = document.getElementById('reading-progress');
    
    if (readingProgress) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            readingProgress.style.width = progress + '%';
        });
    }
    
    // ============================
    // LAZY LOADING IMAGES
    // ============================
    if ('IntersectionObserver' in window) {
        const lazyImages = document.querySelectorAll('img[loading="lazy"]');
        
        const imageObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px 0px'
        });
        
        lazyImages.forEach(function(img) {
            imageObserver.observe(img);
        });
    }
    
    // ============================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ============================
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const headerHeight = siteHeader ? siteHeader.offsetHeight : 72;
                const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // ============================
    // ANIMATION ON SCROLL
    // ============================
    function animateOnScroll() {
        const elements = document.querySelectorAll('.card, .calculator-card, .category-card');
        
        elements.forEach(function(el) {
            const rect = el.getBoundingClientRect();
            const isVisible = rect.top < window.innerHeight - 50;
            
            if (isVisible) {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }
        });
    }
    
    // Set initial state for animated elements
    document.querySelectorAll('.card, .calculator-card, .category-card').forEach(function(el) {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });
    
    // Trigger animation on scroll
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(animateOnScroll, 50);
    });
    
    // Initial check
    setTimeout(animateOnScroll, 200);
    
    // ============================
    // CALCULATOR INPUT LIVE UPDATE
    // ============================
    document.querySelectorAll('.calculator-box').forEach(function(box) {
        const inputs = box.querySelectorAll('input, select');
        const calculateBtn = box.querySelector('button[onclick^="calculate"]');
        
        inputs.forEach(function(input) {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (calculateBtn) calculateBtn.click();
                }
            });
        });
    });
    
    // ============================
    // PRINT STYLES FOR CALCULATORS
    // ============================
    document.querySelectorAll('.calculator-box').forEach(function(box) {
        const printBtn = document.createElement('button');
        printBtn.type = 'button';
        printBtn.className = 'icon-btn';
        printBtn.innerHTML = '<i class="fas fa-print"></i>';
        printBtn.title = 'Print Results';
        printBtn.style.cssText = 'position: absolute; top: 1.5rem; right: 1.5rem;';
        printBtn.addEventListener('click', function() {
            window.print();
        });
        box.style.position = 'relative';
        box.appendChild(printBtn);
    });
    
    // ============================
    // EXTERNAL LINK HANDLER
    // ============================
    document.querySelectorAll('a[href^="http"]').forEach(function(link) {
        if (!link.href.includes(window.location.hostname)) {
            link.setAttribute('target', '_blank');
            link.setAttribute('rel', 'noopener noreferrer');
        }
    });
    
    // ============================
    // TABLE OF CONTENTS (for long posts)
    // ============================
    function generateTOC() {
        const content = document.querySelector('.entry-content');
        if (!content) return;
        
        const headings = content.querySelectorAll('h2, h3');
        if (headings.length < 3) return;
        
        const toc = document.createElement('div');
        toc.className = 'toc';
        toc.style.cssText = 'background: var(--bg-section); border: 1px solid var(--border); border-radius: var(--radius); padding: 1.5rem; margin-bottom: 2rem;';
        
        let tocHTML = '<h4 style="margin-bottom: 1rem;"><i class="fas fa-list"></i> ' + 'Table of Contents' + '</h4><ul style="list-style: none; padding: 0; margin: 0;">';
        
        headings.forEach(function(heading, index) {
            const id = 'toc-' + index;
            heading.id = id;
            const level = heading.tagName === 'H2' ? '' : 'padding-left: 1.5rem;';
            tocHTML += '<li style="padding: 0.35rem 0; ' + level + '"><a href="#' + id + '" style="color: var(--text-secondary); font-size: 0.9rem;">' + heading.textContent + '</a></li>';
        });
        
        tocHTML += '</ul>';
        toc.innerHTML = tocHTML;
        
        content.insertBefore(toc, content.firstChild);
    }
    
    if (document.body.classList.contains('single-post') || document.body.classList.contains('singular')) {
        generateTOC();
    }
    
    // ============================
    // FORM VALIDATION ENHANCEMENT
    // ============================
    document.querySelectorAll('input[type="number"]').forEach(function(input) {
        input.addEventListener('input', function() {
            const min = parseFloat(this.min);
            const max = parseFloat(this.max);
            const val = parseFloat(this.value);
            
            if (!isNaN(min) && val < min) this.value = min;
            if (!isNaN(max) && val > max) this.value = max;
        });
    });
    
    // ============================
    // KEYBOARD SHORTCUTS
    // ============================
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K for search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            if (searchToggle) searchToggle.click();
        }
        
        // Escape to close overlays
        if (e.key === 'Escape') {
            if (searchOverlay && searchOverlay.classList.contains('active')) {
                closeSearch();
            }
            if (mainNav && mainNav.classList.contains('active')) {
                mobileMenuToggle.click();
            }
        }
    });
    
    // ============================
    // CONSOLE BRANDING
    // ============================
    console.log('%c CalcFinance ', 'background: linear-gradient(135deg, #2563eb, #14b8a6); color: white; font-size: 20px; font-weight: bold; padding: 10px 20px; border-radius: 8px;');
    console.log('%c Premium Finance WordPress Theme ', 'color: #2563eb; font-size: 12px;');
    
})();
