<?php
// Get form data
$full_name = $_POST['full_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin_code = $_POST['pin_code'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$school = $_POST['school'];
$institutionType = $_POST['institutionType'];
$major = $_POST['major'];
$graduationYear = $_POST['graduationYear'];
$agreement = $_POST['agreement'];

// Prepare data array
$data = [
    $full_name, $dob, $gender, $address, $city, $state,
    $pin_code, $email, $phone, $school, $institutionType, $major, $graduationYear, $agreement
];

// Check if data.csv file exists
$csvFile = 'data.csv';
$fileExists = file_exists($csvFile);

// Open file in write or append mode
$file = fopen($csvFile, $fileExists ? 'a' : 'w');

// Write header row if the file is newly created
if (!$fileExists) {
    fputcsv($file, [
        'Full Name', 'Date of Birth', 'Gender', 'Address', 'City', 'State',
        'Pin Code', 'Email', 'Phone', 'School/Institution Name', 'Type of Institution', 'Field of Study/Major', 'Year of Graduation or Expected Year of Graduation', 'Declaration'
    ]);
}

// Write data to CSV
fputcsv($file, $data);

// Close the file
fclose($file);

// Redirect to success page
header("Location: success.html");
exit();
?>
