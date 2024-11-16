<?php
include 'config/config.php'; // Include your database config

// Fetch data from the database
$sql = "SELECT * FROM booking";
$result = mysqli_query($conn, $sql);

// Create Excel file
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=teacher_details.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Output data to the Excel file
if ($result && mysqli_num_rows($result) > 0) {
    echo "ID\tName\tDate of Birth\tEmail\tMobile\tPAN\tDepartment\tDesignation\tEmployee ID\tJoining Date\tPromotion Date\tjoining report\t offer letter \t Highest Oualification Certificate\tUniversity Name\n"; // Header row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "{$row['id']}\t{$row['faculty_name']}\t{$row['faculty_dob']}\t{$row['faculty_email']}\ \t{$row['faculty_mobile']}\t{$row['faculty_pan']}\t{$row['faculty_department']}\t{$row['faculty_designation']}\t{$row['faculty_employeeId']}\t{$row['faculty_joiningDate']}\t{$row['faculty_promotionDate']}\t{$row['faculty_joiningReport']}\t{$row['faculty_offerLetter']}\t{$row['faculty_highestQualification']}\t{$row['faculty_universityName']}\n";
    }
} else {
    echo "No data found";
}

mysqli_close($conn);
exit;
?>