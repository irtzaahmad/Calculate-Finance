<?php
/**
 * Template Name: Mortgage Calculator
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
                    <?php esc_html_e('Mortgage Calculator', 'calcfinance'); ?>
                </h1>
                <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto;">
                    <?php esc_html_e('Calculate your monthly mortgage payments and see a full amortization breakdown. Estimate how much house you can afford.', 'calcfinance'); ?>
                </p>
            </div>
            
            <!-- Top Banner Ad -->
            <div class="ad-placeholder" style="margin-bottom: 2rem;">
                <span><i class="fas fa-ad"></i> <?php esc_html_e('Ad Space', 'calcfinance'); ?></span>
            </div>
            
            <div class="calculator-box" data-calculator="mortgage">
                <div class="form-row">
                    <div class="form-group">
                        <label for="mortgage-amount"><?php esc_html_e('Loan Amount', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="mortgage-amount" value="300000" min="1000" step="1000" placeholder="300000">
                    </div>
                    <div class="form-group">
                        <label for="mortgage-rate"><?php esc_html_e('Interest Rate', 'calcfinance'); ?> (%)</label>
                        <input type="number" id="mortgage-rate" value="6.5" min="0" max="30" step="0.01" placeholder="6.5">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mortgage-years"><?php esc_html_e('Loan Term', 'calcfinance'); ?> (<?php esc_html_e('Years', 'calcfinance'); ?>)</label>
                        <input type="number" id="mortgage-years" value="30" min="1" max="50" step="1" placeholder="30">
                    </div>
                    <div class="form-group">
                        <label for="mortgage-downpayment"><?php esc_html_e('Down Payment', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="mortgage-downpayment" value="60000" min="0" step="1000" placeholder="60000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mortgage-tax"><?php esc_html_e('Annual Property Tax', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="mortgage-tax" value="2400" min="0" step="100" placeholder="2400">
                    </div>
                    <div class="form-group">
                        <label for="mortgage-insurance"><?php esc_html_e('Annual Home Insurance', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="mortgage-insurance" value="1200" min="0" step="100" placeholder="1200">
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 1rem;" onclick="calculateMortgage()">
                    <i class="fas fa-calculator"></i> <?php esc_html_e('Calculate Mortgage', 'calcfinance'); ?>
                </button>
                
                <div id="mortgage-result" style="display: none;">
                    <div class="result-grid">
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Monthly Payment', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="mortgage-monthly" style="color: var(--accent); font-size: 1.5rem;">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Payment', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="mortgage-total">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Interest', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="mortgage-interest">$0</div>
                        </div>
                    </div>
                    
                    <div class="result-grid" style="margin-top: 1rem;">
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Loan Amount', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="mortgage-loan-amount">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Monthly Tax', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="mortgage-monthly-tax">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Monthly Insurance', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="mortgage-monthly-insurance">$0</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Info Section -->
            <div style="margin-top: 3rem;">
                <h2><?php esc_html_e('How Mortgage Payments Work', 'calcfinance'); ?></h2>
                <p><?php esc_html_e('Your monthly mortgage payment consists of principal and interest (P&I). Principal is the amount you borrowed, while interest is the cost of borrowing. You may also pay property taxes and homeowners insurance as part of your monthly payment (often called PITI).', 'calcfinance'); ?></p>
                
                <h3><?php esc_html_e('Mortgage Payment Formula', 'calcfinance'); ?></h3>
                <div class="notice notice-info">
                    <strong>M = P [ r(1+r)^n ] / [ (1+r)^n - 1 ]</strong><br>
                    Where: M = monthly payment, P = principal, r = monthly interest rate, n = number of payments
                </div>
                
                <h3><?php esc_html_e('Tips to Lower Your Mortgage Payment', 'calcfinance'); ?></h3>
                <ul>
                    <li><?php esc_html_e('Increase your down payment to reduce the loan amount', 'calcfinance'); ?></li>
                    <li><?php esc_html_e('Improve your credit score to qualify for lower interest rates', 'calcfinance'); ?></li>
                    <li><?php esc_html_e('Consider a longer loan term (but you will pay more interest overall)', 'calcfinance'); ?></li>
                    <li><?php esc_html_e('Shop around and compare offers from multiple lenders', 'calcfinance'); ?></li>
                    <li><?php esc_html_e('Buy discount points to lower your interest rate', 'calcfinance'); ?></li>
                </ul>
                
                <!-- Affiliate Comparison Table -->
                <h3><?php esc_html_e('Compare Mortgage Lenders', 'calcfinance'); ?></h3>
                <div class="table-responsive">
                    <table class="affiliate-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e('Lender', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('Rate (APR)', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('Min. Down', 'calcfinance'); ?></th>
                                <th><?php esc_html_e('Best For', 'calcfinance'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product-name">Quicken Loans</div>
                                    <small style="color: var(--text-muted);"><?php esc_html_e('Online lender', 'calcfinance'); ?></small>
                                </td>
                                <td>
                                    <div class="product-rate">6.75%</div>
                                    <div class="product-rate-label"><?php esc_html_e('30-year fixed', 'calcfinance'); ?></div>
                                </td>
                                <td>3%</td>
                                <td><?php esc_html_e('Online convenience', 'calcfinance'); ?></td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Apply Now', 'calcfinance'); ?></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-name">Wells Fargo</div>
                                    <small style="color: var(--text-muted);"><?php esc_html_e('Traditional bank', 'calcfinance'); ?></small>
                                </td>
                                <td>
                                    <div class="product-rate">6.50%</div>
                                    <div class="product-rate-label"><?php esc_html_e('30-year fixed', 'calcfinance'); ?></div>
                                </td>
                                <td>3%</td>
                                <td><?php esc_html_e('Existing customers', 'calcfinance'); ?></td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Apply Now', 'calcfinance'); ?></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-name">Navy Federal</div>
                                    <small style="color: var(--text-muted);"><?php esc_html_e('Credit union', 'calcfinance'); ?></small>
                                </td>
                                <td>
                                    <div class="product-rate">6.25%</div>
                                    <div class="product-rate-label"><?php esc_html_e('30-year fixed', 'calcfinance'); ?></div>
                                </td>
                                <td>0%</td>
                                <td><?php esc_html_e('Military members', 'calcfinance'); ?></td>
                                <td><a href="#" class="affiliate-btn" target="_blank" rel="noopener sponsored"><?php esc_html_e('Apply Now', 'calcfinance'); ?></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
function calculateMortgage() {
    const homePrice = parseFloat(document.getElementById('mortgage-amount').value) || 0;
    const rate = parseFloat(document.getElementById('mortgage-rate').value) || 0;
    const years = parseFloat(document.getElementById('mortgage-years').value) || 0;
    const downPayment = parseFloat(document.getElementById('mortgage-downpayment').value) || 0;
    const tax = parseFloat(document.getElementById('mortgage-tax').value) || 0;
    const insurance = parseFloat(document.getElementById('mortgage-insurance').value) || 0;
    
    const loanAmount = homePrice - downPayment;
    const monthlyRate = rate / 100 / 12;
    const numPayments = years * 12;
    
    let monthlyPayment = 0;
    if (rate > 0) {
        monthlyPayment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, numPayments)) / (Math.pow(1 + monthlyRate, numPayments) - 1);
    } else {
        monthlyPayment = loanAmount / numPayments;
    }
    
    const totalPayment = monthlyPayment * numPayments;
    const totalInterest = totalPayment - loanAmount;
    const monthlyTax = tax / 12;
    const monthlyInsurance = insurance / 12;
    const totalMonthly = monthlyPayment + monthlyTax + monthlyInsurance;
    
    document.getElementById('mortgage-monthly').textContent = '$' + totalMonthly.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('mortgage-total').textContent = '$' + totalPayment.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('mortgage-interest').textContent = '$' + totalInterest.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('mortgage-loan-amount').textContent = '$' + loanAmount.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('mortgage-monthly-tax').textContent = '$' + monthlyTax.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('mortgage-monthly-insurance').textContent = '$' + monthlyInsurance.toLocaleString('en-US', {maximumFractionDigits: 0});
    
    document.getElementById('mortgage-result').style.display = 'block';
    document.getElementById('mortgage-result').scrollIntoView({behavior: 'smooth', block: 'nearest'});
}

document.addEventListener('DOMContentLoaded', function() {
    calculateMortgage();
    ['mortgage-amount', 'mortgage-rate', 'mortgage-years', 'mortgage-downpayment', 'mortgage-tax', 'mortgage-insurance'].forEach(function(id) {
        document.getElementById(id).addEventListener('input', calculateMortgage);
    });
});
</script>

<?php get_footer(); ?>
