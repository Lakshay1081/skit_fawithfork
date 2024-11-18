<?php
include('include/header.php');
?>

    <!-- Main Content -->
    <section class="team">
        <div class="team-card">
            <div class="card-content">
                <h2>John Doe</h2>
                <p>Senior Developer</p>
                <p>2024</p>
            </div>
            <div class="card-image">
                <img class="team-image" src="C:\Users\DELL\OneDrive\Pictures\Camera Roll\WIN_20221203_22_12_36_Pro.jpg" alt="John Doe">
            </div>
            <div class="social-links">
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </div>
        </div>

        <div class="team-card">
            <div class="card-content">
                <h2>John Doe</h2>
                <p>Senior Developer</p>
                <p>2024</p>
            </div>
            <div class="card-image">
                <img class="team-image" src="C:\Users\DELL\OneDrive\Pictures\Camera Roll\WIN_20221203_22_12_36_Pro.jpg" alt="John Doe">
            </div>
            <div class="social-links">
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </div>
        </div>

        <div class="team-card">
            <div class="card-content">
                <h2>Jane Smith</h2>
                <p>Project Manager</p>
                <p>2025</p>
            </div>
            <div class="card-image">
                <img class="team-image" src="https://via.placeholder.com/250" alt="Jane Smith">
            </div>
            <div class="social-links">
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </div>
        </div>

        <!-- Add more cards here as needed -->
    </section>

   <?php
include('include/footer.php');
?>

<style>
/* General reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body and text */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

/* Header styles */
header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header nav h1 {
    margin: 0;
    font-size: 2rem;
}

/* Team section */
.team {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    padding: 40px;
}

/* Team card styles */
.team-card {
    position: relative;
    width: 250px;
    height: 350px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Card content (Name, Position, Year) */
.card-content {
    padding: 15px;
    position: absolute;
    width: 100%;
    bottom: 20px;
    color: #fff;
    z-index: 1;
}

.card-content h2 {
    font-size: 1.5rem;
    color: #333;
}

.card-content p {
    color: #777;
    font-size: 1rem;
}

/* Card image styles */
.card-image {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.team-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease; /* Smooth zoom effect */
}

/* Hover effects */
.team-card:hover .team-image {
    transform: scale(1.1); /* Zooms the image slightly */
}

/* Social Links */
.social-links {
    position: absolute;
    bottom: 10px;
    width: 100%;
    opacity: 0;
    transition: opacity 0.3s ease;
    text-align: center;
}

.team-card:hover .social-links {
    opacity: 1;
}

.social-links a {
    color: #333;
    font-size: 1.5rem;
    margin: 0 10px;
    text-decoration: none;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #0077b5; /* LinkedIn Blue */
}

.social-links .insta:hover {
    color: #C13584; /* Instagram Purple */
}

/* Footer styles */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
    position: fixed;
    width: 100%;
    bottom: 0;
}

footer p {
    margin: 0;
}

</style>

