<?php
include('include/header.php');
?>
<!-- form area start  -->
<div class="form-container" style="display: flex; flex-direction: column; align-items: center;">

    <!-- Centered Title -->
    <h1 style="font-size: 40px; text-align: center;">Teacher Details Form</h1>

    <form class="teacher-form" id="teacherForm" action="controller/controller.php" method="post" enctype="multipart/form-data" style="display: flex; gap: 20px; flex-wrap: wrap; width: 100%; max-width: 1200px; justify-content: center;  padding: 20px; border-radius: 8px;">
        <style>
            .teacher-form input[type="text"],
            .teacher-form input[type="date"],
            .teacher-form input[type="tel"],
            .teacher-form input[type="email"],
            .teacher-form input[type="number"],
            .teacher-form input[type="file"],
            .teacher-form select {
                width: 100%;
                height: 40px;
                padding: 8px;
                font-size: 16px;
                border: 1px solid black;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .teacher-form button {
                height: 40px;
                font-size: 16px;
                padding: 8px 16px;
                border: 1px solid black;
                border-radius: 4px;
                cursor: pointer;
                background-color: #b71a00; /* Optional for button styling */
            }

            .teacher-form button:hover {
                background-color: #b71a34;
            }
        </style>
        <div style="flex: 1; min-width: 350px; margin-right: 40px;">
            <label for="name">Name:</label>
            <input type="text" id="name" name="faculty_name" required pattern="[A-Za-z\s]+">

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="faculty_dob" required>

            <label for="mobile">Mobile No:</label>
            <input type="tel" id="mobile" name="faculty_mobile" placeholder ="+91"required pattern="^[6-9][0-9]{9}$">

            <label for="email">Email:</label>
            <input type="email" id="email" name="faculty_email" required>

            <label for="pan">PAN:</label>
            <input type="text" id="pan" name="faculty_pan" required pattern="^[A-Z]{5}[0-9]{4}[A-Z]{1}$">

            <label for="department">Department:</label>
            <select id="department" name="faculty_department" required>
                <option value="">Select Department</option>
                <option value="CS">Computer Science</option>
                <option value="DS">Data Science</option>
                <option value="IOT">Internet of Things</option>
                <option value="AI">Artificial Intelligence</option>
            </select>
            <label for="designation">Designation:</label>
            <select id="designation" name="faculty_designation" required>
                <option value="">Select Designation</option>
                <option value="Professor">Professor</option>
                <option value="Assistant Professor">Assistant Professor-1</option>
                <option value="Assistant Professor">Assistant Professor-2</option>                
            </select>
        </div>
        <div style="flex: 1; min-width: 350px;">
<label for="employeeId">Employee ID:</label>
<input type="number" id="employeeId" name="faculty_employeeId" required min="1" max="9999">

            <label for="joiningDate">Joining Date:</label>
            <input type="date" id="joiningDate" name="faculty_joiningDate" required>

            <label for="promotionDate">Promotion Date:</label>
            <input type="date" id="promotionDate" name="faculty_promotionDate">

            <label for="joiningReport">Joining Report:</label>
            <input type="file" id="joiningReport" name="faculty_joiningReport" accept=".pdf,.jpg,.jpeg,.png">

            <label for="offerLetter">Offer Letter:</label>
            <input type="file" id="offerLetter" name="faculty_offerLetter" accept=".pdf,.jpg,.jpeg,.png">

            <label for="highestQualification">Highest Qualification Certificate:</label>
            <input type="file" id="highestQualification" name="faculty_highestQualification" accept=".pdf,.jpg,.jpeg,.png">

            <label for="universityName">University Name:</label>
            <input type="text" id="universityName" name="faculty_universityName" required pattern="[A-Za-z\s]+">
        </div>

        <!-- Centered Submit Button -->
        <div style="width: 100%; text-align: center; margin-top: 20px;">
            <button type="submit" id="submit" name="booking" style="color: white;">Submit</button>
        </div>
    </form>
</div>
<script>

    document.getElementById('teacherForm').onsubmit = function() {
    // Retrieve form field values
    const name = document.getElementById('name').value.trim();
    const dob = new Date(document.getElementById('dob').value);
    const mobile = document.getElementById('mobile').value.trim();
    const email = document.getElementById('email').value.trim();
    const pan = document.getElementById('pan').value.trim();
    const joiningDate = new Date(document.getElementById('joiningDate').value);
    const promotionDate = new Date(document.getElementById('promotionDate').value);
    const currentYear = new Date().getFullYear();

    // Validate Name
    if (!/^[A-Za-z\s]+$/.test(name)) {
        alert("Name must contain only alphabets and spaces.");
        return false;
    }

    // Validate Date of Birth
    const minYear = 1960;
const maxYear = 2001;

if (dob.getFullYear() < minYear || dob.getFullYear() > maxYear) {
    alert("Date of Birth must be between 1960 and 2001.");
    return false;
}

    // Validate Mobile Number
    if (!/^[0-9]{10}$/.test(mobile)) {
        alert("Mobile number must be 10 digits.");
        return false;
    }

    // Validate Email
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        alert("Invalid email address.");
        return false;
    }

    // Validate Joining Date
    if (joiningDate.getFullYear() < 2000 || joiningDate.getFullYear() > currentYear) {
        alert("Joining Date must be after the year 2000 and before the current year.");
        return false;
    }

    // Validate Promotion Date
    if (promotionDate.getFullYear() < 2000 || promotionDate.getFullYear() > currentYear || promotionDate <= joiningDate) {
        alert("Promotion Date must be after the year 2000, before the current year, and after the Joining Date.");
        return false;
    }

    // Validate PAN Number
    const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    if (!panRegex.test(pan)) {
        alert("Invalid PAN number format.");
        return false;
    }

    // If all validations pass
    alert("Form submitted successfully.");
    return true;
};
</script>
    
<br>

<?php
include('include/footer.php');
?>
<!-- <style>
    .form-container {
  width: 500px;
  height: 500px;
  background-color: #fff;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  border-radius: 10px;
  box-sizing: border-box;
  padding: 20px 30px;
}

.title {
  text-align: center;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  margin: 10px 0 30px 0;
  font-size: 28px;
  font-weight: 800;
}

.form {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 18px;
  margin-bottom: 15px;
}

.input {
  border-radius: 20px;
  border: 1px solid #c0c0c0;
  outline: 0 !important;
  box-sizing: border-box;
  padding: 12px 15px;
}

.page-link {
  text-decoration: underline;
  margin: 0;
  text-align: end;
  color: #747474;
  text-decoration-color: #747474;
}

.page-link-label {
  cursor: pointer;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  font-size: 9px;
  font-weight: 700;
}

.page-link-label:hover {
  color: #000;
}

.form-btn {
  padding: 10px 15px;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  border-radius: 20px;
  border: 0 !important;
  outline: 0 !important;
  background: teal;
  color: white;
  cursor: pointer;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.form-btn:active {
  box-shadow: none;
}

.sign-up-label {
  margin: 0;
  font-size: 10px;
  color: #747474;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
}

.sign-up-link {
  margin-left: 1px;
  font-size: 11px;
  text-decoration: underline;
  text-decoration-color: teal;
  color: teal;
  cursor: pointer;
  font-weight: 800;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
}

.buttons-container {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  margin-top: 20px;
  gap: 15px;
}

.apple-login-button,
    .google-login-button {
  border-radius: 20px;
  box-sizing: border-box;
  padding: 10px 15px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
        rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  font-size: 11px;
  gap: 5px;
}

.apple-login-button {
  background-color: #000;
  color: #fff;
  border: 2px solid #000;
}

.google-login-button {
  border: 2px solid #747474;
}

.apple-icon,
    .google-icon {
  font-size: 18px;
  margin-bottom: 1px;
}
 
        /* Modal animation */
        .modal {
            display: none;
            opacity: 0;
            animation: fadeIn 0.5s ease-out forwards, scaleUp 0.5s ease-out forwards;
        }
        .modal.show {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes scaleUp {
            from { transform: scale(0.8); }
            to { transform: scale(1); }
        }
    </style>
</head>
<body>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-container">
                <p class="title">Welcome</p>
                <form class="form">
                    <input type="email" class="input" placeholder="Email" required>
                    <input type="password" class="input" placeholder="Password" required>
                    <p class="page-link">
                        <span class="page-link-label">Forgot Password?</span>
                    </p>
                    <button type="submit" class="form-btn" onclick="signIn()">Log in</button>
                </form>
                <p class="sign-up-label">
                    Don't have an account?<span class="sign-up-link">Sign up</span>
                </p>
                <div class="buttons-container">
                    <div class="apple-login-button">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" class="apple-icon" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                             <path d="M747.4 535.7c-.4-68.2 30.5-119.6 92.9-157.5-34.9-50-87.7-77.5-157.3-82.8-65.9-5.2-138 38.4-164.4 38.4-27.9 0-91.7-36.6-141.9-36.6C273.1 298.8 163 379.8 163 544.6c0 48.7 8.9 99 26.7 150.8 23.8 68.2 109.6 235.3 199.1 232.6 46.8-1.1 79.9-33.2 140.8-33.2 59.1 0 89.7 33.2 141.9 33.2 90.3-1.3 167.9-153.2 190.5-221.6-121.1-57.1-114.6-167.2-114.6-170.7zm-105.1-305c50.7-60.2 46.1-115 44.6-134.7-44.8 2.6-96.6 30.5-126.1 64.8-32.5 36.8-51.6 82.3-47.5 133.6 48.4 3.7 92.6-21.2 129-63.7z"></path>
                        </svg>
                        <span>Log in with Apple</span>
                    </div>
                    <div class="google-login-button">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" class="google-icon" viewBox="0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                        </svg>
                        <span>Log in with Google</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('myModal').classList.add('show');
    });
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            event.stopPropagation();
        }
    }

    function signIn() {
        document.getElementById('myModal').style.display = 'none';
    }
</script> -->
