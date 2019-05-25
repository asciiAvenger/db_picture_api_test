<?php

// importing the database config
require_once './api/api.config.php';

// function for inserting records into the "images"-table
function insert_image($name, $type, $image_data) {
    // connecting to the predefined database using our credentials from the "api.config.php" file
    global $db_connection;
    $db = new PDO("mysql:host={$db_connection['host']};dbname={$db_connection['dbname']}", $db_connection['username'], $db_connection['password']);

    // inserting the given record
    // each record has: image_id, image_name, image_type and image_data
    // image_id is null here because it is defined as auto-incrementing attribute
    $stmt = $db->prepare('insert into images values (null, ?, ?, ?);');
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $type);
    $stmt->bindValue(3, $image_data);
    $stmt->execute();
}