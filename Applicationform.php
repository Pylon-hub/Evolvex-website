<?php
// Step 2a: Database Connection
$servername = "localhost";      // usually localhost
$username = "root";             // your MySQL username
$password = "";                 // your MySQL password
$dbname = "evolvex_admissions"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2b: Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];

    // Insert into database
    $sql = "INSERT INTO applicants (first_name, last_name, email, phone, gender, course)
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$gender', '$course')";

    if ($conn->query($sql) === TRUE) {
        $message = "Application submitted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Form | Evolvex College</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background: #f8f9fa;
}

.form-section{
background: white;
padding: 40px;
border-radius: 10px;
box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.header-banner{
background: linear-gradient(to right, #000000, #ff9900);
color: white;
padding: 60px 0;
text-align: center;
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="header-banner">
<h1>Evolvex College of Advanced Technology</h1>
<p>Course & Scholarship Application Form</p>
</div>

<!-- APPLICATION FORM -->
<div class="container py-5">
<div class="row justify-content-center">
<div class="col-lg-8">

<div class="form-section">

<h3 class="text-center mb-4">Student Application Form</h3>

<form id="applicationForm">

<!-- Personal Info -->
<h5 class="mb-3 text-warning">Personal Information</h5>

<div class="row g-3">
<div class="col-md-6">
<label class="form-label">First Name</label>
<input type="text" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">Last Name</label>
<input type="text" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">Email Address</label>
<input type="email" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">Phone Number</label>
<input type="tel" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">Date of Birth</label>
<input type="date" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">Gender</label>
<select class="form-select" required>
<option value="">Select</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>
</div>

<hr class="my-4">

<!-- Course Selection -->
<h5 class="mb-3 text-warning">Course Selection</h5>

<div class="row g-3">

<div class="col-md-6">
<label class="form-label">Select Course</label>
<select class="form-select" required>
<option value="">Choose Course</option>
<option>Software Engineering</option>
<option>Cyber Security</option>
<option>Digital Marketing & AI</option>
<option>Virtual Assistant</option>
<option>Data Science</option>
<option>Data Analysis</option>
<option>Artificial Intelligence</option>
<option>Social Media Marketing</option>
<option>ICDL</option>
</select>
</div>

<div class="col-md-6">
<label class="form-label">Study Mode</label>
<select class="form-select" required>
<option value="">Select Mode</option>
<option>Full Time</option>
<option>Part Time</option>
<option>Online</option>
</select>
</div>

<div class="col-12">
<label class="form-label">Are you applying for a scholarship?</label>
<select class="form-select" id="scholarshipSelect">
<option>No</option>
<option>Yes</option>
</select>
</div>

<div class="col-12" id="scholarshipReason" style="display:none;">
<label class="form-label">Why do you deserve the scholarship?</label>
<textarea class="form-control"></textarea>
</div>

</div>

<hr class="my-4">

<!-- Upload Documents -->
<h5 class="mb-3 text-warning">Upload Documents</h5>

<div class="row g-3">
<div class="col-md-6">
<label class="form-label">Upload ID / Passport</label>
<input type="file" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">Upload Academic Certificate</label>
<input type="file" class="form-control" required>
</div>
</div>

<hr class="my-4">

<!-- Terms -->
<div class="form-check mb-3">
<input class="form-check-input" type="checkbox" required>
<label class="form-check-label">
I confirm that the information provided is accurate.
</label>
</div>

<!-- ✅ WORKING SUBMIT BUTTON -->
<div class="d-grid">
<button type="submit" class="btn btn-warning btn-lg">
Submit Application
</button>
</div>

</form>

<!-- Success Message -->
<div id="successMessage" class="alert alert-success mt-4 text-center d-none">
Your application has been successfully submitted!
</div>

</div>
</div>
</div>
</div>
<!-- Back to Home Button -->
<div class="text-center my-4">
  <a href="index.html" class="btn btn-warning btn-lg">Back to Home</a>
<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3">
© 2026 Evolvex College of Advanced Technology | All Rights Reserved
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Scholarship field toggle
document.getElementById("scholarshipSelect").addEventListener("change", function(){
document.getElementById("scholarshipReason").style.display =
this.value === "Yes" ? "block" : "none";
});

// Submit handling
document.getElementById("applicationForm").addEventListener("submit", function(e){
e.preventDefault();
document.getElementById("successMessage").classList.remove("d-none");
this.reset();
});

</script>
</div>

</body>
</html>

