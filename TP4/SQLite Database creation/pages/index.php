<?php
    require_once('../database/connection.php');
    require_once('../database/news.php');

    require_once('../templates/common.php');
    require_once('../templates/news.php');

    session_start();
    $db = getDatabaseConnection();
    $articles = getAllNews($db);

    output_header();
    echo '<aside><p>Welcome to the news website!</p></aside>';
    echo '<main>';
    if (isset($_SESSION['message'])) {
        echo '<div class="notification ' . htmlspecialchars($_SESSION['message_type']) . '">' . htmlspecialchars($_SESSION['message']) . '</div>';
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    if (isset($_SESSION['username'])) {
        echo '<a href="insert_article.php" class="new-article">Create a new article</a>';
    }
    output_article_list($articles);
    echo '</main>';
    output_footer();
?>