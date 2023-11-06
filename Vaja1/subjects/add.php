<?php
    include_once("../config.php");
    session_start();
    $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $db = mysqli_connect(Localhost,Username,Password,Name);
        $name = $_POST["Name"];
        $path = $_POST["Path"];
        $year = $_POST["Year"];
        $SQL = "SELECT name FROM subject WHERE Name = ?";
        $querry = $db -> prepare($SQL);
        $querry -> bind_param("s",$name);
        $querry -> execute();
        $result = $querry -> get_result();
        if(mysqli_num_rows($result) == 0)
        {
            //upon account not existing
            $SQL = "INSERT INTO subject(Name, Path, Year) VALUES (?, ?, ?)";
            $querry = $db -> prepare($SQL);
            $querry -> bind_param("sss",$name,$path,$year);
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
    header('Location: '.$uri.'/Vaja1/subjects');
    exit;
?>