<?php declare(strict_types=1); ?>
<!-- Sticky Navbar -->
<header class="ej-header" id="mainHeader">
    <nav class="navbar navbar-expand-lg ej-navbar">
        <div class="container-fluid px-4 px-lg-5">
            <a href="index.html" class="navbar-brand ej-brand">
                <img src="<?= e($config['logo_nav']) ?>" alt="Ejense Technology" class="ej-brand__logo" loading="eager">
            </a>

            <div class="ej-nav-actions d-flex align-items-center gap-2 order-lg-last">
                <button type="button" class="ej-theme-toggle" id="themeToggle" aria-label="Toggle dark mode">
                    <i class="fas fa-moon" id="themeIcon"></i>
                </button>
                <button type="button" class="ej-search-btn" data-bs-toggle="modal" data-bs-target="#searchModal" aria-label="Search">
                    <i class="fas fa-search"></i>
                </button>
                <button class="navbar-toggler ej-navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto py-3 py-lg-0">
                    <li class="nav-item"><a href="index.html" class="nav-link<?= nav_active('index') ?>">Home</a></li>
                    <li class="nav-item"><a href="about.html" class="nav-link<?= nav_active('about') ?>">About</a></li>
                    <li class="nav-item"><a href="service.html" class="nav-link<?= nav_active('service') ?>">Services</a></li>
                    <li class="nav-item"><a href="quote.html" class="nav-link<?= nav_active('quote') ?>">Request Quote</a></li>
                    <li class="nav-item"><a href="feature.html" class="nav-link<?= nav_active('feature') ?>">Our features</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle<?= nav_active('blog') ?>" data-bs-toggle="dropdown">Blog</a>
                        <ul class="dropdown-menu ej-dropdown">
                            <li><a class="dropdown-item" href="blog.html">Blog Grid</a></li>
                            <li><a class="dropdown-item" href="detail.html">Blog Detail</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle<?= nav_active('discover') ?>" data-bs-toggle="dropdown">Discover</a>
                        <ul class="dropdown-menu ej-dropdown">
                            <li><a class="dropdown-item" href="team.html">Team Members</a></li>
                            <li><a class="dropdown-item" href="testimonial.html">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="contact.html" class="nav-link<?= nav_active('contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content ej-search-modal">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="ej-search-input-group">
                    <input type="text" class="form-control" placeholder="Type search keyword" id="searchInput" aria-label="Search">
                    <button class="btn ej-btn-primary" type="button" onclick="performSearch()"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
