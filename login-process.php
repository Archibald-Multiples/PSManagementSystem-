<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'primary';

// Connect to database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone_number = $_POST['phone_number'];
    $create_password = $_POST['create_password'];

    // Query to check if email and password match
    // ... (rest of the code remains the same)

$query = "SELECT * FROM pupils WHERE phone_number = '$phone_number' AND create_password = '$create_password'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) {
    // Login successful
    header('Location: Login_successful.html');

} else {
    // Login Unsuccessful
    header('Location: Login_Sorry.html');
}
}

// Close database connection
$conn->close();
?>