<?php
    function output_header() { ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>News Website</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../styles/style.css">
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
        <aside>
            <p>Welcome to the news website!</p>
        </aside>
    <?php }
    function output_simple_header() { ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>News Website</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../styles/style.css">
        </head>
        <body>
        <header>
            <h1>News Website</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>
        </header>
    <?php }
    function output_footer() { ?>
        </body>
        </html>
    <?php } 
?>