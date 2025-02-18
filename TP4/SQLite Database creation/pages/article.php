<?php
    session_start();
    require_once('../database/connection.php');
    require_once('../database/news.php');
    require_once('../database/comments.php');

    require_once('../templates/common.php');
    require_once('../templates/news.php');

    $db = getDatabaseConnection();
    $article = getArticleById($db, $_GET['id']);
    $comments = getCommentsByNewsId($db, $_GET['id']);

    output_header();
    if ($article) {
        output_full_article($article, $comments);
        if (isset($_SESSION['username'])) {
            echo '<a href="edit_article.php?id=' . htmlspecialchars($article['id']) . '">Edit Article</a>';
        }
    } else {
        echo "<p>Article not found.</p>";
    }
    output_footer();
?>