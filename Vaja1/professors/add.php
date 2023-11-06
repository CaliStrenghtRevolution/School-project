<?php
    include_once("../config.php");
    session_start();
    $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $db = mysqli_connect(Localhost,Username,Password,Name);
        $name = $_POST["Name"];
        $surname = $_POST["Surname"];
        $username = $_POST["Username"];
        $password = sha1($_POST["Password"]);
        $SQL = "SELECT name FROM professor WHERE Username = ? OR Name = ?";
        $querry = $db -> prepare($SQL);
        $querry -> bind_param("ss",$username,$name);
        $querry -> execute();
        $result = $querry -> get_result();
        if(mysqli_num_rows($result) == 0)
        {
            //upon account not existing
            $SQL = "INSERT INTO professor(Name, Surname, Username, Password) VALUES (?, ?, ?, ?)";
            $querry = $db -> prepare($SQL);
            $querry -> bind_param("ssss",$name,$surname,$username,$password);
            $querry -> execute();
            $db -> close();
        }
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
    header('Location: '.$uri.'/Vaja1/professors');
    exit;
?>