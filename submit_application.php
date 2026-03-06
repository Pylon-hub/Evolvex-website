<?php

// Database connection
$conn = new mysqli("localhost", "root", "", "evolvex_college");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$study_mode = $_POST['study_mode'];
$scholarship = $_POST['scholarship'];
$scholarship_reason = $_POST['scholarship_reason'];

// Handle file uploads
$id_document = $_FILES['id_document']['name'];
$certificate = $_FILES['certificate']['name'];

move_uploaded_file($_FILES['id_document']['tmp_name'], "uploads/" . $id_document);
move_uploaded_file($_FILES['certificate']['tmp_name'], "uploads/" . $certificate);

// Insert into database
$sql = "INSERT INTO applications 
(first_name, last_name, email, phone, dob, gender, course, study_mode, scholarship, scholarship_reason, id_document, certificate)
VALUES 
('$first_name', '$last_name', '$email', '$phone', '$dob', '$gender', '$course', '$study_mode', '$scholarship', '$scholarship_reason', '$id_document', '$certificate')";

if ($conn->query($sql) === TRUE) {
    echo "Application submitted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>
