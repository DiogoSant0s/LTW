<?php
    require_once('../database/connection.php');
    require_once('../database/news.php');

    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../pages/index.php');
        exit();
    }

    $db = getDatabaseConnection();

    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $fulltext = $_POST['fulltext'];
    $username = $_SESSION['username'];

    insertArticle($db, $title, $introduction, $fulltext, $username);

    header('Location: ../pages/index.php');
    exit();
?>