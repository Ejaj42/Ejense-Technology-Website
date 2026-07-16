<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/init.php';

$currentPage = 'index';
$pageTitle = 'Ejense Technology — Transforming Tech, Empowering Tomorrow';
$content = require INCLUDES_PATH . '/data/site-content.php';

require INCLUDES_PATH . '/head.php';
require INCLUDES_PATH . '/topbar.php';
require INCLUDES_PATH . '/navbar.php';
require INCLUDES_PATH . '/sections/hero.php';
?>

<!-- Stats -->
<section class="ej-stats">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($content['stats'] as $i => $stat): ?>
            <div class="col-lg-4 col-md-6 fade-in-up">
                <div class="ej-stat-card<?= $i % 2 === 0 ? ' ej-stat-card--primary' : '' ?>">
                    <div class="ej-stat-card__icon"><i class="fa <?= e($stat['icon']) ?>"></i></div>
                    <div>
                        <div class="ej-stat-card__label"><?= e($stat['label']) ?></div>
                        <div class="ej-stat-card__value" data-toggle="counter-up"><?= (int) $stat['value'] ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- About -->
<section class="ej-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 wow fadeInUp">
                <span class="ej-section__label"><?= e($content['about']['subtitle']) ?></span>
                <h2 class="ej-section__title"><?= e($content['about']['title']) ?></h2>
                <p class="ej-section__desc mb-4"><?= e($content['about']['text']) ?></p>
                <div class="row mb-4">
                    <?php foreach (array_chunk($content['about']['features'], 2) as $chunk): ?>
                    <div class="col-sm-6">
                        <ul class="ej-check-list">
                            <?php foreach ($chunk as $feature): ?>
                            <li><i class="fa fa-check"></i><?= e($feature) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="ej-phone-block mb-4">
                    <div class="ej-phone-block__icon"><i class="fa fa-phone-alt"></i></div>
                    <div>
                        <h5>Call to ask any question</h5>
                        <h4><?= e($config['company_phone']) ?></h4>
                    </div>
                </div>
                <a href="quote.html" class="btn ej-btn-primary ej-btn-lg">Request A Quote</a>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="ej-about__image">
                    <img src="<?= e($content['about']['image']) ?>" alt="About Ejense Technology" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="ej-section ej-section--alt">
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
                    <h4><?= e($item['title']) ?></h4>
                    <p><?= e($item['text']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="ej-about__image">
                    <img src="<?= e($content['why_choose_us']['image']) ?>" alt="Why Choose Ejense Technology" loading="lazy">
                </div>
            </div>
            <div class="col-lg-4">
                <?php foreach (array_slice($content['why_choose_us']['items'], 2, 2) as $item): ?>
                <div class="ej-feature-item wow fadeInUp">
                    <div class="ej-feature-item__icon"><i class="fa <?= e($item['icon']) ?>"></i></div>
                    <h4><?= e($item['title']) ?></h4>
                    <p><?= e($item['text']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
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
                    <a href="service.html" class="ej-service-card__link" aria-label="Learn more about <?= e($service['title']) ?>"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Technology Stack -->
<section class="ej-section ej-section--alt">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <span class="ej-section__label">Technology Stack</span>
            <h2 class="ej-section__title ej-section__title--center">Technologies We Master</h2>
        </div>
        <div class="ej-tech-grid wow fadeInUp">
            <?php foreach ($content['tech_stack'] as $tech): ?>
            <div class="ej-tech-item">
                <i class="<?= e($tech['icon']) ?>"></i>
                <span><?= e($tech['name']) ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Quote -->
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
                    <div>
                        <h5>Call to ask any question</h5>
                        <h4><?= e($config['company_phone']) ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                <?php require INCLUDES_PATH . '/components/quote-form.php'; ?>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
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
                    <div>
                        <h4><?= e($t['name']) ?></h4>
                        <small><?= e($t['role']) ?></small>
                    </div>
                </div>
                <div class="ej-testimonial-card__body"><?= e($t['text']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Team -->
<section class="ej-section">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <span class="ej-section__label"><?= e($content['team']['subtitle']) ?></span>
            <h2 class="ej-section__title ej-section__title--center"><?= e($content['team']['title']) ?></h2>
        </div>
        <div class="row g-4">
            <?php foreach ($content['team']['items'] as $member): ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp">
                <div class="ej-team-card">
                    <div class="ej-team-card__img">
                        <img src="<?= e($member['image']) ?>" alt="<?= e($member['name']) ?>" loading="lazy">
                        <div class="ej-team-card__social">
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="ej-team-card__info">
                        <h4><?= e($member['name']) ?></h4>
                        <p><?= e($member['role']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="ej-section ej-section--alt">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <span class="ej-section__label"><?= e($content['blog']['subtitle']) ?></span>
            <h2 class="ej-section__title ej-section__title--center"><?= e($content['blog']['title']) ?></h2>
        </div>
        <div class="row g-4">
            <?php foreach ($content['blog']['items'] as $post): ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp">
                <article class="ej-blog-card">
                    <div class="ej-blog-card__img">
                        <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy">
                        <span class="ej-blog-card__tag"><?= e($post['category']) ?></span>
                    </div>
                    <div class="ej-blog-card__body">
                        <div class="ej-blog-card__meta">
                            <span><i class="far fa-user"></i><?= e($post['author']) ?></span>
                            <span><i class="far fa-calendar-alt"></i><?= e($post['date']) ?></span>
                        </div>
                        <h4><?= e($post['title']) ?></h4>
                        <p><?= e($post['text']) ?></p>
                        <a href="detail.html" class="ej-blog-card__link">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Client Logos -->
<section class="ej-section">
    <div class="container ej-vendor-strip">
        <div class="owl-carousel ej-vendor-carousel">
            <?php foreach ($content['vendors'] as $vendor): ?>
            <img src="<?= e($vendor) ?>" alt="Partner logo" loading="lazy">
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="ej-section ej-section--alt">
    <div class="container">
        <div class="text-center mb-5 wow fadeInUp">
            <span class="ej-section__label">FAQ</span>
            <h2 class="ej-section__title ej-section__title--center">Frequently Asked Questions</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion ej-faq wow fadeInUp" id="faqAccordion">
                    <?php foreach ($content['faq'] as $i => $faq): ?>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button<?= $i > 0 ? ' collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $i ?>">
                                <?= e($faq['q']) ?>
                            </button>
                        </h3>
                        <div id="faq<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body"><?= e($faq['a']) ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require INCLUDES_PATH . '/footer.php';
require INCLUDES_PATH . '/scripts.php';
