<?php

require_once './api/api.config.php';

function insert_image($name, $type, $image_data) {
    global $db_connection;
    $db = new PDO("mysql:host={$db_connection['host']};dbname={$db_connection['dbname']}", $db_connection['username'], $db_connection['password']);

    $stmt = $db->prepare('insert into images values (null, ?, ?, ?);');
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $type);
    $stmt->bindValue(3, $image_data);
    $stmt->execute();
}