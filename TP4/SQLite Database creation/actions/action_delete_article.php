<?php
    require_once('../database/connection.php');
    require_once('../database/news.php');
    require_once('../database/comments.php');
    
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../pages/index.php');
        exit();
    }

    $db = getDatabaseConnection();

    $id = $_POST['id'];

    deleteCommentsByNewsId($db, $id);
    deleteArticle($db, $id);

    header('Location: ../pages/index.php');
    exit();
?>