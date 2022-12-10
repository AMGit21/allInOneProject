<?php

class user
{
    public $id;
    public $userName;
    public $pass;
    public $roles;
}

require_once('../Database/createTableLoginUsers.php');
$sql = "SELECT id, userName, pass, roles FROM loginusers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = [];
    // output data of each row
    for ($i = 0; $row = $result->fetch_assoc(); $i++) {
        $user = new user();
        $user->id = $row['id'];
        $user->userName = $row['userName'];
        $user->pass = $row['pass'];
        $user->roles = $row['roles'];
        array_push($data, $user);
    }
}
// $data["sub_count"] = $result->num_rows;
// $conn->close();
echo json_encode($data);
