<?php
/**
 * Quote request form component.
 * @var string $formId Form element ID (default: quoteForm)
 * @var int $formType API type: 1=quote, 2=signup, 3=contact
 * @var string $submitHandler JS submit function name
 */
declare(strict_types=1);
$content = require INCLUDES_PATH . '/data/site-content.php';
$formId = $formId ?? 'quoteForm';
$formType = $formType ?? 1;
$submitHandler = $submitHandler ?? 'validateForm';
$showCompany = $showCompany ?? true;
?>
<div class="ej-quote-form glass-card">
    <form id="<?= e($formId) ?>" novalidate>
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <input type="hidden" name="form_type" value="<?= (int) $formType ?>">
        <div class="row g-3">
            <div class="col-12">
                <input type="text" class="form-control ej-input" id="name" placeholder="Your Name" maxlength="100" required autocomplete="name">
            </div>
            <?php if ($showCompany): ?>
            <div class="col-12">
                <input type="text" class="form-control ej-input" id="company" placeholder="Company Name" maxlength="150" required autocomplete="organization">
            </div>
            <?php endif; ?>
            <div class="col-12">
                <input type="email" class="form-control ej-input" id="email" placeholder="Your Email" maxlength="150" required autocomplete="email">
            </div>
            <div class="col-12">
                <select class="form-select ej-input" id="service" required>
                    <option value="">Select Service</option>
                    <?php foreach ($content['service_options'] as $option): ?>
                    <option value="<?= e($option) ?>"><?= e($option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-12">
                <textarea class="form-control ej-input" id="message" rows="3" placeholder="Type your message (maximum 500 characters)" maxlength="500" required></textarea>
            </div>
            <div class="col-12">
                <button type="button" class="btn ej-btn-dark w-100 py-3" onclick="<?= e($submitHandler) ?>()">Request A Quote</button>
            </div>
        </div>
    </form>
</div>
