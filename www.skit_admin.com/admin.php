<?php
session_start();
include 'config/config.php'; // Include your database config

// Fetch data from the database
$sql = "SELECT * FROM booking";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="text-align: center;">Admin Panel</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Optional CSS -->
</head>
<body>
    <?php include 'include/header.php'; ?>
    
    <h1>Admin Panel - Teacher Details</h1>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>PAN</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Employee ID</th>
            <th>Joining Date</th>
            <th>Promotion Date</th>
            <th>joining report</th>
            <th>offer letter</th>
            <th>highest Qualification certificate</th>
            <th>University Name</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['faculty_name']}</td>
                        <td>{$row['faculty_dob']}</td>
                        <td>{$row['faculty_email']}</td>
                        <td>{$row['faculty_mobile']}</td>
                        <td>{$row['faculty_pan']}</td>
                        <td>{$row['faculty_department']}</td>
                        <td>{$row['faculty_designation']}</td>
                        <td>{$row['faculty_employeeId']}</td>
                        <td>{$row['faculty_joiningDate']}</td>
                        <td>{$row['faculty_promotionDate']}</td>
                        <th>joining report</th>
                        <th>offer letter</th>
                        <th>highest Qualification certificate</th>
                        <td>{$row['faculty_universityName']}</td>
                        <td><a href='download.php?id={$row['id']}'>Download</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='13'>No data found</td></tr>";
        }
        ?>
    </table>
    
    <form action="download.php" method="post">
        <input type="submit" value="Download All Data as Excel" />
    </form>

    <?php include 'include/footer.php'; ?>
</body>
</html>

<?php
mysqli_close($conn);
?>