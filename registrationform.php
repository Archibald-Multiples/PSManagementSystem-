<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Student Information
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $languages = $_POST['languages'];
    $grade_level = $_POST['grade_level'];

    // Parent/Guardian Information
    $p_fullname = $_POST['p_fullname'];
    $relationship = $_POST['relationship'];
    $occupation = $_POST['occupation'];
    $p_number = $_POST['p_number'];
    $email = $_POST['email'];
    $parent_nationality = $_POST['parent_nationality'];
    $parent_address = $_POST['parent_address'];

    // Account Information
    $phone_number = $_POST['phone_number'];
    $create_password = $_POST['create_password'];
    $hashed_password = password_hash($create_password, PASSWORD_DEFAULT);

    // Connect to the database 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "primary";

    $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $regist = "INSERT INTO pupils VALUES ('','$fullname', '$dob', '$age', '$gender', '$nationality', '$address', '$languages', '$grade_level', '$p_fullname', '$relationship', '$occupation', '$p_number', '$email', '$parent_nationality', '$parent_address', '$phone_number','$create_password')";
        
   // $logi = "INSERT INTO logins VALUES ( '$phone_number', '$create_password')";

    if ($conn->query($regist) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $regist . "<br>" . $conn->error;
    }
    
    $conn->close();
    
}
?>
