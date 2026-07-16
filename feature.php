<?php
require_once __DIR__ . '/includes/page-template.php';

render_page('feature', 'Our Features — Ejense Technology', 'Our features', function ($content) {
?>
<section class="ej-section">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <span class="ej-section__label"><?= e($content['why_choose_us']['subtitle']) ?></span>
            <h2 class="ej-section__title ej-section__title--center"><?= e($content['why_choose_us']['title']) ?></h2>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-4">
                <?php foreach (array_slice($content['why_choose_us']['items'], 0, 2) as $item): ?>
                <div class="ej-feature-item wow fadeInUp">
                    <div class="ej-feature-item__icon"><i class="fa <?= e($item['icon']) ?>"></i></div>
                    <h4><?= e($item['title']) ?></h4><p><?= e($item['text']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4 wow fadeInUp"><div class="ej-about__image"><img src="<?= e($content['why_choose_us']['image']) ?>" alt="Features" loading="lazy"></div></div>
            <div class="col-lg-4">
                <?php foreach (array_slice($content['why_choose_us']['items'], 2, 2) as $item): ?>
                <div class="ej-feature-item wow fadeInUp">
                    <div class="ej-feature-item__icon"><i class="fa <?= e($item['icon']) ?>"></i></div>
                    <h4><?= e($item['title']) ?></h4><p><?= e($item['text']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php });
