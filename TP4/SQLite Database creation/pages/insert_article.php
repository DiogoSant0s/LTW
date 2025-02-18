<?php
    require_once('../templates/common.php');
    
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insert Article</title>
</head>
<body>
    <?php output_header(); ?>
    <h1>Insert Article</h1>
    <form action="../actions/action_insert_article.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="introduction">Introduction:</label>
        <textarea id="introduction" name="introduction" required></textarea><br>
        <label for="fulltext">Full Text:</label>
        <textarea id="fulltext" name="fulltext" required></textarea><br>
        <button type="submit">Submit</button>
    </form>
    <?php output_footer(); ?>
</body>
</html>