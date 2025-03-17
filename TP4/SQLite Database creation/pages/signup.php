<?php
    require_once('../templates/common.php');

    session_start();
    if (isset($_SESSION['username'])) {
        $_SESSION['message'] = 'You are already signed in.';
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
    </head>
    <body>
        <?php output_simple_header(); ?>
        <h1 class="forms">Sign Up</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        ?>
        <form class="forms" action="../actions/action_signup.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <button type="submit">Sign Up</button>
        </form>
        <p class="forms">Already have an account? <a href="login.php">Sign in</a></p>
        <?php output_footer(); ?>
    </body>
</html>