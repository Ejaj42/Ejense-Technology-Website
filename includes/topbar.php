<?php declare(strict_types=1); ?>
<!-- Page Loader -->
<div id="spinner" class="ej-spinner show">
    <div class="ej-spinner__inner">
        <img src="<?= e($config['logo_spinner']) ?>" alt="Ejense Technology" width="48" height="48" loading="eager">
    </div>
</div>

<!-- Top Bar -->
<div class="ej-topbar d-none d-lg-block">
    <div class="container-fluid px-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="ej-topbar__info">
                    <span><i class="fas fa-map-marker-alt"></i><?= e($config['company_address']) ?></span>
                    <span><i class="fas fa-phone-alt"></i><?= e($config['company_phone']) ?></span>
                    <span><i class="fas fa-envelope-open"></i><?= e($config['company_email']) ?></span>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="ej-topbar__social">
                    <a href="<?= e($config['social']['twitter']) ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="<?= e($config['social']['facebook']) ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?= e($config['social']['linkedin']) ?>" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="<?= e($config['social']['instagram']) ?>" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="<?= e($config['social']['youtube']) ?>" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
