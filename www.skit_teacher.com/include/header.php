<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKIT- Faculty Area</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.svg">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Base styles for header */
        .header {
            background-color: #ffffff;
            padding: 20px 0;
        }

        .header__wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header__logo img {
            max-width: 100%;
            height: auto;
        }

        .header h2,
        .header h3,
        .header h5 {
            margin: 0;
            text-align: center;
        }

        .header h2 {
            font-size: 40px;
            word-spacing: 10px;
        }

        .header h3 {
            font-size: 24px;
        }

        .header h5 {
            font-size: 12px;
        }

        .header a {
            text-decoration: none;
            color: black;
            margin: 0 10px;
            font-size: 14px;
        }

        .header a:hover {
            color: #007bff;
        }

        /* Media query for desktops (1200px and above) */
        @media (min-width: 1200px) {
            .header h2 {
                font-size: 40px;
            }

            .header h3 {
                font-size: 24px;
            }

            .header__logo img {
                width: 7vw;
            }
        }

        /* Media query for tablets (768px - 480px) */
        @media (max-width: 1200px) and (min-width: 768px) {
            .header__wrapper {
                flex-direction: column;
                text-align: center;
            }

            .header h2 {
                font-size: 32px;
            }

            .header h3 {
                font-size: 20px;
            }

            .header h5 {
                font-size: 10px;
            }

            .header a {
                font-size: 12px;
                margin: 5px 10px;
            }

            .header__logo img {
                width: 20%;
                margin-bottom: 10px;
            }
        }

        /* Media query for mobile devices (480px - 320px) */
        @media (max-width: 768px) and (min-width: 480px) {
            .header__wrapper {
                flex-direction: column;
                padding: 10px;
            }

            .header h2 {
                font-size: 28px;
            }

            .header h3 {
                font-size: 18px;
            }

            .header h5 {
                font-size: 9px;
            }

            .header__logo img {
                width: 40%;
                margin-bottom: 10px;
            }

            .header a {
                font-size: 12px;
                display: inline-block;
                margin: 5px 5px;
            }
        }

        /* Media query for small mobile devices (320px and below) */
        @media (max-width: 480px) {
            .header__wrapper {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .header h2 {
                font-size: 24px;
            }

            .header h3 {
                font-size: 16px;
            }

            .header h5 {
                font-size: 8px;
            }

            .header__logo img {
                width: 50%;
                margin-bottom: 10px;
            }

            .header a {
                font-size: 10px;
                display: block;
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>
    <!-- header area start -->
    <header class="header v__5 header__sticky">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="header__wrapper">
                        <!-- Logo on the left -->
                        <div class="header__logo">
                            <a href="index.html" class="header__logo--link">
                                <img src="assets/images/logoooo.png" alt="unipix">
                            </a>
                        </div>
                        <!-- Centered content -->
                        <div>
                            <h2>Swami Keshvanand Institute Of Technology</h2>
                            <h3>Management & Gramothan, Jaipur</h3>
                            <h5>(An Autonomous Institute Affiliated to Rajasthan Technical University, Kota)</h5>
                        </div>
                        <!-- Links on the right -->
                        <div>
                            <a href="Our_teams.php">Our Team</a>
                            <a href="home.php">Home</a>
                            <a href="aboutus.php">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
</body>
