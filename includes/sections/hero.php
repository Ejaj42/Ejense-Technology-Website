<?php
/**
 * Hero carousel section — reusable across pages.
 * @var array $heroSlides Override slides; defaults to all slides from site content.
 * @var string|null $breadcrumb Optional breadcrumb label for inner pages.
 */
declare(strict_types=1);
$content = require INCLUDES_PATH . '/data/site-content.php';
$slides = $heroSlides ?? $content['hero_slides'];
$activeIndex = $heroActiveIndex ?? 0;
?>
<section class="ej-hero">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
            <?php foreach ($slides as $i => $slide): ?>
            <div class="carousel-item<?= $i === $activeIndex ? ' active' : '' ?>">
                <div class="ej-hero__slide">
                    <img src="<?= e($slide['image']) ?>" alt="<?= e($slide['title']) ?>" class="ej-hero__bg" loading="<?= $i === 0 ? 'eager' : 'lazy' ?>">
                    <div class="ej-hero__overlay"></div>
                    <div class="ej-hero__particles" aria-hidden="true"></div>
                    <div class="carousel-caption ej-hero__content">
                        <span class="ej-hero__badge wow fadeInDown" data-wow-delay="0.1s"><?= e($slide['subtitle']) ?></span>
                        <h1 class="ej-hero__title wow zoomIn" data-wow-delay="0.2s"><?= e($slide['title']) ?></h1>
                        <div class="ej-hero__actions wow fadeInUp" data-wow-delay="0.4s">
                            <a href="quote.html" class="btn ej-btn-primary ej-btn-lg">Free Quote</a>
                            <a href="contact.html" class="btn ej-btn-outline ej-btn-lg">Contact Us</a>
                        </div>
                        <?php if (!empty($breadcrumb)): ?>
                        <nav class="ej-hero__breadcrumb wow fadeInUp" data-wow-delay="0.5s" aria-label="Breadcrumb">
                            <a href="index.html">Home</a>
                            <i class="far fa-circle"></i>
                            <span><?= e($breadcrumb) ?></span>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if (count($slides) > 1): ?>
        <button class="carousel-control-prev ej-hero__control" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next ej-hero__control" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <?php endif; ?>
    </div>
</section>
