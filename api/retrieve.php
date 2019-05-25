<?php

// importing the database config
require_once './api.config.php';

// checking if an id has been provided through GET-variable
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    retrieve_image($id);
}

// function for retrieving a single image and its type and displaying it fullscreen
function retrieve_image($id) {
    // connecting to the predefined database using our credentials from the "api.config.php" file
    global $db_connection;
    $db = new PDO("mysql:host={$db_connection['host']};dbname={$db_connection['dbname']}", $db_connection['username'], $db_connection['password']);

    // retrieving image_type and image_data of the one record with the given image_id
    $stmt = $db->prepare('select image_type, image_data from images where image_id=?;');
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $result = $stmt->fetch();

    // setting the header for the retrieved image_type and displaying the image
    header("Content-type: {$result['image_type']}");
    echo $result['image_data'];
}