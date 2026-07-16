<?php
$servername = "118.139.180.148";
$database = "db_ejence_technology";
$username = "ejense_uname";
$password = "ejense_@9779696678";
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check the connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
$sql = "INSERT INTO ej_request_quote (name, company_name, email_id, services, message) VALUES ('Ejaj','Jstack','ejense_technology@ejense.in', 'Demo', 'I am using ejense')";
if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?> 