<?php
    function getAllNews($db) {
        $stmt = $db->prepare('SELECT news.*, users.name, COUNT(comments.id) AS comments 
            FROM news JOIN users USING (username) LEFT JOIN comments ON comments.news_id = news.id 
            GROUP BY news.id, users.username 
            ORDER BY published DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getArticleById($db, $id) {
        $stmt = $db->prepare('SELECT news.*, users.name FROM news JOIN users USING (username) WHERE news.id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function updateArticle($db, $id, $title, $introduction, $fulltext) {
        $stmt = $db->prepare('UPDATE news SET title = ?, introduction = ?, fulltext = ? WHERE id = ?');
        $stmt->execute(array($title, $introduction, $fulltext, $id));
    }
?>