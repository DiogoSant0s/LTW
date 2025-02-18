<?php
    require_once('../database/connection.php');
    require_once('../database/news.php');

    require_once('../templates/common.php');
    require_once('../templates/news.php');

    session_start();
    $db = getDatabaseConnection();
    $articles = getAllNews($db);

    output_header();
    if (isset($_SESSION['message'])) {
        echo '<p style="color: green;">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
    }
    output_article_list($articles);
    output_footer();
?>