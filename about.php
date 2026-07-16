<?php
require_once __DIR__ . '/includes/page-template.php';

render_page('about', 'About Us — Ejense Technology', 'About', function ($content) {
?>
<section class="ej-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 wow fadeInUp">
                <span class="ej-section__label"><?= e($content['about']['subtitle']) ?></span>
                <h2 class="ej-section__title"><?= e($content['about']['title']) ?></h2>
                <p class="ej-section__desc mb-4"><?= e($content['about']['text']) ?></p>
                <div class="row mb-4">
                    <?php foreach (array_chunk($content['about']['features'], 2) as $chunk): ?>
                    <div class="col-sm-6"><ul class="ej-check-list"><?php foreach ($chunk as $f): ?><li><i class="fa fa-check"></i><?= e($f) ?></li><?php endforeach; ?></ul></div>
                    <?php endforeach; ?>
                </div>
                <div class="ej-phone-block mb-4">
                    <div class="ej-phone-block__icon"><i class="fa fa-phone-alt"></i></div>
                    <div><h5>Call to ask any question</h5><h4><?= e($GLOBALS['config']['company_phone']) ?></h4></div>
                </div>
                <a href="quote.html" class="btn ej-btn-primary ej-btn-lg">Request A Quote</a>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="ej-about__image"><img src="<?= e($content['about']['image']) ?>" alt="About Ejense Technology" loading="lazy"></div>
            </div>
        </div>
    </div>
</section>
<section class="ej-section ej-section--alt">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <span class="ej-section__label"><?= e($content['team']['subtitle']) ?></span>
            <h2 class="ej-section__title ej-section__title--center"><?= e($content['team']['title']) ?></h2>
        </div>
        <div class="row g-4">
            <?php foreach ($content['team']['items'] as $member): ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp">
                <div class="ej-team-card">
                    <div class="ej-team-card__img"><img src="<?= e($member['image']) ?>" alt="<?= e($member['name']) ?>" loading="lazy"></div>
                    <div class="ej-team-card__info"><h4><?= e($member['name']) ?></h4><p><?= e($member['role']) ?></p></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php });
