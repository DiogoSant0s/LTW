<?php
    require_once('../templates/common.php');

    session_start();
    if (isset($_SESSION['username'])) {
        $_SESSION['message'] = 'You are already signed in.';
        $_SESSION['message_type'] = 'success';
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php output_header(); ?>
        <main>
            <h1 class="forms">Login</h1>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="notification ' . htmlspecialchars('error') . '">' . htmlspecialchars($_SESSION['error']) . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <form class="forms" action="../actions/action_login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <button type="submit">Login</button>
            </form>
            <p class="forms">Don't have an account? <a href="signup.php">Sign up</a></p>
        </main>
        <?php output_footer(); ?>
    </body>
</html>