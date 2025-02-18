<?php
session_start();
if (isset($_SESSION['username'])) {
    $_SESSION['message'] = 'You are already signed in.';
    header('Location: index.php');
    exit();
}

require_once('../templates/common.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php output_simple_header(); ?>
    <h1>Login</h1>
    <?php
    if (isset($_SESSION['error'])) {
        echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    ?>
    <form action="../actions/action_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    <?php output_footer(); ?>
</body>
</html>