<?php
    include("../config.php");
    session_start();
    $error = "";

    if (isset($_POST["change_id"]) && !empty($_POST["change_id"])) {
        $change_id = $_POST["change_id"];
        $change = sha1($_POST["change"]);
        $sql = "UPDATE student SET password = ? WHERE id = ?";
        $db = mysqli_connect(Localhost, Username, Password, Name);
        if (!$db) {
            die("Connection error: " . mysqli_connect_error());
        }
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $change, $change_id);
        if ($stmt->execute())
        {
            
        }
        $stmt->close();
        $db->close();
    }

    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']))
    {
        $uri = 'https://';
    }
    else
    {
        $uri = 'http://';
    }

    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: '.$uri.'/Vaja1/students/');
    exit;
?>