<?php
    // Connect to the database
    $db = new PDO('sqlite:news.db');
  
    echo '<h1><a href="index.php">Main Page</a></h1>';

    // Prepare and execute the statement to fetch the article
    $stmt = $db->prepare('SELECT news.*, users.name FROM news JOIN users USING (username) WHERE news.id = ?');
    $stmt->execute(array($_GET['id']));
    $article = $stmt->fetch();

    // Check if the article exists
    if ($article) {
        echo "<h1>" . htmlspecialchars($article['title']) . "</h1>";
        echo "<p>By " . htmlspecialchars($article['name']) . " on " . date('F j', $article['published']) . "</p>";
        echo "<p>" . htmlspecialchars($article['introduction']) . "</p>";
        echo "<p>" . htmlspecialchars($article['fulltext']) . "</p>";

        // Prepare and execute the statement to fetch the comments
        $stmt = $db->prepare('SELECT comments.*, users.name FROM comments JOIN users ON comments.username = users.username WHERE news_id = ?');
        $stmt->execute(array($_GET['id']));
        $comments = $stmt->fetchAll();

        // Display the comments
        if ($comments) {
            echo "<h2>Comments</h2>";
            foreach ($comments as $comment) {
                echo "<p><strong>" . htmlspecialchars($comment['name']) . ":</strong> " . htmlspecialchars($comment['text']) . "</p>";
            }
        } else {
            echo "<p>No comments yet.</p>";
        }
    } else {
        echo "<p>Article not found.</p>";
    }
?>