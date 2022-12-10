<?php
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));
    // echo json_encode($json->roles);

    $userName = trim($json->userName);
    $pass = trim($json->pass);
    $roles = trim($json->roles);
    $data = [];
    if (!empty($userName) && !empty($pass) && !empty($roles)) {
        require_once('../Database/createTableLoginUsers.php');

        $sql = "SELECT *
            FROM loginusers 
            WHERE userName = '$userName' 
            AND pass = '$pass'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO loginusers (userName, pass, roles) 
            VALUES ('$userName', '$pass', '$roles')";

            if ($conn->query($sql) === TRUE) {
                $msg = "New record created successfully";
                // $data = ["first_name"=>$fn, "last_name"=>$ln];
                // array_push($data, $fn, $ln, $msg);
                $data["userName"] = $userName;
                $data["pass"] = $pass;
                $data["roles"] = $roles;
            } else
                $msg = "Error: " . $sql . "<br>" . $conn->error;
        } else
            $msg = "this person exist";

        $conn->close();
    } else
        $msg = "please enter the data";

    $data["message"] = $msg;
    echo json_encode($data); // $data=[first_name=>$fn,last_name=>$ln,$message=>$msg]
}
