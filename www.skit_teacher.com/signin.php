<?php
include('include/header.php');
?>

<style>
body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    box-sizing: border-box;
}

/* Container for form centering */
.main-container {
    flex: 1; /* Allows this section to grow and fill available space */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px; /* Add padding for better mobile responsiveness */
}

/* Sign-In Form Styles */
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
    border-radius: 1px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.google-btn:hover {
    background-color: #b8362d;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* Black with opacity */
}

.modal-content {
    background-color: #fff;
    margin: 10% auto; /* Center vertically */
    padding: 20px;
    border-radius: 10px;
    width: 90%;
    max-width: 400px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px;
}

.modal-close {
    color: #aaa;
    float: right;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.modal-close:hover,
.modal-close:focus {
    color: black;
    text-decoration: none;
}

.modal h2 {
    font-size: 20px;
    color: #333;
    margin-bottom: 15px;
    text-align: center;
}

.modal form label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #555;
    text-align: left;
}

.modal form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

.modal form .submit-btn {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.modal form .submit-btn:hover {
    background-color: #0056b3;
}

/* Footer and Header are already styled in the include files */
</style>

<div class="main-container">
    <div class="sign-in-container">
        <h1 class="title">Sign In</h1>
        <form class="sign-in-form" id="signInForm">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <button type="submit" class="submit-btn">Submit</button>
        </form>

        <div class="additional-links">
            <a href="#" id="forgotPassword">Forgot Password?</a>
        </div>

        <div class="google-login">
            <button class="google-btn" id="googleLogin">Login with Google</button>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div id="forgotPasswordModal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <h2>Forgot Password</h2>
        <form id="resetPasswordForm">
            <label for="resetEmail">College Email</label>
            <input type="email" id="resetEmail" placeholder="Enter your college email" required>
            
            <label for="newPassword">New Password</label>
            <input type="password" id="newPassword" placeholder="Enter new password" required>
            
            <button type="submit" class="submit-btn">Reset Password</button>
        </form>
    </div>
</div>

<script src="https://accounts.google.com/gsi/client" async defer></script>
<script>
// Email validation for sign-in
document.getElementById("signInForm").addEventListener("submit", function (event) {
    event.preventDefault();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const domain = "@skit.ac.in";

    if (!email.endsWith(domain)) {
        alert(`Please use your college email (${domain}).`);
        return;
    }

    if (email && password) {
        alert("Sign-In Successful!");
    } else {
        alert("Please fill in all the fields.");
    }
});

// Google Sign-In setup
function handleCredentialResponse(response) {
    console.log("Encoded JWT ID token: " + response.credential);
    // Handle sign-in with response.credential
    alert("Google Sign-In Successful!");
}

window.onload = function () {
    google.accounts.id.initialize({
        client_id: "YOUR_GOOGLE_CLIENT_ID",
        callback: handleCredentialResponse,
    });
    google.accounts.id.renderButton(
        document.getElementById("googleLogin"),
        { theme: "outline", size: "large" }
    );
};

// Forgot Password Modal Logic
const modal = document.getElementById("forgotPasswordModal");
const closeModal = document.querySelector(".modal-close");

document.getElementById("forgotPassword").addEventListener("click", function (event) {
    event.preventDefault();
    modal.style.display = "block";
});

closeModal.addEventListener("click", function () {
    modal.style.display = "none";
});

window.addEventListener("click", function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

// Reset Password Logic
document.getElementById("resetPasswordForm").addEventListener("submit", function (event) {
    event.preventDefault();
    const resetEmail = document.getElementById("resetEmail").value.trim();
    const newPassword = document.getElementById("newPassword").value;
    const domain = "@skit.ac.in";

    if (!resetEmail.endsWith(domain)) {
        alert(`Please use your college email (${domain}).`);
        return;
    }

    if (resetEmail && newPassword) {
        alert("Password reset successfully!");
        modal.style.display = "none"; // Close modal on success
    } else {
        alert("Please fill in all the fields.");
    }
});
</script>

<?php
include('include/footer.php');
?>