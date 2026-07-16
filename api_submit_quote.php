<?php
/**
 * Ejense Technology — Secure API endpoint for form submissions.
 * Maintains backward compatibility with existing database schema and email API.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/init.php';

set_api_headers();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

if (!check_rate_limit('form_submit', 10, 300)) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many requests. Please try again later.']);
    exit;
}

$inputData = get_json_input();
if ($inputData === null) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON data']);
    exit;
}

if (!verify_csrf(isset($inputData['csrf_token']) ? (string) $inputData['csrf_token'] : null)) {
    http_response_code(403);
    echo json_encode(['error' => 'Your session has expired. Please refresh the page and try again.']);
    exit;
}

$name    = sanitize_string($inputData['name'] ?? '', 100);
$company = sanitize_string($inputData['company'] ?? '', 150);
$email   = sanitize_string($inputData['email'] ?? '', 150);
$service = sanitize_string($inputData['service'] ?? '', 200);
$message = sanitize_string($inputData['message'] ?? '', 500);
$type    = validate_form_type($inputData['type'] ?? 1);

if (!validate_email($email)) {
    http_response_code(422);
    echo json_encode(['error' => 'Invalid email address']);
    exit;
}

$conn = db_connect();

$sql = 'INSERT INTO ej_request_quote (name, company_name, email_id, services, message, type) VALUES (?, ?, ?, ?, ?, ?)';
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
    mysqli_close($conn);
    exit;
}

mysqli_stmt_bind_param($stmt, 'sssssi', $name, $company, $email, $service, $message, $type);

if (!mysqli_stmt_execute($stmt)) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save request']);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// Send confirmation email
$emailName = ($name === 'NA') ? $email : $name;
$emailSubject = get_email_subject($type);
$htmlContent = build_email_html($emailName);
send_confirmation_email($email, $emailSubject, $htmlContent);

http_response_code(201);
echo json_encode([
    'success' => true,
    'message' => 'Request for Quote has been submitted successfully. Thank you for choosing Ejense Technology',
]);
