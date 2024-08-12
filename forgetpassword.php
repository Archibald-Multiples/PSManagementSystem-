<!DOCTYPE html>
<!-- saved from url=(0042)file:///C:/xampp/htdocs/primary/login.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/log.css">
</head>
<body>


<?php
// Connect to the database 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "primary";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone_number = $_POST["phone_number"];

    // Check if phone number exists in database
    $query = "SELECT * FROM pupils WHERE phone_number = '$phone_number'";
    $result = mysqli_query($conn, $query);

    
// ... (rest of the code remains the same)

if (mysqli_num_rows($result) > 0) {
    // Generate a new password
    $new_password = generate_password(8);

    // Update the password in the database
    $query = "UPDATE pupils SET password = '$new_password' WHERE phone_number = '$phone_number'";
    mysqli_query($conn, $query);

    // Store the new password in a variable
    $reset_password = $new_password;

    // Display the reset password on the webpage
    echo "Your new password is: $reset_password";
} else {
    echo "Phone number not found!";

}

}

// Function to generate a random password
function generate_password($length) {
    $characters = "abcdejklmnQRST3456789";
    $password = "";
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

// Function to send the password to the user's phone number
function send_password($phone_number, $password) {
    // Implement your SMS gateway API here
    // For example, using Twilio:
    // $twilio = new Twilio("your_account_sid", "your_auth_token");
    // $twilio->messages->create($phone_number, array("from" => "your_twilio_number", "body" => "Your new password is: $password"));
}

?>