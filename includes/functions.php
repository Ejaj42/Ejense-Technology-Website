<?php
/**
 * Helper functions for Ejense Technology website.
 */

declare(strict_types=1);

/**
 * Escape output for HTML context (XSS prevention).
 */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Get asset URL with cache-busting version.
 */
function asset(string $path): string
{
    global $config;
    $version = $config['cache_version'] ?? '1.0.0';
    $separator = str_contains($path, '?') ? '&' : '?';
    return e($path) . $separator . 'v=' . e($version);
}

/**
 * Check if current page matches slug.
 */
function is_active_page(string $slug): bool
{
    global $currentPage;
    return ($currentPage ?? '') === $slug;
}

/**
 * Render active class for navigation.
 */
function nav_active(string $slug): string
{
    return is_active_page($slug) ? ' active' : '';
}

/**
 * Load database connection using mysqli with prepared statements support.
 */
function db_connect(): mysqli
{
    $dbConfig = require CONFIG_PATH . '/database.php';
    $conn = mysqli_connect(
        $dbConfig['servername'],
        $dbConfig['username'],
        $dbConfig['password'],
        $dbConfig['dbname']
    );

    if (!$conn) {
        error_log('Database connection failed: ' . mysqli_connect_error());
        http_response_code(500);
        die(json_encode(['error' => 'Database connection failed']));
    }

    mysqli_set_charset($conn, 'utf8mb4');
    return $conn;
}

/**
 * Get email subject by form type.
 */
function get_email_subject(int $type): string
{
    return match ($type) {
        1       => 'Request a Quote',
        2       => 'Registration Confirmation',
        3       => 'Contact Us Inquiry',
        4       => 'Share your comments',
        default => 'Ejense Technology Inquiry',
    };
}

/**
 * Build confirmation email HTML.
 */
function build_email_html(string $emailName): string
{
    return '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ejense Technology</title>
    <style>
        body { background-color: #437a8f; margin: 0; padding: 0; }
        .email-container { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; }
        .EjenseTechnologyLogo img { max-width: 100%; height: auto; }
    </style>
</head>
<body>
    <div class="email-container">
        <a href="http://ejense.in" class="EjenseTechnologyLogo">
            <img src="http://ejense.in/img/Ejensetext.png" alt="Ejense Logo">
        </a>
        <h2>Hello ' . e($emailName) . ',</h2>
        <p>Thank you for expressing your interest in our company. Our team has received your inquiry, and we will get in touch with you shortly. Alternatively, you can email your queries to <a href="mailto:ejense_technology@ejense.in">ejense_technology@ejense.in</a>.</p>
        <p>We highly appreciate your interest in our services and look forward to the opportunity to connect with you.</p>
        <p>Best regards,<br>Ejense Technology Team</p>
    </div>
</body>
</html>';
}

/**
 * Send confirmation email via external API.
 */
function send_confirmation_email(string $recipientEmail, string $subject, string $htmlContent): bool
{
    global $config;
    $emailConfig = require CONFIG_PATH . '/email.php';

    $data = [
        'SenderEmail'   => $emailConfig['sender_email'],
        'AppPassword'   => $emailConfig['app_password'],
        'RecipientEmail'=> $recipientEmail,
        'Subject'       => $subject,
        'Body'          => $htmlContent,
        'HtmlContent'   => $htmlContent,
        'SmtpConfig'    => [
            'SmtpServer' => $emailConfig['smtp_server'],
            'SmtpPort'   => $emailConfig['smtp_port'],
        ],
    ];

    $ch = curl_init($config['email_api_url']);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($data, JSON_HEX_QUOT),
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_TIMEOUT        => 30,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $response !== false && $httpCode >= 200 && $httpCode < 300;
}

/**
 * Render a PHP include with optional data.
 */
function render(string $file, array $data = []): void
{
    extract($data);
    $path = INCLUDES_PATH . '/' . ltrim($file, '/');
    if (file_exists($path)) {
        require $path;
    }
}
