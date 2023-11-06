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
        $year = $_POST["Year"];
        $path = $_POST["Path"];
        $SQL = "SELECT name FROM student WHERE Username = ? OR Name = ?";
        $querry = $db -> prepare($SQL);
        $querry -> bind_param("ss",$username,$name);
        $querry -> execute();
        $result = $querry -> get_result();
        if(mysqli_num_rows($result) == 0)
        {
            //upon account not existing
            $SQL = "INSERT INTO student(Name, Surname, Username, Password, Year, Path) VALUES (?, ?, ?, ?, ?, ?)";
            $querry = $db -> prepare($SQL);
            $querry -> bind_param("ssssss",$name,$surname,$username,$password,$year,$path);
            $querry -> execute();
            $db -> close();
        }
        else
        {
            $_SESSION["Authority"] = Null;
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
    header('Location: '.$uri.'/Vaja1/students');
    exit;
?>