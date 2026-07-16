<?php
require_once __DIR__ . '/includes/page-template.php';

render_page('service', 'Our Services — Ejense Technology', 'Services', function ($content) {
?>
<section class="ej-section">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <span class="ej-section__label"><?= e($content['services']['subtitle']) ?></span>
            <h2 class="ej-section__title ej-section__title--center"><?= e($content['services']['title']) ?></h2>
        </div>
        <div class="row g-4">
            <?php foreach ($content['services']['items'] as $i => $service): ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?= ($i % 3) * 0.1 ?>s">
                <div class="ej-service-card">
                    <div class="ej-service-card__icon"><i class="<?= e($service['icon']) ?>"></i></div>
                    <h4><?= e($service['title']) ?></h4>
                    <p><?= e($service['text']) ?></p>
                    <a href="quote.html" class="ej-service-card__link"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="ej-section ej-section--alt">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <span class="ej-section__label"><?= e($content['testimonials']['subtitle']) ?></span>
            <h2 class="ej-section__title ej-section__title--center"><?= e($content['testimonials']['title']) ?></h2>
        </div>
        <div class="owl-carousel ej-testimonial-carousel wow fadeInUp">
            <?php foreach ($content['testimonials']['items'] as $t): ?>
            <div class="ej-testimonial-card">
                <div class="ej-testimonial-card__header">
                    <img src="<?= e($t['image']) ?>" alt="<?= e($t['name']) ?>" loading="lazy" width="60" height="60">
                    <div><h4><?= e($t['name']) ?></h4><small><?= e($t['role']) ?></small></div>
                </div>
                <div class="ej-testimonial-card__body"><?= e($t['text']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="ej-section">
    <div class="container ej-vendor-strip">
        <div class="owl-carousel ej-vendor-carousel">
            <?php foreach ($content['vendors'] as $v): ?><img src="<?= e($v) ?>" alt="Partner" loading="lazy"><?php endforeach; ?>
        </div>
    </div>
</section>
<?php });
