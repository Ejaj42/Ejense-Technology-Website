<?php
/**
 * Page template helper — reduces duplication across inner pages.
 */
declare(strict_types=1);

function render_page(string $slug, string $title, string $breadcrumb, callable $contentFn, ?string $description = null): void
{
    require_once dirname(__DIR__) . '/includes/init.php';
    global $config, $currentPage, $pageTitle, $pageDescription;

    $currentPage = $slug;
    $pageTitle = $title;
    $pageDescription = $description ?? $config['site_description'];

    $content = require INCLUDES_PATH . '/data/site-content.php';
    $heroSlides = [$content['hero_slides'][0]];
    $heroActiveIndex = 0;

    require INCLUDES_PATH . '/head.php';
    require INCLUDES_PATH . '/topbar.php';
    require INCLUDES_PATH . '/navbar.php';

    $breadcrumbLabel = $breadcrumb;
    require INCLUDES_PATH . '/sections/hero.php';

    $contentFn($content, $config);

    require INCLUDES_PATH . '/footer.php';
    require INCLUDES_PATH . '/scripts.php';
}
