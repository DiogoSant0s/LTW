<?php
    function userExists($db, $username, $password) {
        $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $stmt->execute(array($username, $password));
        return $stmt->fetch() !== false;
    }
    function createUser($db, $username, $password, $name) {
        $stmt = $db->prepare('INSERT INTO users (username, password, name) VALUES (?, ?, ?)');
        $stmt->execute(array($username, $password, $name));
    }
?>