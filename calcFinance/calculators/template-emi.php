<?php
/**
 * Template Name: EMI Calculator
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
                    <?php esc_html_e('EMI Calculator', 'calcfinance'); ?>
                </h1>
                <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto;">
                    <?php esc_html_e('Calculate your Equated Monthly Installment (EMI) for any loan. Plan your budget with accurate monthly payment estimates.', 'calcfinance'); ?>
                </p>
            </div>
            
            <div class="ad-placeholder" style="margin-bottom: 2rem;">
                <span><i class="fas fa-ad"></i> <?php esc_html_e('Ad Space', 'calcfinance'); ?></span>
            </div>
            
            <div class="calculator-box" data-calculator="emi">
                <div class="form-row">
                    <div class="form-group">
                        <label for="emi-principal"><?php esc_html_e('Loan Amount', 'calcfinance'); ?> ($)</label>
                        <input type="number" id="emi-principal" value="25000" min="100" step="100" placeholder="25000">
                    </div>
                    <div class="form-group">
                        <label for="emi-rate"><?php esc_html_e('Annual Interest Rate', 'calcfinance'); ?> (%)</label>
                        <input type="number" id="emi-rate" value="8.5" min="0" max="100" step="0.01" placeholder="8.5">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="emi-tenure"><?php esc_html_e('Loan Tenure', 'calcfinance'); ?> (<?php esc_html_e('Months', 'calcfinance'); ?>)</label>
                        <input type="number" id="emi-tenure" value="36" min="1" max="600" step="1" placeholder="36">
                    </div>
                    <div class="form-group">
                        <label for="emi-tenure-years"><?php esc_html_e('Or in Years', 'calcfinance'); ?></label>
                        <input type="number" id="emi-tenure-years" value="" min="1" max="50" step="0.5" placeholder="3" oninput="document.getElementById('emi-tenure').value=this.value*12">
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 1rem;" onclick="calculateEMI()">
                    <i class="fas fa-calculator"></i> <?php esc_html_e('Calculate EMI', 'calcfinance'); ?>
                </button>
                
                <div id="emi-result" style="display: none;">
                    <div class="result-grid">
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Monthly EMI', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="emi-monthly" style="color: var(--accent); font-size: 1.5rem;">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Payment', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="emi-total">$0</div>
                        </div>
                        <div class="result-item">
                            <div class="result-item-label"><?php esc_html_e('Total Interest', 'calcfinance'); ?></div>
                            <div class="result-item-value" id="emi-interest">$0</div>
                        </div>
                    </div>
                    <div style="margin-top: 1.5rem; padding: 1rem; background: var(--bg-section); border-radius: var(--radius); text-align: center;">
                        <strong><?php esc_html_e('Interest to Principal Ratio:', 'calcfinance'); ?></strong> 
                        <span id="emi-ratio">0%</span>
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 3rem;">
                <h2><?php esc_html_e('What is EMI?', 'calcfinance'); ?></h2>
                <p><?php esc_html_e('EMI (Equated Monthly Installment) is the fixed amount a borrower pays every month towards repaying a loan. It includes both principal and interest components. The EMI formula ensures that over the loan tenure, the entire loan amount plus interest is fully repaid.', 'calcfinance'); ?></p>
                
                <h3><?php esc_html_e('EMI Formula', 'calcfinance'); ?></h3>
                <div class="notice notice-info">
                    <strong>EMI = P x r x (1+r)^n / [(1+r)^n - 1]</strong><br>
                    Where: P = Principal, r = monthly rate, n = tenure in months
                </div>
                
                <h3><?php esc_html_e('Factors Affecting Your EMI', 'calcfinance'); ?></h3>
                <ul>
                    <li><strong><?php esc_html_e('Loan Amount:', 'calcfinance'); ?></strong> <?php esc_html_e('Higher principal leads to higher EMI', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('Interest Rate:', 'calcfinance'); ?></strong> <?php esc_html_e('Even small rate changes significantly impact total cost', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('Loan Tenure:', 'calcfinance'); ?></strong> <?php esc_html_e('Longer tenure reduces EMI but increases total interest', 'calcfinance'); ?></li>
                </ul>
            </div>
            
        </div>
    </div>
</section>

<script>
function calculateEMI() {
    const principal = parseFloat(document.getElementById('emi-principal').value) || 0;
    const rate = parseFloat(document.getElementById('emi-rate').value) || 0;
    const tenure = parseFloat(document.getElementById('emi-tenure').value) || 0;
    
    const monthlyRate = rate / 100 / 12;
    let emi = 0;
    
    if (rate > 0) {
        emi = principal * monthlyRate * Math.pow(1 + monthlyRate, tenure) / (Math.pow(1 + monthlyRate, tenure) - 1);
    } else {
        emi = principal / tenure;
    }
    
    const totalPayment = emi * tenure;
    const totalInterest = totalPayment - principal;
    const ratio = principal > 0 ? ((totalInterest / principal) * 100).toFixed(1) : 0;
    
    document.getElementById('emi-monthly').textContent = '$' + emi.toLocaleString('en-US', {maximumFractionDigits: 2});
    document.getElementById('emi-total').textContent = '$' + totalPayment.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('emi-interest').textContent = '$' + totalInterest.toLocaleString('en-US', {maximumFractionDigits: 0});
    document.getElementById('emi-ratio').textContent = ratio + '%';
    
    document.getElementById('emi-result').style.display = 'block';
    document.getElementById('emi-result').scrollIntoView({behavior: 'smooth', block: 'nearest'});
}

document.addEventListener('DOMContentLoaded', function() {
    calculateEMI();
    ['emi-principal', 'emi-rate', 'emi-tenure'].forEach(function(id) {
        document.getElementById(id).addEventListener('input', function() {
            if (id === 'emi-tenure') document.getElementById('emi-tenure-years').value = '';
            calculateEMI();
        });
    });
});
</script>

<?php get_footer(); ?>
