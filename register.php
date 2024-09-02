<?php

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "esycon"; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$title = $_POST['title'] ?? '';
$first_name = $_POST['first-name'] ?? '';
$middle_initial = $_POST['middle-initial'] ?? '';
$last_name = $_POST['last-name'] ?? '';
$suffix = $_POST['suffix'] ?? '';
$status = $_POST['status'] ?? '';
$current_affiliation = $_POST['current-affiliation'] ?? '';
$job_title = $_POST['job-title'] ?? '';
$department = $_POST['department'] ?? '';
$room = $_POST['room'] ?? '';
$street_address = $_POST['street-address'] ?? '';
$post_office = $_POST['post-office'] ?? '';
$state = $_POST['state'] ?? '';
$county = $_POST['county'] ?? '';
$email = $_POST['email'] ?? '';
$alt_email_1 = $_POST['alt-email-1'] ?? '';
$alt_email_2 = $_POST['alt-email-2'] ?? '';
$alt_email_3 = $_POST['alt-email-3'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$timezone = $_POST['timezone'] ?? '';
$special_needs = isset($_POST['special-needs']) ? implode(', ', $_POST['special-needs']) : '';
$shirt_size = $_POST['shirt-size'] ?? '';
$gender = $_POST['gender'] ?? '';
$stmt = $conn->prepare("INSERT INTO users (title, first_name, middle_initial, last_name, suffix, status, current_affiliation, job_title, department, room, street_address, post_office, state, county, email, alt_email_1, alt_email_2, alt_email_3, telephone, mobile, timezone, special_needs, shirt_size, gender) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssssssssssssssssssssss", $title, $first_name, $middle_initial, $last_name, $suffix, $status, $current_affiliation, $job_title, $department, $room, $street_address, $post_office, $state, $county, $email, $alt_email_1, $alt_email_2, $alt_email_3, $telephone, $mobile, $timezone, $special_needs, $shirt_size, $gender);
if ($stmt->execute()) {
    echo "New account created successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
