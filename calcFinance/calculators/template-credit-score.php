<?php
/**
 * Template Name: Credit Score Estimator
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
                    <i class="fas fa-calculator"></i> <?php esc_html_e('Estimator', 'calcfinance'); ?>
                </div>
                <h1 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; margin-bottom: 0.5rem;">
                    <?php esc_html_e('Credit Score Estimator', 'calcfinance'); ?>
                </h1>
                <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto;">
                    <?php esc_html_e('Answer a few questions about your credit habits to get an estimated range of your credit score. No personal information required.', 'calcfinance'); ?>
                </p>
            </div>
            
            <div class="ad-placeholder" style="margin-bottom: 2rem;">
                <span><i class="fas fa-ad"></i> <?php esc_html_e('Ad Space', 'calcfinance'); ?></span>
            </div>
            
            <!-- Questionnaire -->
            <div class="calculator-box" id="score-questionnaire">
                
                <!-- Question 1: Payment History -->
                <div class="score-question" data-weight="35">
                    <div class="score-question-text">
                        <span class="badge badge-accent" style="margin-right: 0.5rem;">1/5</span>
                        <?php esc_html_e('How often have you missed or been late on payments in the past 2 years?', 'calcfinance'); ?>
                    </div>
                    <div class="score-options">
                        <label class="score-option">
                            <input type="radio" name="q1" value="300" checked>
                            <span><?php esc_html_e('Never - All payments on time', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q1" value="250">
                            <span><?php esc_html_e('1-2 times (30 days late)', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q1" value="180">
                            <span><?php esc_html_e('3-5 times or 60+ days late', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q1" value="100">
                            <span><?php esc_html_e('More than 5 times or defaults/collections', 'calcfinance'); ?></span>
                        </label>
                    </div>
                </div>
                
                <!-- Question 2: Credit Utilization -->
                <div class="score-question" data-weight="30">
                    <div class="score-question-text">
                        <span class="badge badge-accent" style="margin-right: 0.5rem;">2/5</span>
                        <?php esc_html_e('What is your credit card utilization ratio? (Balance / Credit Limit)', 'calcfinance'); ?>
                    </div>
                    <div class="score-options">
                        <label class="score-option">
                            <input type="radio" name="q2" value="300" checked>
                            <span><?php esc_html_e('Less than 10%', 'calcfinance'); ?> <?php esc_html_e('(Excellent)', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q2" value="250">
                            <span><?php esc_html_e('10% - 30%', 'calcfinance'); ?> <?php esc_html_e('(Good)', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q2" value="180">
                            <span><?php esc_html_e('30% - 50%', 'calcfinance'); ?> <?php esc_html_e('(Fair)', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q2" value="100">
                            <span><?php esc_html_e('More than 50%', 'calcfinance'); ?> <?php esc_html_e('(Poor)', 'calcfinance'); ?></span>
                        </label>
                    </div>
                </div>
                
                <!-- Question 3: Credit History Length -->
                <div class="score-question" data-weight="15">
                    <div class="score-question-text">
                        <span class="badge badge-accent" style="margin-right: 0.5rem;">3/5</span>
                        <?php esc_html_e('How long is your credit history?', 'calcfinance'); ?>
                    </div>
                    <div class="score-options">
                        <label class="score-option">
                            <input type="radio" name="q3" value="300" checked>
                            <span><?php esc_html_e('More than 10 years', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q3" value="250">
                            <span><?php esc_html_e('5-10 years', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q3" value="200">
                            <span><?php esc_html_e('2-5 years', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q3" value="120">
                            <span><?php esc_html_e('Less than 2 years', 'calcfinance'); ?></span>
                        </label>
                    </div>
                </div>
                
                <!-- Question 4: Credit Mix -->
                <div class="score-question" data-weight="10">
                    <div class="score-question-text">
                        <span class="badge badge-accent" style="margin-right: 0.5rem;">4/5</span>
                        <?php esc_html_e('What types of credit accounts do you have?', 'calcfinance'); ?>
                    </div>
                    <div class="score-options">
                        <label class="score-option">
                            <input type="radio" name="q4" value="300" checked>
                            <span><?php esc_html_e('Multiple types (credit cards, loan, mortgage)', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q4" value="240">
                            <span><?php esc_html_e('Two types (e.g., credit card + loan)', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q4" value="180">
                            <span><?php esc_html_e('One type only (credit cards only or loans only)', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q4" value="100">
                            <span><?php esc_html_e('No credit accounts yet', 'calcfinance'); ?></span>
                        </label>
                    </div>
                </div>
                
                <!-- Question 5: New Credit -->
                <div class="score-question" data-weight="10">
                    <div class="score-question-text">
                        <span class="badge badge-accent" style="margin-right: 0.5rem;">5/5</span>
                        <?php esc_html_e('How many new credit accounts or hard inquiries in the past 12 months?', 'calcfinance'); ?>
                    </div>
                    <div class="score-options">
                        <label class="score-option">
                            <input type="radio" name="q5" value="300" checked>
                            <span><?php esc_html_e('None', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q5" value="250">
                            <span><?php esc_html_e('1-2', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q5" value="180">
                            <span><?php esc_html_e('3-4', 'calcfinance'); ?></span>
                        </label>
                        <label class="score-option">
                            <input type="radio" name="q5" value="100">
                            <span><?php esc_html_e('5 or more', 'calcfinance'); ?></span>
                        </label>
                    </div>
                </div>
                
                <button type="button" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 1rem;" onclick="calculateCreditScore()">
                    <i class="fas fa-chart-line"></i> <?php esc_html_e('Estimate My Credit Score', 'calcfinance'); ?>
                </button>
            </div>
            
            <!-- Result -->
            <div class="calculator-box score-result-box" id="score-result" style="display: none;">
                <h3 style="margin-bottom: 1.5rem;"><?php esc_html_e('Your Estimated Credit Score', 'calcfinance'); ?></h3>
                
                <div class="score-display" id="score-circle">
                    <div class="score-number" id="score-value">0</div>
                    <div class="score-label"><?php esc_html_e('Estimated Score', 'calcfinance'); ?></div>
                </div>
                
                <div class="score-range-text" id="score-range">-</div>
                <p class="score-advice" id="score-advice">-</p>
                
                <div class="result-grid" style="margin-top: 2rem;">
                    <div class="result-item">
                        <div class="result-item-label"><?php esc_html_e('Score Range', 'calcfinance'); ?></div>
                        <div class="result-item-value" id="score-range-value">-</div>
                    </div>
                    <div class="result-item">
                        <div class="result-item-label"><?php esc_html_e('Approval Odds', 'calcfinance'); ?></div>
                        <div class="result-item-value" id="score-approval">-</div>
                    </div>
                    <div class="result-item">
                        <div class="result-item-label"><?php esc_html_e('Est. APR Range', 'calcfinance'); ?></div>
                        <div class="result-item-value" id="score-apr">-</div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-outline" style="margin-top: 2rem;" onclick="resetScoreCalculator()">
                    <i class="fas fa-redo"></i> <?php esc_html_e('Recalculate', 'calcfinance'); ?>
                </button>
            </div>
            
            <div style="margin-top: 3rem;">
                <h2><?php esc_html_e('Understanding Credit Scores', 'calcfinance'); ?></h2>
                <p><?php esc_html_e('Credit scores range from 300 to 850 and are calculated based on five main factors. This estimator provides a rough range based on your answers. For your actual score, check with credit bureaus or use a free credit monitoring service.', 'calcfinance'); ?></p>
                
                <h3><?php esc_html_e('Credit Score Ranges', 'calcfinance'); ?></h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin: 1.5rem 0;">
                    <div style="padding: 1rem; background: #fee2e2; border-radius: var(--radius); border-left: 4px solid #ef4444;">
                        <strong style="color: #991b1b;">300 - 579</strong><br>
                        <span style="font-size: 0.875rem;">Poor</span>
                    </div>
                    <div style="padding: 1rem; background: #fef3c7; border-radius: var(--radius); border-left: 4px solid #f59e0b;">
                        <strong style="color: #92400e;">580 - 669</strong><br>
                        <span style="font-size: 0.875rem;">Fair</span>
                    </div>
                    <div style="padding: 1rem; background: #dbeafe; border-radius: var(--radius); border-left: 4px solid #3b82f6;">
                        <strong style="color: #1e40af;">670 - 739</strong><br>
                        <span style="font-size: 0.875rem;">Good</span>
                    </div>
                    <div style="padding: 1rem; background: #d1fae5; border-radius: var(--radius); border-left: 4px solid #10b981;">
                        <strong style="color: #065f46;">740 - 799</strong><br>
                        <span style="font-size: 0.875rem;">Very Good</span>
                    </div>
                    <div style="padding: 1rem; background: #ecfdf5; border-radius: var(--radius); border-left: 4px solid #059669;">
                        <strong style="color: #064e3b;">800 - 850</strong><br>
                        <span style="font-size: 0.875rem;">Excellent</span>
                    </div>
                </div>
                
                <h3><?php esc_html_e('Factors That Affect Your Score', 'calcfinance'); ?></h3>
                <ul>
                    <li><strong><?php esc_html_e('Payment History (35%):', 'calcfinance'); ?></strong> <?php esc_html_e('On-time payments are the most important factor', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('Credit Utilization (30%):', 'calcfinance'); ?></strong> <?php esc_html_e('Keep credit card balances below 30% of limits', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('Length of History (15%):', 'calcfinance'); ?></strong> <?php esc_html_e('Older accounts improve your score', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('Credit Mix (10%):', 'calcfinance'); ?></strong> <?php esc_html_e('Having different types of credit helps', 'calcfinance'); ?></li>
                    <li><strong><?php esc_html_e('New Credit (10%):', 'calcfinance'); ?></strong> <?php esc_html_e('Too many new applications can hurt', 'calcfinance'); ?></li>
                </ul>
            </div>
            
        </div>
    </div>
</section>

<script>
function calculateCreditScore() {
    const weights = [0.35, 0.30, 0.15, 0.10, 0.10];
    const maxPerQuestion = 300;
    let weightedSum = 0;
    
    for (let i = 1; i <= 5; i++) {
        const selected = document.querySelector('input[name="q' + i + '"]:checked');
        if (selected) {
            weightedSum += (parseInt(selected.value) / maxPerQuestion) * weights[i-1];
        }
    }
    
    // Map 0-1 range to 300-850
    const minScore = 300;
    const maxScore = 850;
    const estimatedScore = Math.round(minScore + (weightedSum * (maxScore - minScore)));
    
    // Determine range and advice
    let range, advice, color, approval, apr;
    
    if (estimatedScore >= 800) {
        range = '<?php esc_html_e('Excellent', 'calcfinance'); ?>';
        advice = '<?php esc_html_e('Exceptional credit! You qualify for the best rates and highest credit limits. Lenders see you as very low risk.', 'calcfinance'); ?>';
        color = '#059669';
        approval = '<?php esc_html_e('99%+', 'calcfinance'); ?>';
        apr = '<?php esc_html_e('6-10%', 'calcfinance'); ?>';
    } else if (estimatedScore >= 740) {
        range = '<?php esc_html_e('Very Good', 'calcfinance'); ?>';
        advice = '<?php esc_html_e('Great job! You qualify for competitive rates and most credit products. Keep maintaining good habits.', 'calcfinance'); ?>';
        color = '#10b981';
        approval = '<?php esc_html_e('95%+', 'calcfinance'); ?>';
        apr = '<?php esc_html_e('7-12%', 'calcfinance'); ?>';
    } else if (estimatedScore >= 670) {
        range = '<?php esc_html_e('Good', 'calcfinance'); ?>';
        advice = '<?php esc_html_e('Solid credit profile. You qualify for most loans at reasonable rates. Consider improving utilization for even better terms.', 'calcfinance'); ?>';
        color = '#3b82f6';
        approval = '<?php esc_html_e('85%+', 'calcfinance'); ?>';
        apr = '<?php esc_html_e('10-18%', 'calcfinance'); ?>';
    } else if (estimatedScore >= 580) {
        range = '<?php esc_html_e('Fair', 'calcfinance'); ?>';
        advice = '<?php esc_html_e('Room for improvement. Focus on on-time payments and reducing credit card balances. Consider a secured credit card to build history.', 'calcfinance'); ?>';
        color = '#f59e0b';
        approval = '<?php esc_html_e('60-80%', 'calcfinance'); ?>';
        apr = '<?php esc_html_e('15-28%', 'calcfinance'); ?>';
    } else {
        range = '<?php esc_html_e('Poor', 'calcfinance'); ?>';
        advice = '<?php esc_html_e('Work on building credit: pay all bills on time, reduce debt, dispute errors on your report, and consider becoming an authorized user.', 'calcfinance'); ?>';
        color = '#ef4444';
        approval = '<?php esc_html_e('20-50%', 'calcfinance'); ?>';
        apr = '<?php esc_html_e('20-36%', 'calcfinance'); ?>';
    }
    
    // Update UI
    document.getElementById('score-value').textContent = estimatedScore;
    document.getElementById('score-range').textContent = range;
    document.getElementById('score-advice').textContent = advice;
    document.getElementById('score-circle').style.borderColor = color;
    document.getElementById('score-value').style.color = color;
    document.getElementById('score-range-value').textContent = estimatedScore + ' (' + range + ')';
    document.getElementById('score-approval').textContent = approval;
    document.getElementById('score-apr').textContent = apr;
    
    // Show result, hide questionnaire
    document.getElementById('score-questionnaire').style.display = 'none';
    document.getElementById('score-result').style.display = 'block';
    document.getElementById('score-result').scrollIntoView({behavior: 'smooth', block: 'start'});
}

function resetScoreCalculator() {
    document.getElementById('score-result').style.display = 'none';
    document.getElementById('score-questionnaire').style.display = 'block';
    document.getElementById('score-questionnaire').scrollIntoView({behavior: 'smooth', block: 'start'});
    
    // Reset all to first option
    for (let i = 1; i <= 5; i++) {
        const firstOption = document.querySelector('input[name="q' + i + '"]');
        if (firstOption) firstOption.checked = true;
    }
}
</script>

<?php get_footer(); ?>
