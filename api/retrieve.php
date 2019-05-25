<?php

require_once './api.config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    retrieve_image($id);
}

function retrieve_image($id) {
    global $db_connection;
    $db = new PDO("mysql:host={$db_connection['host']};dbname={$db_connection['dbname']}", $db_connection['username'], $db_connection['password']);

    $stmt = $db->prepare('select image_type, image_data from images where image_id=?;');
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $result = $stmt->fetch();
    header("Content-type: {$result['image_type']}");
    echo $result['image_data'];
}