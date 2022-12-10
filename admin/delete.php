<?php

require_once('../Database/createTableLoginUsers.php');
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));

    $id = trim($json->id);

    $stmt = $conn->prepare("DELETE FROM loginusers WHERE id = ?");

    $stmt->bind_param("i", $id);

    // set parameters and execute
    $id = trim($json->id);

    if ($stmt->execute()) {
        echo json_encode("deleted");
    } else {
        echo json_encode("could not delete from database");
    }
}
