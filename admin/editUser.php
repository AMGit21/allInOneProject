<?php
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));

    $userName = trim($json->userName);
    $pass = trim($json->pass);
    $roles = trim($json->roles);
    $id = trim($json->id);
    $data = [];
    if (!empty($userName) && !empty($pass) && !empty($roles)) {
        require_once('../Database/createTableLoginUsers.php');

        $sql = "UPDATE loginUsers 
            set userName = '$userName',
            pass = '$pass',
            roles = '$roles' WHERE id = '$id'";
        if ($result = $conn->query($sql)) {
            $msg = "updated successfully";
        } else
            $msg = "Error: " . $sql . "<br>" . $conn->error;
    } else
        $msg = "this person doesn't exist";

    $conn->close();
} else
    $msg = "please enter the data";

$data["message"] = $msg;
echo json_encode($data);
