<?php
// Include the database connection file
include 'db_connection.php';

// Set the content type to JSON
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $data = file_get_contents("php://input");

    // Decode the JSON data
    $formData = json_decode($data);

    // You can access the values from formData using $formData->propertyName
    // For example, if your JSON data looks like {"name": "John", "age": 25}, you can access them like $formData->name and $formData->age

    // Perform your processing here, e.g., save to a database, perform calculations, etc.

    // Check if the connection was successful
    if ($conn->connect_error) {
        $response = array(
            "status" => "error",
            "message" => "Database connection failed: " . $conn->connect_error
        );
        echo json_encode($response);
        exit();
    } else {
        // Continue with your data processing or any other logic

        // For example, let's assume you have some form data
       // TODO: Insert data into your MySQL database
       $name = $form_data->name;
       $company = $form_data->company;
       $email = $form_data->email;
       $service = $form_data->service;
       $message = $form_data->message;

       $sql = "INSERT INTO ej_request_quote (name, company_name, email_id, services, message) VALUES (?, ?, ?, ?, ?)";
       $stmt = $conn->prepare($sql);

        if ($conn->query($sql) === TRUE) {
            $response = array(
                'status' => 'success',
                'message' => 'Request for Quote has been submitted successfully. Thank you for choosing Ejense Technology',
                'data' => $formData
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error processing data: ' . $conn->error,
                'data'  => 'Error processing data: ' . $conn->error,
            );
        }

        // Send the response back as JSON
        echo json_encode($response);

        // Close the database connection
        $conn->close();
    }
} else {
    // If the request method is not POST, return an error response
    $errorResponse = array(
        'error' => 'Invalid request method'
    );

    // Send the error response back as JSON
    echo json_encode($errorResponse);
}
?>