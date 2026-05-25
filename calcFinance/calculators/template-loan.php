<?php
/**
 * Template Name: Loan Calculator
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
                    <?php esc_html_e('Personal Loan Calculator', 'calcfinance'); ?>
                </h1>
                <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto;">
                    <?php esc_html_e('Estimate your personal loan payments, total interest, and amortization schedule. Compare different loan scenarios.', 'calcfinance'); ?>
                </p>
            </div>
            
            <div class="ad-placeholder" style="margin-bottom: 2rem;">
                <span><i class="fas fa-ad"></i> <?php esc_html_e('Ad Space', 'calcfinance'); ?></span>
            </div>
            
            <div class="calculator-box" data-calculator="loan">
                <div class="form-row">
                    <div class="form-group">
                        <label for="loan-amount"><?php esc_html_e('Loan Amount', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="loan-amount" value="15000" min="100" step="500" placeholder="15000">
                    </div>
                    <div class="form-group">
                        <label for="loan-rate"><?php esc_html_e('Annual Interest Rate', 'calcfinance'); ?> (%)</label>
                        <input type="number" id="loan-rate" value="10.99" min="0" max="100" step="0.01" placeholder="10.99">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="loan-duration"><?php esc_html_e('Loan Duration', 'calcfinance'); ?> (<?php esc_html_e('Months', 'calcfinance'); ?>)</label>
                        <input type="number" id="loan-duration" value="48" min="3" max="360" step="1" placeholder="48">
                    </div>
                    <div class="form-group">
                        <label for="loan-fees"><?php esc_html_e('Origination Fees', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="loan-fees" value="0" min="0" step="10" placeholder="0">
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 1rem;" onclick="calculateLoan()">
                    <i class="fas fa-calculator"></i> <?php esc_html_e('Calculate Loan', 'calcfinance'); ?>
                </button>
                
                <div id="loan-result" style="display: none;">
                    <div class="result-grid">
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Monthly Payment', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="loan-monthly" style="color: var(--accent); font-size: 1.5rem;">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Payment', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="loan-total">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Interest', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="loan-interest">$0</div>
                        </div>
                    </div>
                    <div class="result-grid" style="margin-top: 1rem;">
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('APR', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="loan-apr">0%</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Cost', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="loan-cost">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Payoff Date', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="loan-payoff">-</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Affiliate Comparison -->
            <div style="margin-top: 3rem;">
                <h2><?php esc_html_e('Compare Personal Loan Options', 'calcfinance'); ?></h2>
                <div class="table-responsive">
                    <table class="affiliate-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e('Lender', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('APR Range', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('Loan Amount', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('Min. Credit', 'calcfinance'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="product-name">SoFi</div></td>
                                <td><div class="product-rate">8.99% - 25.81%</div></td>
                                <td>$5K - $100K</td>
                                <td>680</td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Check Rate', 'calcfinance'); ?></a></td>
                            </tr>
                            <tr>
                                <td><div class="product-name">Marcus</div></td>
                                <td><div class="product-rate">6.99% - 24.99%</div></td>
                                <td>$3.5K - $40K</td>
                                <td>660</td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Check Rate', 'calcfinance'); ?></a></td>
                            </tr>
                            <tr>
                                <td><div class="product-name">Upgrade</div></td>
                                <td><div class="product-rate">8.49% - 35.99%</div></td>
                                <td>$1K - $50K</td>
                                <td>560</td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Check Rate', 'calcfinance'); ?></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
function calculateLoan() {
    const amount = parseFloat(document.getElementById('loan-amount').value) || 0;
    const rate = parseFloat(document.getElementById('loan-rate').value) || 0;
    const duration = parseFloat(document.getElementById('loan-duration').value) || 0;
    const fees = parseFloat(document.getElementById('loan-fees').value) || 0;
    
    const monthlyRate = rate / 100 / 12;
    let monthly = 0;
    
    if (rate > 0) {
        monthly = amount * monthlyRate * Math.pow(1 + monthlyRate, duration) / (Math.pow(1 + monthlyRate, duration) - 1);
    } else {
        monthly = amount / duration;
    }
    
    const totalPayment = monthly * duration;
    const totalInterest = totalPayment - amount;
    const totalCost = totalPayment + fees;
    
    // Approximate APR calculation
    const netProceeds = amount - fees;
    let apr = rate;
    if (fees > 0 && netProceeds > 0) {
        const monthlyAPR = Math.pow(totalPayment / netProceeds, 1 / (duration / 12)) - 1;
        apr = monthlyAPR * 12 * 100;
    }
    
    // Payoff date
    const payoffDate = new Date();
    payoffDate.setMonth(payoffDate.getMonth() + Math.ceil(duration));
    const payoffStr = payoffDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'});
    
    document.getElementById('loan-monthly').textContent = '$' + monthly.toLocaleString('en-US', {maximumFractionDigits: 2});
    document.getElementById('loan-total').textContent = '$' + totalPayment.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('loan-interest').textContent = '$' + totalInterest.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('loan-apr').textContent = apr.toFixed(2) + '%';
    document.getElementById('loan-cost').textContent = '$' + totalCost.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('loan-payoff').textContent = payoffStr;
    
    document.getElementById('loan-result').style.display = 'block';
    document.getElementById('loan-result').scrollIntoView({behavior: 'smooth', block: 'nearest'});
}

document.addEventListener('DOMContentLoaded', function() {
    calculateLoan();
    ['loan-amount', 'loan-rate', 'loan-duration', 'loan-fees'].forEach(function(id) {
        document.getElementById(id).addEventListener('input', calculateLoan);
    });
});
</script>

<?php get_footer(); ?>
