<style>
/* Default styles for larger screens (Desktop 1200px+) */
.footer {
  background: var(--footer-bg);
  padding-top: 30px;
}

.footer__widget--logo img {
  max-width: 150px;
}

.footer__widget--description {
  font-size: 18px;
  color: #666;
  text-align: center;
}

.social {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  gap: 20px;
}

.social__link a {
  font-size: 30px;
  transition: color 0.3s ease;
}

.social__link a:hover {
  color: #007bff;
}

.copyright {
  border-top: 1px solid var(--copyright-border);
  background: var(--footer-bg);
}

.copyright__wrapper {
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.copyright__wrapper p a {
  color: var(--rt-primary-1);
}

/* Tablet (768px - 480px) */
@media (max-width: 768px) and (min-width: 480px) {
  .footer {
    padding: 20px 10px;
  }

  .footer__widget--logo-container,
  .footer__widget--description-container {
    flex: 1 1 auto;
  }

  .footer__widget--logo img {
    max-width: 100px;
  }

  .footer__widget--description {
    font-size: 14px;
    text-align: right;
    padding-left: 10px;
  }

  .footer .row {
    flex-wrap: nowrap;
    align-items: center;
    justify-content: space-between;
  }

  .social__link a {
  color: #666; /* Visible default color */
  font-size: 30px;
  text-decoration: none;
  transition: color 0.3s ease;
}

.social__link a:hover {
  color: #007bff; /* Hover effect */
}

}

/* Small Mobile (≤320px) */
@media (max-width: 480px) {
  .footer {
    padding: 15px 5px;
  }

  .footer__widget--logo img {
    max-width: 80px;
  }

  .footer__widget--description {
    font-size: 12px;
    text-align: right;
    padding-left: 5px;
  }

  .footer .row {
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }

  .social {
    gap: 10px;
  }

  .social__link a {
    font-size: 18px;
  }

  .copyright__wrapper {
    font-size: 12px;
    padding: 10px 0;
  }
}


</style>
<footer class="footer v__1">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section -->
            <div class="col-lg-4 col-md-4 col-sm-3 d-flex justify-content-start footer__widget--logo-container">
                <div class="footer__widget--logo">
                    <a href="index-2.html">
                        <img src="assets/images/logoooo.png" alt="logo">
                    </a>
                </div>
            </div>

            <!-- Text Section -->
            <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-center footer__widget--description-container">
                <p class="footer__widget--description text-center">
                    We are passionate about education and dedicated to providing high-quality resources for learners of all backgrounds.
                </p>
            </div>

            <!-- Social Media Section -->
            <div class="col-lg-4 col-md-4 col-sm-3 d-flex justify-content-end footer__widget--social-container">
                <ul class="footer__widget--social social">
                    <li class="social__link">
                        <a href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2FSKITJAIP%2F"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="social__link">
                        <a href="https://www.instagram.com/skitjaipurofficial/?hl=en"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li class="social__link">
                        <a href="https://in.linkedin.com/school/skit-jaipur/"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li class="social__link">
                        <a href="https://www.youtube.com/@SKITJaipurOfficial"><i class="fa fa-youtube"></i></a>
                    </li>
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

