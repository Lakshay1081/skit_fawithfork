    <style>
        .body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .feedcontainer {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .feed {
            text-align: center;
            color: #333;
        }
        .feedlabel {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .feedinput, .textarea, .feedbutton {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .feedbutton {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .feedbutton:hover {
            background-color: #0056b3;
        }
        .errorr {
            color: red;
            font-size: 14px;
        }
    </style>

    <?php
    include('include/header.php');
    ?>
    <div class="body">
    <div class=" feedcontainer">
        <h2 class="feed">Feedback Form</h2>
        <form id="feedbackForm">
            <label class="feedlabel" for="name">Name:</label>
            <input class="feedinput" type="text" id="name" name="name" required>
            
            <label class="feedlabel" for="email">Email:</label>
            <input class="feedinput" type="email" id="email" name="email" placeholder="Your SKIT Email (e.g., name@skit.ac.in)" required>
            <div id="emailError" class="errorr"></div>
            
            <label class="feedlabel" for="feedback">Feedback:</label>
            <textarea class="textarea" id="feedback" name="feedback" rows="5" placeholder="Your feedback..." required></textarea>
            
            <button class="feedbutton" type="submit">Submit</button>
        </form>
    </div>
    </div>

    <?php
    include('include/footer.php');
    ?>

    <script>
        const feedbackForm = document.getElementById('feedbackForm');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');

        feedbackForm.addEventListener('submit', function(event) {
            emailError.textContent = ''; // Clear previous error messages
            const email = emailInput.value;

            // Validate that the email ends with "@skit.ac.in"
            const emailPattern = /^[a-zA-Z0-9._%+-]+@skit\.ac\.in$/;
            if (!emailPattern.test(email)) {
                emailError.textContent = 'Please enter a valid SKIT email address ending with @skit.ac.in';
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
