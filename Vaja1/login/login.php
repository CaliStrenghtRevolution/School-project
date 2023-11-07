<?php
    include("../config.php");
    session_start();
    $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $db = mysqli_connect(Localhost,Username,Password,Name);
        if (!$db)
        {
            die("Connection error: " . mysqli_connect_error());
        }
        $username = $_POST["Username"];
        $password = sha1($_POST["Password"]);
        $SQL1 = "SELECT * FROM student WHERE username = ? AND password = ?";
        $querry = $db -> prepare($SQL1);
        $querry -> bind_param("ss",$username,$password);
        $querry -> execute();
        $result = $querry -> get_result();
        if(mysqli_num_rows($result) != 0)
        {
            $user = $result->fetch_assoc();

            $_SESSION["Authority"] = $user['authority'];
            $_SESSION["Name"] = $user['name'];
            $_SESSION["Surname"] = $user['surname'];
            $_SESSION["Username"] = $user['username'];
            $_SESSION["Year"] = $user['year'];
            $_SESSION["Path"] = $user['path'];
            $_SESSION["id"] = $user['id'];
            $db -> close();
        }
        else
        {
            $db = mysqli_connect(Localhost,Username,Password,Name);
            if (!$db)
            {
                die("Connection error: " . mysqli_connect_error());
            }
            $username = $_POST["Username"];
            $password = sha1($_POST["Password"]);
            $SQL1 = "SELECT * FROM professor WHERE username = ? AND password = ?";
            $querry = $db -> prepare($SQL1);
            $querry -> bind_param("ss",$username,$password);
            $querry -> execute();
            $result = $querry -> get_result();
            if(mysqli_num_rows($result) != 0)
            {
                $user = $result->fetch_assoc();

                $_SESSION["Authority"] = $user['authority'];
                $_SESSION["Name"] = $user['name'];
                $_SESSION["Surname"] = $user['surname'];
                $_SESSION["Username"] = $user['username'];
                $_SESSION["id"] = $user['id'];
                $_SESSION["Year"] = Null;
                $_SESSION["Path"] = Null;
                $db -> close();
            }
            else
            {
                $_SESSION["Authority"] = Null;

                if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']))
                {
                    $uri = 'https://';
                }
                else
                {
                    $uri = 'http://';
                }

                $uri .= $_SERVER['HTTP_HOST'];
                header('Location: '.$uri.'/Vaja1/login');
                exit;
            }   
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
    header('Location: '.$uri.'/Vaja1/home');
    exit;
?>