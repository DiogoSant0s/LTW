<?php
function getDatabaseConnection() {
    $db = new PDO('sqlite:' . __DIR__ . '/../database/news.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NAMED);
    return $db;
}
?>