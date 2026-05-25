<?php
/**
 * Template Name: Savings Calculator
 *
 * @package CalcFinance
 */

get_header();
?>

<section class="calculator-page">
    <div class="container">
        <div class="calculator-container">
            
            <div class="calculator-header">
                <div class="badge badge-primary" style="margin-bottom: 1rem;">
                    <i class="fas fa-calculator"></i> <?php esc_html_e('Calculator', 'calcfinance'); ?>
                </div>
                <h1 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; margin-bottom: 0.5rem;">
                    <?php esc_html_e('Savings Calculator', 'calcfinance'); ?>
                </h1>
                <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto;">
                    <?php esc_html_e('See how much you can save over time with regular deposits and compound interest. Plan for emergencies, goals, or retirement.', 'calcfinance'); ?>
                </p>
            </div>
            
            <div class="ad-placeholder" style="margin-bottom: 2rem;">
                <span><i class="fas fa-ad"></i> <?php esc_html_e('Ad Space', 'calcfinance'); ?></span>
            </div>
            
            <div class="calculator-box" data-calculator="savings">
                <div class="form-row">
                    <div class="form-group">
                        <label for="savings-initial"><?php esc_html_e('Initial Deposit', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="savings-initial" value="1000" min="0" step="100" placeholder="1000">
                    </div>
                    <div class="form-group">
                        <label for="savings-monthly"><?php esc_html_e('Monthly Contribution', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="savings-monthly" value="500" min="0" step="25" placeholder="500">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="savings-rate"><?php esc_html_e('Annual Interest Rate', 'calcfinance'); ?> (%)</label>
                        <input type="number" id="savings-rate" value="4.5" min="0" max="20" step="0.01" placeholder="4.5">
                    </div>
                    <div class="form-group">
                        <label for="savings-years"><?php esc_html_e('Time Period', 'calcfinance'); ?> (<?php esc_html_e('Years', 'calcfinance'); ?>)</label>
                        <input type="number" id="savings-years" value="10" min="1" max="50" step="1" placeholder="10">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="savings-compound"><?php esc_html_e('Compound Frequency', 'calcfinance'); ?></label>
                        <select id="savings-compound">
                            <option value="12"><?php esc_html_e('Monthly', 'calcfinance'); ?></option>
                            <option value="4"><?php esc_html_e('Quarterly', 'calcfinance'); ?></option>
                            <option value="2"><?php esc_html_e('Semi-Annually', 'calcfinance'); ?></option>
                            <option value="1" selected><?php esc_html_e('Annually', 'calcfinance'); ?></option>
                            <option value="365"><?php esc_html_e('Daily', 'calcfinance'); ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="savings-tax"><?php esc_html_e('Tax Rate on Interest', 'calcfinance'); ?> (%)</label>
                        <input type="number" id="savings-tax" value="0" min="0" max="50" step="1" placeholder="0">
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 1rem;" onclick="calculateSavings()">
                    <i class="fas fa-calculator"></i> <?php esc_html_e('Calculate Savings', 'calcfinance'); ?>
                </button>
                
                <div id="savings-result" style="display: none;">
                    <div class="result-grid">
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Final Balance', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="savings-final" style="color: var(--accent); font-size: 1.5rem;">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Deposits', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="savings-deposits">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Interest', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="savings-interest-earned">$0</div>
                        </div>
                    </div>
                    <div class="result-grid" style="margin-top: 1rem;">
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Interest After Tax', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="savings-after-tax">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Effective APY', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="savings-apy">0%</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 3rem;">
                <h2><?php esc_html_e('The Power of Compound Interest', 'calcfinance'); ?></h2>
                <p><?php esc_html_e('Compound interest is often called the eighth wonder of the world. It means you earn interest not only on your initial deposit but also on the interest that has been added to your account. The earlier you start saving, the more time your money has to grow.', 'calcfinance'); ?></p>
                
                <h3><?php esc_html_e('How Compound Interest Works', 'calcfinance'); ?></h3>
                <div class="notice notice-info">
                    <strong>A = P(1 + r/n)^(nt)</strong> + PMT x (((1 + r/n)^(nt) - 1) / (r/n))<br>
                    Where: A = final amount, P = principal, r = annual rate, n = compound frequency, t = years, PMT = monthly contribution
                </div>
                
                <h3><?php esc_html_e('Savings Strategies', 'calcfinance'); ?></h3>
                <ul>
                    <li><strong><?php esc_html_e('Start Early:', 'calcfinance'); ?></strong> <?php esc_html_e('Even small amounts grow significantly over time', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('Automate Savings:', 'calcfinance'); ?></strong> <?php esc_html_e('Set up automatic transfers to your savings account', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('High-Yield Accounts:', 'calcfinance'); ?></strong> <?php esc_html_e('Use HYSA or CDs for better interest rates', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('Emergency Fund:', 'calcfinance'); ?></strong> <?php esc_html_e('Aim for 3-6 months of expenses', 'calcfinance'); ?></li>
                </ul>
                
                <!-- Affiliate Comparison -->
                <h3><?php esc_html_e('Best High-Yield Savings Accounts', 'calcfinance'); ?></h3>
                <div class="table-responsive">
                    <table class="affiliate-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e('Bank', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('APY', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('Min. Balance', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('Monthly Fee', 'calcfinance'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="product-name">Marcus by Goldman Sachs</div></td>
                                <td><div class="product-rate">4.50%</div></td>
                                <td>$0</td>
                                <td>None</td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Open Account', 'calcfinance'); ?></a></td>
                            </tr>
                            <tr>
                                <td><div class="product-name">Ally Bank</div></td>
                                <td><div class="product-rate">4.25%</div></td>
                                <td>$0</td>
                                <td>None</td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Open Account', 'calcfinance'); ?></a></td>
                            </tr>
                            <tr>
                                <td><div class="product-name">Discover Bank</div></td>
                                <td><div class="product-rate">4.30%</div></td>
                                <td>$0</td>
                                <td>None</td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Open Account', 'calcfinance'); ?></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
function calculateSavings() {
    const initial = parseFloat(document.getElementById('savings-initial').value) || 0;
    const monthly = parseFloat(document.getElementById('savings-monthly').value) || 0;
    const rate = parseFloat(document.getElementById('savings-rate').value) || 0;
    const years = parseFloat(document.getElementById('savings-years').value) || 0;
    const compoundFreq = parseFloat(document.getElementById('savings-compound').value) || 12;
    const taxRate = parseFloat(document.getElementById('savings-tax').value) || 0;
    
    const r = rate / 100;
    const n = compoundFreq;
    const t = years;
    
    // Compound interest on initial deposit
    const compoundInitial = initial * Math.pow(1 + r/n, n*t);
    
    // Future value of monthly contributions
    const monthlyRate = r / n;
    const totalPeriods = n * t;
    const monthlyToPeriod = monthly * n / 12; // Convert monthly to period contribution
    
    let compoundContributions = 0;
    if (r > 0) {
        compoundContributions = monthly * ((Math.pow(1 + r/n, n*t) - 1) / (r/n)) * (n/12);
    } else {
        compoundContributions = monthly * 12 * t;
    }
    
    const finalBalance = compoundInitial + compoundContributions;
    const totalDeposits = initial + (monthly * 12 * t);
    const totalInterest = finalBalance - totalDeposits;
    const interestAfterTax = totalInterest * (1 - taxRate/100);
    const finalAfterTax = totalDeposits + interestAfterTax;
    
    // Effective APY
    const apy = (Math.pow(1 + r/n, n) - 1) * 100;
    
    document.getElementById('savings-final').textContent = '$' + finalAfterTax.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('savings-deposits').textContent = '$' + totalDeposits.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('savings-interest-earned').textContent = '$' + totalInterest.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('savings-after-tax').textContent = '$' + interestAfterTax.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('savings-apy').textContent = apy.toFixed(2) + '%';
    
    document.getElementById('savings-result').style.display = 'block';
    document.getElementById('savings-result').scrollIntoView({behavior: 'smooth', block: 'nearest'});
}

document.addEventListener('DOMContentLoaded', function() {
    calculateSavings();
    ['savings-initial', 'savings-monthly', 'savings-rate', 'savings-years', 'savings-compound', 'savings-tax'].forEach(function(id) {
        document.getElementById(id).addEventListener('input', calculateSavings);
        document.getElementById(id).addEventListener('change', calculateSavings);
    });
});
</script>

<?php get_footer(); ?>
