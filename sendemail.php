<?php

// Extract data from the JSON
$name = "Mohammad Ejaj";
$company = "Ejense Technology";
$email = "mohammad.ejaj@exioms.com";
$service = "Searching for Job";
$message = "NA";
$type = "4";

// Create the equivalent PHP array
// Subject mapping
switch ($type) {
    case "1":
        $emailSubject = "Request a Quote";
        break;
    case "2":
        $emailSubject = "Registration Confirmation";
        break;
    case "3":
        $emailSubject = "Contact Us Inquiry";
        break;
    case "4":
        $emailSubject = "Share your comments";
        break;
    default:
        $emailSubject = "Test Email";
        break;
}

// Replace the placeholder with the actual email name
if ($name == "NA") {
    $emailname = $email;
} else {
    $emailname = $name;
}

// HTML Content
$htmlContent = '
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head content -->
</head>

<body>

    <!-- Email Content Start -->
    <div class="email-container">
        <!-- Header -->
        <a href="http://ejense.in" class="navbar-brand p-0 EjenseTechnologyLogo">
            <!-- Logo -->
        </a>

        <h2>Hello ' . $emailname . ',</h2>
        <p>Thank you for expressing your interest in our company. Our team has received your inquiry, and we will get in touch with you shortly. Alternatively, you can email your queries to <a href="mailto:ejense_technology@ejense.in">ejense_technology@ejense.in</a>.</p>

        <p>We highly appreciate your interest in our services and look forward to the opportunity to connect with you.</p>

        <p>Best regards,<br> Ejense Technology Team</p>

        <!-- Email Footer -->
        <div class="container-fluid text-white">
            <!-- Footer content -->
        </div>

    </div>
    <!-- Email Content End -->

</body>

</html>
';

// API Data
$data = array(
    "SenderEmail" => "ejense_technology@ejense.in",
    "AppPassword" => "ohxh miba nuqe ewdj",
    "RecipientEmail" => $email,
    "Subject" => $emailSubject,
    "Body" => "Hello, Your registered with message: " . $message,
    "HtmlContent" => $htmlContent,
    "SmtpConfig" => array(
        "SmtpServer" => "smtp.gmail.com",
        "SmtpPort" => 587
    )
);

// Convert the PHP array to a JSON string
$jsonBody = json_encode($data, JSON_PRETTY_PRINT);


// Function to call API with JSON body using cURL
function callCSharpApi($jsonBody) {
    $apiUrl = 'https://topuptestingwebservices.setaraganmutahed.com/api/SendEEmail';

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $apiUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $jsonBody,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    if ($response === false) {
        echo 'cURL error: ' . curl_error($curl);
    } else {
        echo $response;
    }

    curl_close($curl);
}

// Call the API function with the JSON body


// Print the API response
// echo $response;

?>
