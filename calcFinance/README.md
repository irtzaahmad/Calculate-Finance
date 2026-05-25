# CalcFinance WordPress Theme

A premium, lightweight, SEO-optimized WordPress theme for finance content and calculator platforms. Built for high-traffic finance blogs targeting US, UK, Philippines, and high-CPM countries.

## Features

### Design
- Modern premium finance design (NerdWallet + Bankrate style)
- Fully responsive mobile-first design
- Dark mode toggle with system preference detection
- Smooth animations and scroll effects
- Rounded cards with soft shadows
- Sticky navbar with backdrop blur
- Professional typography with Inter font

### WordPress Features
- Custom logo support
- Featured images with custom sizes
- Two navigation menus (Primary + Footer)
- 8 widget areas (Homepage, Blog, Calculator, Footer x4, Before/After Content)
- Custom post types (Calculators, Guides)
- Custom taxonomies
- Theme Customizer with extensive options
- Breadcrumbs navigation
- Pagination
- Related posts
- Post views counter
- Reading time estimate

### SEO
- Schema.org JSON-LD markup (Article, BreadcrumbList, Organization, WebSite)
- Open Graph tags (Facebook, Twitter)
- Meta descriptions
- Canonical URLs
- Robots meta tags
- Clean heading structure
- Semantic HTML5

### Calculators (5 Built-in)
1. **Mortgage Calculator** - Monthly payments, amortization, PITI
2. **EMI Calculator** - Equated Monthly Installments
3. **Loan Calculator** - Personal loan payments with APR
4. **Savings Calculator** - Compound interest with tax considerations
5. **Credit Score Estimator** - Question-based score estimation

### Monetization
- Ad placeholder system (Header, Sidebar, Article Top/Middle/Bottom, Footer)
- Affiliate comparison tables
- Newsletter subscription section

### Performance
- Zero external dependencies (no jQuery, no heavy frameworks)
- Lazy loading for images
- Defer/async script loading
- Emoji and embed cleanup
- Minimal HTTP requests
- Optimized for shared hosting

## Installation

### Method 1: WordPress Admin
1. Download the theme as a ZIP file
2. Go to **Appearance > Themes > Add New > Upload Theme**
3. Choose the ZIP file and click **Install Now**
4. Click **Activate**

### Method 2: FTP/SFTP
1. Extract the ZIP file
2. Upload the `calcfinance` folder to `/wp-content/themes/`
3. Go to **Appearance > Themes** and activate CalcFinance

### Method 3: InfinityFree (or similar shared hosting)
1. Log in to your hosting control panel (VistaPanel)
2. Open the **Online File Manager**
3. Navigate to `htdocs/wp-content/themes/`
4. Upload the `calcfinance` folder (or ZIP and extract)
5. Go to WordPress Admin > Appearance > Themes and activate

## Setup After Installation

### 1. Create Calculator Pages
Create these pages and assign the corresponding page template:

| Page Title | Template |
|---|---|
| Mortgage Calculator | Mortgage Calculator |
| EMI Calculator | EMI Calculator |
| Loan Calculator | Loan Calculator |
| Savings Calculator | Savings Calculator |
| Credit Score Estimator | Credit Score Estimator |

### 2. Configure Menus
Go to **Appearance > Menus**:
- Create a "Primary Menu" with items: Home, Credit Cards, Insurance, Loans, Mortgage, Calculators, Finance News
- Assign it to the "Primary" location
- Create a "Footer Menu" with category links
- Assign it to the "Footer" location

### 3. Customize Theme
Go to **Appearance > Customize > CalcFinance Settings**:
- Set your hero section title and subtitle
- Upload a hero image (optional)
- Configure newsletter section
- Add social media links
- Add ad codes for monetization
- Customize colors
- Control homepage sections visibility

### 4. Set Up Widgets
Go to **Appearance > Widgets**:
- Add widgets to Homepage Sidebar, Blog Sidebar, or Footer areas
- Use CalcFinance custom widgets (Recent Posts, Popular Posts)

### 5. Create Categories
Create these main categories for your content:
- Credit Cards
- Insurance
- Loans
- Mortgage
- Savings
- Finance News

## File Structure

```
calcfinance/
├── style.css                 # Main stylesheet with theme header
├── functions.php             # Main theme functions
├── index.php                 # Fallback template
├── home.php                  # Homepage template
├── single.php                # Single post template
├── page.php                  # Page template
├── archive.php               # Archive/category template
├── search.php                # Search results template
├── 404.php                   # 404 error template
├── sidebar.php               # Sidebar template
├── header.php                # Header template
├── footer.php                # Footer template
├── README.md                 # This file
├── inc/                      # Include files
│   ├── theme-setup.php       # Theme initialization
│   ├── enqueue.php           # CSS/JS loading
│   ├── customizer.php        # Theme customizer options
│   ├── widgets.php           # Widget areas & custom widgets
│   ├── seo.php               # Schema markup & Open Graph
│   └── post-types.php        # Custom post types
├── calculators/              # Calculator page templates
│   ├── template-mortgage.php
│   ├── template-emi.php
│   ├── template-loan.php
│   ├── template-savings.php
│   └── template-credit-score.php
├── assets/
│   ├── css/
│   │   └── admin.css         # Admin styles
│   ├── js/
│   │   └── main.js           # Main JavaScript
│   └── images/               # Theme images
└── languages/                # Translation files
```

## WordPress Requirements

- WordPress 5.8 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher / MariaDB 10.1 or higher

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## License

GPL v2 or later

## Credits

- Font: Inter by Google Fonts
- Icons: Font Awesome 6
- Design Inspiration: NerdWallet, Bankrate

## Support

For support and documentation, visit: https://calcfinance.com/support
