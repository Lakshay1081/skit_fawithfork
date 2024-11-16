<?php
include '../config/config.php';

if (isset($_REQUEST['booking'])) {
    // Escape the user input to prevent SQL injection
    $faculty_name = mysqli_real_escape_string($conn, $_REQUEST['faculty_name']);
    $faculty_dob = mysqli_real_escape_string($conn, $_REQUEST['faculty_dob']);
    $faculty_email = mysqli_real_escape_string($conn, $_REQUEST['faculty_email']);
    $faculty_mobile = mysqli_real_escape_string($conn, $_REQUEST['faculty_mobile']);
    $faculty_pan = mysqli_real_escape_string($conn, $_REQUEST['faculty_pan']);
    $faculty_department = mysqli_real_escape_string($conn, $_REQUEST['faculty_department']);
    $faculty_designation = mysqli_real_escape_string($conn, $_REQUEST['faculty_designation']);
    $faculty_employeeId = mysqli_real_escape_string($conn, $_REQUEST['faculty_employeeId']);
    $faculty_promotionDate = mysqli_real_escape_string($conn, $_REQUEST['faculty_promotionDate']);
    $faculty_joiningDate = mysqli_real_escape_string($conn, $_REQUEST['faculty_joiningDate']);
    $faculty_universityName = mysqli_real_escape_string($conn, $_REQUEST['faculty_universityName']);

    // Define the upload directory once
    $uploadpath = '../assets/upload/';

    // Check if the directory exists, if not, create it
    if (!file_exists($uploadpath)) {
        mkdir($uploadpath, 0777, true); // Create directory if it doesn't exist
    }

    // Handle file uploads
    $faculty_joiningReport = $_FILES['faculty_joiningReport']['name'];
    $faculty_offerLetter = $_FILES['faculty_offerLetter']['name'];
    $faculty_highestQualification = $_FILES['faculty_highestQualification']['name'];

    // Define the file paths
    $faculty_joiningReportPath = $uploadpath . basename($faculty_joiningReport);
    $faculty_offerLetterPath = $uploadpath . basename($faculty_offerLetter);
    $faculty_highestQualificationPath = $uploadpath . basename($faculty_highestQualification);

    // Check if files are uploaded successfully and move them to the correct folder
    $isFileUploadSuccessful = true;

    if ($_FILES['faculty_joiningReport']['error'] == UPLOAD_ERR_OK) {
        $isFileUploadSuccessful &= move_uploaded_file($_FILES['faculty_joiningReport']['tmp_name'], $faculty_joiningReportPath);
    } else {
        $_SESSION['error'] = "Failed to upload joining report.";
        $isFileUploadSuccessful = false;
    }

    if ($_FILES['faculty_offerLetter']['error'] == UPLOAD_ERR_OK) {
        $isFileUploadSuccessful &= move_uploaded_file($_FILES['faculty_offerLetter']['tmp_name'], $faculty_offerLetterPath);
    } else {
        $_SESSION['error'] = "Failed to upload offer letter.";
        $isFileUploadSuccessful = false;
    }

    if ($_FILES['faculty_highestQualification']['error'] == UPLOAD_ERR_OK) {
        $isFileUploadSuccessful &= move_uploaded_file($_FILES['faculty_highestQualification']['tmp_name'], $faculty_highestQualificationPath);
    } else {
        $_SESSION['error'] = "Failed to upload highest qualification.";
        $isFileUploadSuccessful = false;
    }

    // Proceed with insertion if all uploads were successful
    if ($isFileUploadSuccessful) {
        // Check if required fields are empty
        if (empty($faculty_name) || empty($faculty_email) || empty($faculty_department) || empty($faculty_joiningDate) || empty($faculty_joiningReport) || empty($faculty_offerLetter) || empty($faculty_highestQualification)) {
            $_SESSION['error'] = "Please fill all the required fields!";
            header("Location: " . $siteURL . "/index.php");
            exit;
        }

        // Check if the faculty email already exists in the database
        $sql = mysqli_query($conn, "SELECT * FROM booking WHERE faculty_email='$faculty_email'");
        if (mysqli_num_rows($sql) > 0) {
            $_SESSION['error'] = "Registration already exists for this email!";
            header("Location: " . $siteURL . "/index.php");
            exit;
        }

        // Insert data into the database
        $query = "INSERT INTO booking(faculty_name, faculty_dob, faculty_email, faculty_mobile, faculty_pan, faculty_department, faculty_designation, faculty_employeeId, faculty_promotionDate, faculty_joiningDate, faculty_joiningReport, faculty_offerLetter, faculty_highestQualification, faculty_universityName)
                  VALUES ('$faculty_name', '$faculty_dob', '$faculty_email', '$faculty_mobile', '$faculty_pan', '$faculty_department', '$faculty_designation', '$faculty_employeeId', '$faculty_promotionDate', '$faculty_joiningDate', '$faculty_joiningReportPath', '$faculty_offerLetterPath', '$faculty_highestQualificationPath', '$faculty_universityName')";

        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Your registration was successful!";
            header("Location: " . $siteURL . "/index.php");
        } else {
            $_SESSION['error'] = "There was an error during the registration process. Please try again.";
            header("Location: " . $siteURL . "/index.php");
        }
    } else {
        $_SESSION['error'] = "There was a problem with one or more file uploads.";
        header("Location: " . $siteURL . "/index.php");
    }
}
?>
