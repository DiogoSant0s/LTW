<?php
    function getCommentsByNewsId($db, $newsId) {
        $stmt = $db->prepare('SELECT comments.*, users.name FROM comments JOIN users ON comments.username = users.username WHERE news_id = ?');
        $stmt->execute(array($newsId));
        return $stmt->fetchAll();
    }
    function insertComment($db, $newsId, $username, $text) {
        $stmt = $db->prepare('INSERT INTO comments (news_id, username, text) VALUES (?, ?, ?)');
        $stmt->execute(array($newsId, $username, $text));
    }
    function deleteCommentsByNewsId($db, $newsId) {
        $stmt = $db->prepare('DELETE FROM comments WHERE news_id = ?');
        $stmt->execute(array($newsId));
    }
?>