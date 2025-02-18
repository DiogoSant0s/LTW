<?php
    require_once('../database/connection.php');
    require_once('../database/users.php');

    $db = getDatabaseConnection();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    session_start();
    if (userExists($db, $username, $password)) {
        $_SESSION['error'] = 'Username already exists';
        header('Location: ../pages/signup.php');
        exit();
    }

    createUser($db, $username, $password, $name);
    $_SESSION['username'] = $username;

    header('Location: ../pages/index.php');
    exit();
?>