<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>News</title>
        <meta charset="utf-8">
    </head>
</html>
<?php
    $db = new PDO('sqlite:news.db');

    $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments 
        FROM  news JOIN 
              users USING (username) LEFT JOIN 
              comments ON comments.news_id = news.id
        GROUP BY news.id, users.username 
        ORDER BY published DESC');
    $stmt->execute();
    $articles = $stmt->fetchAll();

    echo '<h1>Latest News</h1>';

    foreach($articles as $article) {
        echo '<h1><a href="article.php?id=' . $article['id'] . '">' . htmlspecialchars($article['title']) . '</a></h1>';
        echo '<p>' . htmlspecialchars($article['introduction']) . '</p>';
        echo '<p>' . htmlspecialchars($article['fulltext']) . '</p>';
        $tags = explode(',', $article['tags']);
        echo '<p>Tags: ';
        foreach($tags as $tag) {
          echo '<a href="index.php?tag=' . htmlspecialchars($tag) . '">' . htmlspecialchars($tag) . '</a> ';
        }
        echo '<p>Published by ' . htmlspecialchars($article['username']) . ' on ' . date('F j', $article['published']) . '</p>';
        echo '<p>Comments: ' . htmlspecialchars($article['comments']) . '</p>';
    }
?>