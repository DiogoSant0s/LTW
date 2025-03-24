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
    echo '<main>';
    if ($article) {
        output_full_article($article, $comments);
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] === $article['username']) {
                echo '<section class="article-edit">';
                echo '<a href="edit_article.php?id=' . htmlspecialchars($article['id']) . '">Edit Article</a>';
                echo '<form action="../actions/action_delete_article.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="' . htmlspecialchars($article['id']) . '">
                        <button type="submit">Delete Article</button>
                    </form>';
                echo '</section>';
            }
            echo '<section class="comments-create">';
            echo '<h2>Add a Comment</h2>';
            echo '<form action="../actions/action_insert_comment.php" method="post">
                    <input type="hidden" name="news_id" value="' . htmlspecialchars($article['id']) . '">
                    <textarea name="text" required></textarea><br>
                    <button type="submit">Submit</button>
                  </form>';
            echo '</section>';
        }
    } else {
        echo "<p>Article not found.</p>";
    }
    echo '</main>';
    output_footer();
?>