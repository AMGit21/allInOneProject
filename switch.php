<?php
if (isset($_POST['submit'])) {

    $userName = $_POST['userName'];
    $pass = $_POST['pass'];

    if (!empty($userName) && !empty($pass)) {
        require_once('./Database/createTableLoginUsers.php');

        $stmt = $conn->prepare("SELECT userName, roles 
                 FROM loginusers 
                 WHERE userName = ? AND pass = ?");
        $stmt->bind_param("ss", $userName, $pass);

        // set parameters and execute
        $userName = $_POST['userName'];
        $pass = $_POST['pass'];
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION["userName"] = $row['userName'];
            $_SESSION["roles"] = $row['roles'];

            $row['roles'] === 1 ?
                header("Location: ./admin/index.php") :
                header("Location: ./user/index.php");
        } else {
            echo "the user name doesn't exist";
            // header("Location: ./index.php");
        }
        $conn->close();
    } else {
        echo "please enter the data";
        header("Location: ./index.php");
    }
}
