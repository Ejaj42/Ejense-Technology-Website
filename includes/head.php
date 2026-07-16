<?php
/** Page head — meta, fonts, CSS, schema */
declare(strict_types=1);

$pageTitle = $pageTitle ?? $config['site_name'];
$pageDescription = $pageDescription ?? $config['site_description'];
$pageKeywords = $pageKeywords ?? $config['site_keywords'];
$pageUrl = ($config['site_url'] ?? '') . '/' . ($currentPage ?? 'index') . '.html';
$pageImage = ($config['site_url'] ?? '') . '/' . ($config['logo_footer'] ?? 'img/Ejense_logo.png');
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="utf-8">
    <title><?= e($pageTitle) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="keywords" content="<?= e($pageKeywords) ?>">
    <meta name="author" content="Ejense Technology">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= e($pageUrl) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e($pageUrl) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:image" content="<?= e($pageImage) ?>">
    <meta property="og:site_name" content="Ejense Technology">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($pageDescription) ?>">
    <meta name="twitter:image" content="<?= e($pageImage) ?>">

    <link rel="icon" href="<?= asset($config['logo_favicon']) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= asset('assets/css/variables.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/main.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/components.css') ?>" rel="stylesheet">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Ejense Technology",
        "url": "https://ejense.in",
        "logo": "https://ejense.in/img/Ejense_logo.png",
        "email": "ejense_technology@ejense.in",
        "telephone": "+415 555 6789",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "271 Front St",
            "addressLocality": "San Francisco",
            "addressRegion": "CA",
            "postalCode": "94111",
            "addressCountry": "US"
        },
        "sameAs": []
    }
    </script>
    <?php if (!empty($extraHead)) echo $extraHead; ?>
</head>
<body>
