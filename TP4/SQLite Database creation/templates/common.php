<?php
    function output_header() { ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>News Website</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../styles/style.css">
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
            <script src="../scripts/notification.js"></script>
            <script src="../scripts/auto_resize.js"></script>
        </head>
        <body>
        <header>
            <h1>News Website</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="../actions/action_logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>
    <?php }
    function output_footer() { ?>
        <footer>
            <div class="footer-container">
                <div class="footer-content">
                    <div class="footer-text">
                        <p>&copy; <?php echo date("Y"); ?> Your News Website. All rights reserved.</p>
                    </div>
                    <div class="footer-social">
                        <a href="https://www.facebook.com" target="_blank" class="social-link">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                        <a href="https://www.twitter.com" target="_blank" class="social-link">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://www.instagram.com" target="_blank" class="social-link">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                    <div class="footer-links">
                        <a href="#privacy-policy" class="footer-link">Privacy Policy</a>
                        <a href="#terms-of-service" class="footer-link">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For FontAwesome Icons -->
        </body>
        </html>
    <?php }
?>