<?php

echo '<style>
    /* Footer Styling */
    footer {
        background-color: #212529;
        color: white;
        padding: 20px 0;
        font-size: 14px;
    }

    .footer-container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    .footer-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .footer-content {
        flex: 1;
        padding: 15px;
    }

    h6 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    p {
        margin: 5px 0;
        line-height: 1.6;
    }

    .footer-links a {
        color: white;
        text-decoration: none;
        display: block;
        margin: 5px 0;
    }

    .social-icons a {
        color: white;
        margin: 0 10px;
        font-size: 18px;
    }

    .copyright {
        text-align: center;
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .footer-section {
            flex-direction: column;
            text-align: center;
        }

        .footer-content {
            padding: 10px 0;
        }
    }
</style>';
?>

<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <!-- Business Info -->
            <div class="footer-content">
                <h6><i class="fas fa-gem"></i> Padi's Kitchen Delight</h6>
                <p>Best Catering Service</p>
                <p>Email: Padi's@gmail.com</p>
                <p>Location: Mpumalanga, Middleburg</p>
                <p>Phone: 080 000 0000</p>
            </div>

            <!-- Social Media Links -->
            <div class="footer-content footer-links">
                <h6>Social Media</h6>
                <a href="https://www.facebook.com/">Facebook</a>
                <a href="https://www.x.com/">Twitter</a>
                <a href="https://www.instagram.com/">Instagram</a>
                <a href="https://www.tiktok.com/">Tiktok</a>
            </div>

            <!-- Developer Contact -->
            <div class="footer-content">
                <h6>Contact Web Developer</h6>
                <p><i class="fas fa-home"></i> Kempton Park, Ekurhuleni</p>
                <p><i class="fas fa-envelope"></i> AyandaMthombeni13@gmail.com</p>
                <p><i class="fas fa-phone"></i>068 176 7792</p>
            </div>
        </div>

        <!-- Social Media Icons -->
        <div class="text-center">
            <a href="#" class="social-icons"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icons"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icons"><i class="fab fa-google"></i></a>
            <a href="#" class="social-icons"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icons"><i class="fab fa-linkedin"></i></a>
            <a href="#" class="social-icons"><i class="fab fa-github"></i></a>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            <p>Copyright &copy; Superb Software Developers</p>
        </div>
    </div>
</footer>
