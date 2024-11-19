<?php
session_start();

// Redirect to login page if user is not authenticated
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

// Include database configuration
include 'config/config.php';

// Fetch data from the database
$sql = "SELECT * FROM booking";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Optional CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #6a11cb;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #6a11cb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2575fc;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        @media (max-width: 768px) {
        table {
            font-size: 14px; /* Adjust font size for smaller screens */
        }

        th, td {
            padding: 8px; /* Reduce padding for smaller screens */
        }

        h1 {
            font-size: 24px; /* Adjust heading size */
        }

        input[type="submit"] {
            padding: 8px 16px; /* Adjust button size */
            font-size: 14px; /* Adjust font size */
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 10px; /* Reduce padding for very small screens */
        }

        table {
            font-size: 12px; /* Further adjust font size */
        }

        h1 {
            font-size: 20px; /* Further adjust heading size */
        }

        input[type="submit"] {
            width: 100%; /* Make button full-width */
            font-size: 14px; /* Adjust font size */
        }
    }
    </style>
</head>
<body>
    <?php include 'include/header.php'; ?>
    
    <h1>Admin Panel - Teacher Details</h1>
    <table>
        <thead>
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
                <th>Joining Report</th>
                <th>Offer Letter</th>
                <th>Highest Qualification Certificate</th>
                <th>University Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Paths for downloadable files
                    $joining_report_path = 'path/to/joining_report/' . htmlspecialchars($row['joining_report']);
                    $offer_letter_path = 'path/to/offer_letter/' . htmlspecialchars($row['offer_letter']);
                    $qualification_certificate_path = 'path/to/qualification_certificate/' . htmlspecialchars($row['qualification_certificate']);

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
                            <td><a href='$joining_report_path' target='_blank'>Download</a></td>
                            <td><a href='$offer_letter_path' target ='_blank'>Download</a></td>
                            <td><a href='$qualification_certificate_path' target='_blank'>Download</a></td>
                            <td>" . htmlspecialchars($row['faculty_universityName']) . "</td>
                            <td><a href='download.php?id={$row['id']}'>Download</a></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='15'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div class="button-container">
        <form action="download.php" method="post">
            <input type="submit" value="Download All Data as Excel" />
        </form>
    </div>

    <?php include 'include/footer.php'; ?>
</body>
</html>

<?php
mysqli_close($conn);
?>