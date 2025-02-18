<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../pages/index.php');
        exit();
    }

    require_once('../database/connection.php');
    require_once('../database/news.php');

    $db = getDatabaseConnection();

    $id = $_POST['id'];
    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $fulltext = $_POST['fulltext'];

    updateArticle($db, $id, $title, $introduction, $fulltext);

    header("Location: ../pages/article.php?id=$id");
    exit();
?>