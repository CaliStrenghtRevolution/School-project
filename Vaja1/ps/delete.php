<?php
    include("config.php");
    session_start();
    $error = "";

    if (isset($_POST["delete_id"]) && !empty($_POST["delete_id"])) {
        $delete_id = $_POST["delete_id"];      
        $sql = "DELETE FROM ps WHERE id = ?";     
        $db = mysqli_connect(Localhost, Username, Password, Name);
        if (!$db) {
            die("Connection error: " . mysqli_connect_error());
        }    
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $delete_id);
        if ($stmt->execute()) {

        } else {

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
    header('Location: '.$uri.'/Vaja1/ps/');
    exit;
?>