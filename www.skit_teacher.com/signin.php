<?php
    include('config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKIT- Faculty Area</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.svg">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- fontawesome 6.4.2 -->
    <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
    <!-- bootstrap min css -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- swiper Css 10.2.0 -->
    <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">
    <!-- Bootstrap 5.0.2 -->
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <!-- metismenu scss -->
    <link rel="stylesheet" href="assets/css/vendor/metismenu.css">
    <!-- nice select js -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
    <!-- custom style css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- header area start -->
<header class="header v__5 @@class header__sticky">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="header__wrapper" style="display: flex; align-items: center; justify-content: space-between;">
                    <!-- Logo on the left -->
                    <div class="header__logo" style="flex: 0 0 auto;">
                        <a href="index.html" class="header__logo--link">
                            <img src="assets/images/logoooo.png" style="width: 7vw;" alt="unipix">
                        </a>
                    </div>
                    <div style="flex: 1; text-align: center;">
                        <h2 style="font-size: 40px; margin: 0; word-spacing: 10px;">Swami Keshvanand Institute Of Technology</h2>
                        <h3 style="font-size: 24px; margin: 5px 0 0 0;">Management & Gramothan, Jaipur</h3>
                        <h5 style="font-size: 12px; margin: 5px 0 0 5px;">(An Autonomous Institute Affiliated to Rajasthan Technical University, Kota)</h5>
                    </div>
                    <div style="flex: 0 0 auto;"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f9;
}

.sign-in-container {
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px;
    width: 100%;
    max-width: 400px;
    text-align: center;
}

.title {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.sign-in-form label {
    display: block;
    text-align: left;
    margin: 10px 0 5px;
    font-size: 14px;
    color: #555;
}

.sign-in-form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

.submit-btn {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background-color: #0056b3;
}

.additional-links {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
    font-size: 14px;
}

.additional-links a {
    color: #007BFF;
    text-decoration: none;
}

.additional-links a:hover {
    text-decoration: underline;
}

.google-login {
    margin-top: 20px;
}

.google-btn {
    width: 100%;
    padding: 10px;
    background-color: #DB4437;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.google-btn:hover {
    background-color: #b8362d;
}

    </style>
    <div class="sign-in-container">
        <h1 class="title">Sign In</h1>
        <form class="sign-in-form" id="signInForm">
            <!-- Email Field -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <!-- Password Field -->
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Submit</button>
        </form>

        <!-- Forgot Password and Create Password Links -->
        <div class="additional-links">
            <a href="#" id="forgotPassword">Forgot Password?</a>
            <a href="#" id="createAccount">Create Account</a>
        </div>

        <!-- Google Login -->
        <div class="google-login">
            <button class="google-btn" id="googleLogin">Login with Google</button>
        </div>
    </div>

    <script>
// Handle form submission
document.getElementById("signInForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission behavior
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;

    if (email && password) {
        alert("Sign-In Successful!"); // Handle login logic here
    } else {
        alert("Please fill in all the fields.");
    }
});

// Handle "Forgot Password" click
document.getElementById("forgotPassword").addEventListener("click", function () {
    alert("Redirecting to the Forgot Password page..."); // Implement redirection here
});

// Handle "Create Account" click
document.getElementById("createAccount").addEventListener("click", function () {
    alert("Redirecting to the Create Account page..."); // Implement redirection here
});

// Handle Google Login button click
document.getElementById("googleLogin").addEventListener("click", function () {
    alert("Google Login functionality to be implemented."); // Add Google API logic here
});

    </script>
   <footer class="footer v__1">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section -->
            <div class="col-lg-4 col-md-4 col-sm-3 d-flex justify-content-start">
                <div class="footer__widget--logo">
                    <a href="index-2.html">
                        <img src="assets/images/logoooo.png" style="width: 7vw;" alt="logo">
                    </a>
                </div>
            </div>

            <!-- Text Section -->
            <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-center">
                <p class="footer__widget--description text-center">
                    We are passionate education dedicated to providing high-quality resources learners
                    all backgrounds.
                </p>
            </div>

            <!-- Social Media Section -->
            <div class="col-lg-4 col-md-4 col-sm-3 d-flex justify-content-end">
                <ul class="footer__widget--social social">
                    <li class="social__link"><a href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2FSKITJAIP%2F"><i class="fa-brands fa-facebook"></i></a></li>
                    <li class="social__link"><a href="https://www.instagram.com/skitjaipurofficial/?hl=en"><i class="fa-brands fa-instagram"></i></a></li>
                    <li class="social__link"><a href="https://in.linkedin.com/school/skit-jaipur/"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li class="social__link"><a href="https://www.youtube.com/@SKITJaipurOfficial"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="copyright__wrapper text-center">
                    <p>Copyright &copy; 2024 All Rights Reserved by <a href="#">SKIT</a></p>
                </div>
            </div>
        </div>
    </div>
</div>