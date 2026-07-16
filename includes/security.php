<?php
/**
 * Security helpers — input sanitization and validation.
 */

declare(strict_types=1);

/**
 * Sanitize string input.
 */
function sanitize_string(?string $input, int $maxLength = 500): string
{
    $value = trim($input ?? '');
    $value = strip_tags($value);
    return mb_substr($value, 0, $maxLength);
}

/**
 * Validate email address.
 */
function validate_email(string $email): bool
{
    return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Validate form type (1-4).
 */
function validate_form_type($type): int
{
    $type = (int) $type;
    return in_array($type, [1, 2, 3, 4], true) ? $type : 1;
}

/**
 * Set security headers for API responses.
 */
function set_api_headers(): void
{
    header('Content-Type: application/json; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: DENY');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}

/**
 * Validate JSON request body and return decoded array.
 */
function get_json_input(): ?array
{
    $raw = file_get_contents('php://input');
    if ($raw === false || $raw === '') {
        return null;
    }
    $data = json_decode($raw, true);
    return is_array($data) ? $data : null;
}

/**
 * Rate limit check using session (basic protection).
 */
function check_rate_limit(string $key, int $maxAttempts = 5, int $windowSeconds = 300): bool
{
    $now = time();
    $sessionKey = 'rate_limit_' . $key;

    if (!isset($_SESSION[$sessionKey])) {
        $_SESSION[$sessionKey] = ['count' => 0, 'start' => $now];
    }

    if ($now - $_SESSION[$sessionKey]['start'] > $windowSeconds) {
        $_SESSION[$sessionKey] = ['count' => 0, 'start' => $now];
    }

    $_SESSION[$sessionKey]['count']++;

    return $_SESSION[$sessionKey]['count'] <= $maxAttempts;
}
