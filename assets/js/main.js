/**
 * Ejense Technology — Main JavaScript
 */
(function ($) {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        // Remove .html from URL for clean URLs
        if (window.location.href.endsWith('.html')) {
            history.replaceState(null, null, window.location.href.replace(/\.html$/, ''));
        }

        // Hide spinner
        setTimeout(function () {
            var spinner = document.getElementById('spinner');
            if (spinner) spinner.classList.remove('show');
        }, 400);

        // Sticky header scroll effect
        var header = document.getElementById('mainHeader');
        window.addEventListener('scroll', function () {
            if (header) {
                header.classList.toggle('scrolled', window.scrollY > 50);
            }
            // Back to top
            var backToTop = document.getElementById('backToTop');
            if (backToTop) {
                backToTop.classList.toggle('show', window.scrollY > 300);
            }
        });

        // Back to top click
        var backBtn = document.getElementById('backToTop');
        if (backBtn) {
            backBtn.addEventListener('click', function (e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // WOW.js animations
        if (typeof WOW !== 'undefined') {
            new WOW({ mobile: false, live: false }).init();
        }

        // Counter animation
        if ($.fn.counterUp) {
            $('[data-toggle="counter-up"]').counterUp({ delay: 10, time: 2000 });
        }

        // Testimonial carousel
        if ($.fn.owlCarousel) {
            $('.ej-testimonial-carousel').owlCarousel({
                autoplay: true,
                smartSpeed: 1000,
                margin: 24,
                dots: true,
                loop: true,
                nav: true,
                responsive: { 0: { items: 1 }, 768: { items: 2 }, 992: { items: 2 } }
            });

            $('.ej-vendor-carousel').owlCarousel({
                autoplay: true,
                smartSpeed: 1000,
                margin: 45,
                dots: false,
                loop: true,
                nav: false,
                responsive: { 0: { items: 2 }, 576: { items: 3 }, 768: { items: 4 }, 992: { items: 5 } }
            });
        }

        // Intersection Observer for fade-in
        var fadeEls = document.querySelectorAll('.fade-in-up');
        if (fadeEls.length && 'IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            fadeEls.forEach(function (el) { observer.observe(el); });
        }

        // Lazy load images
        document.querySelectorAll('img[loading="lazy"]').forEach(function (img) {
            img.addEventListener('error', function () {
                this.style.opacity = '0.5';
            });
        });
    });
})(jQuery);

/**
 * Search functionality
 */
function performSearch() {
    var input = document.getElementById('searchInput') || document.querySelector('#searchModal input');
    var keyword = input ? input.value.trim().toLowerCase() : '';
    if (keyword === 'contact') {
        window.location.href = 'contact.html';
    } else if (keyword) {
        alert('Performing search for: ' + keyword);
    }
    var modal = bootstrap.Modal.getInstance(document.getElementById('searchModal'));
    if (modal) modal.hide();
}

/**
 * Loading overlay helpers
 */
function startLoading() {
    var overlay = document.getElementById('overlay');
    var loader = document.getElementById('loader');
    if (overlay) overlay.style.display = 'block';
    if (loader) loader.style.display = 'block';
}

function stopLoading() {
    var overlay = document.getElementById('overlay');
    var loader = document.getElementById('loader');
    if (overlay) overlay.style.display = 'none';
    if (loader) loader.style.display = 'none';
}
