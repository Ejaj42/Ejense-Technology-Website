<?php
require_once __DIR__ . '/includes/page-template.php';

render_page('quote', 'Request A Quote — Ejense Technology', 'Request Quote', function ($content) {
?>
<section class="ej-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 wow fadeInUp">
                <span class="ej-section__label"><?= e($content['quote']['subtitle']) ?></span>
                <h2 class="ej-section__title"><?= e($content['quote']['title']) ?></h2>
                <div class="ej-quote-section__info mb-4">
                    <?php foreach ($content['quote']['highlights'] as $hl): ?>
                    <h5><i class="fa fa-check-circle"></i><?= e($hl) ?></h5>
                    <?php endforeach; ?>
                </div>
                <p class="ej-section__desc mb-4"><?= e($content['quote']['text']) ?></p>
                <div class="ej-phone-block">
                    <div class="ej-phone-block__icon"><i class="fa fa-phone-alt"></i></div>
                    <div><h5>Call to ask any question</h5><h4><?= e($GLOBALS['config']['company_phone']) ?></h4></div>
                </div>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                <?php require INCLUDES_PATH . '/components/quote-form.php'; ?>
            </div>
        </div>
    </div>
</section>
<?php });
