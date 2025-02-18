<?php
    require_once('../database/connection.php');
    require_once('../database/comments.php');

    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../pages/index.php');
        exit();
    }

    $db = getDatabaseConnection();

    $news_id = $_POST['news_id'];
    $text = $_POST['text'];
    $username = $_SESSION['username'];

    insertComment($db, $news_id, $username, $text);

    header("Location: ../pages/article.php?id=$news_id");
    exit();
    ?>