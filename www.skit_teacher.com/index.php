    <?php
    include('include/header.php');
    ?>
    <!-- form area start  -->
    <body class="body-no-scroll">
    <div class="form-container" style="display: flex; flex-direction: column; align-items: center;">

        <!-- Centered Title -->
        <h1 style="font-size: 40px; text-align: center;">Teacher Details Form</h1>

        <form class="teacher-form" id="teacherForm" action="controller/controller.php" method="post" enctype="multipart/form-data" style="display: flex; gap: 20px; flex-wrap: wrap; width: 100%; max-width: 1200px; justify-content: center;  padding: 20px; border-radius: 8px;">
            <style>
                .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .teacher-form {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        width: 100%;
        max-width: 1200px;
        justify-content: center;
        padding: 20px;
        border-radius: 8px;
    }

    .teacher-form div {
        flex: 1;
        min-width: 350px;
        margin-right: 40px;
    }

    /* Media query for tablets */
    @media (max-width: 768px) {
        .teacher-form {
            flex-direction: column;
            align-items: center;
        }

        .teacher-form div {
            width: 100%;    
            max-width: 500px;
        }

        h1 {
            font-size: 30px;
        }
    }

    /* Media query for mobile devices */
    @media (max-width: 320px) {
        h1 {
            font-size: 24px;
            text-align: center;
        }

        .teacher-form {
            padding: 10px;
        }

        .teacher-form div {
            min-width: 100%;
            margin-right: 0;
        }

        .teacher-form button {
            width: 100%;
        }
    }

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
                    background-color: #b71a00;
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
