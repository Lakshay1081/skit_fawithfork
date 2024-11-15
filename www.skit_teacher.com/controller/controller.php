<?php 
include'../config/config.php';
if(isset($_REQUEST['booking'])){
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
$faculty_joiningReport = $_FILES['faculty_joiningReport']['name'];
$uploadpath = '../assets/upload/';
$faculty_joiningReport = $uploadpath . $faculty_joiningReport;
$faculty_offerLetter = $_FILES['faculty_offerLetter']['name'];
$uploadpath = '../assets/upload/';
$faculty_offerLetter = $uploadpath . $faculty_offerLetter;
$faculty_highestQualification = $_FILES['faculty_highestQualification']['name'];	
$uploadpath = '../assets/upload/';
$faculty_highestQualification = $uploadpath . $faculty_highestQualification;


// $faculty_highestQualification = mysqli_real_escape_string($conn, isset($_REQUEST['faculty_highestQualification']) ? $_REQUEST['faculty_highestQualification'] : '');
$faculty_universityName = mysqli_real_escape_string($conn, $_REQUEST['faculty_universityName']);


	$faculty_universityName =$_REQUEST['faculty_universityName'];

	if(move_uploaded_file($_FILES['faculty_joiningReport']['tmp_name'], $faculty_joiningReport)){
		mysqli_query($conn, "INSERT INTO booking(faculty_name , faculty_dob ,faculty_email ,faculty_mobile ,faculty_pan ,faculty_department ,faculty_designation ,faculty_employeeId ,faculty_promotionDate ,faculty_joiningDate ,faculty_joiningReport ,faculty_offerLetter ,faculty_highestQualification , faculty_universityName)VALUES('$faculty_name' , '$faculty_dob' ,'$faculty_email' ,'$faculty_mobile ','$faculty_pan' ,'$faculty_department' ,'$faculty_designation' ,'$faculty_employeeId' ,'$faculty_promotionDate' ,'$faculty_joiningDate'  ,'$faculty_joiningReport' ,'$faculty_offerLetter' ,'$faculty_highestQualification' , '$faculty_universityName')");			
				$_SESSION['success'] = "Your registration successfully";
				header("location:".$siteURL."/index.php");
	
	}

	// if(empty($faculty_name) && empty($faculty_dob) && empty($faculty_email) && empty($faculty_mobile) && empty($faculty_pan) && empty($faculty_department) && empty($faculty_designation) && empty($faculty_employeeId) && empty($faculty_promotionDate) && empty($faculty_joiningDate) && empty($faculty_salarySlip) && empty($faculty_joiningReport) && empty($faculty_offerLetter) && empty($faculty_highestQualification) && empty($faculty_universityName)){
		

	// 	$_SESSION['error'] = "Sorry Please fill the blank field!";
	// 	header("location:".$siteURL."/index.php");
	// }else{
	// 	$sql = mysqli_query($conn, "SELECT * FROM booking WHERE faculty_email='$faculty_email'");
		
	// 	if(mysqli_num_rows($sql)>0){			

	// 		$_SESSION['error'] = "Your registration already exists!";
	// 		header("location:".$siteURL."/index.php");
	// 	}else{
	// 		mysqli_query($conn, "INSERT INTO booking(faculty_name , faculty_dob ,faculty_email ,faculty_mobile ,faculty_pan ,faculty_department ,faculty_designation ,faculty_employeeId ,faculty_promotionDate ,faculty_joiningDate ,faculty_salarySlip ,faculty_joiningReport ,faculty_offerLetter ,faculty_highestQualification , faculty_universityName)VALUES('$faculty_name' , '$faculty_dob' ,'$faculty_email' ,'$faculty_mobile ','$faculty_pan' ,'$faculty_department' ,'$faculty_designation' ,'$faculty_employeeId' ,'$faculty_promotionDate' ,'$faculty_joiningDate' ,'$faculty_salarySlip' ,'$faculty_joiningReport' ,'$faculty_offerLetter' ,'$faculty_highestQualification' , '$faculty_universityName')");			
	// 		$_SESSION['success'] = "Your registration successfully";
	// 		header("location:".$siteURL."/index.php");
	// 	}
	// }

}
?>