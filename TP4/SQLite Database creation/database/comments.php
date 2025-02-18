<?php
    function getCommentsByNewsId($db, $newsId) {
        $stmt = $db->prepare('SELECT comments.*, users.name FROM comments JOIN users ON comments.username = users.username WHERE news_id = ?');
        $stmt->execute(array($newsId));
        return $stmt->fetchAll();
    }
?>