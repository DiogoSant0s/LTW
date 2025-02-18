<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
        exit();
    }

    require_once('../database/connection.php');
    require_once('../database/news.php');

    $db = getDatabaseConnection();
    $article = getArticleById($db, $_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
</head>
<body>
    <h1>Edit Article</h1>
    <form action="../actions/action_edit_news.php" method="post">
        <input type="hidden" name="id" value="<?=htmlspecialchars($article['id'])?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?=htmlspecialchars($article['title'])?>" required><br>
        <label for="introduction">Introduction:</label>
        <textarea id="introduction" name="introduction" required><?=htmlspecialchars($article['introduction'])?></textarea><br>
        <label for="fulltext">Full Text:</label>
        <textarea id="fulltext" name="fulltext" required><?=htmlspecialchars($article['fulltext'])?></textarea><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>