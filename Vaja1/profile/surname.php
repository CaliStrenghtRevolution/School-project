<?php
    include("../config.php");
    session_start();
    $error = "";

    if(isset($_SESSION["Authority"])) 
    {
        if($_SESSION["Authority"] == 2) 
        {
            if (isset($_POST["Surname"]) && !empty($_POST["Surname"]))
            {
                $change_id = $_SESSION["id"];
                $change = ($_POST["Surname"]);
                $sql = "UPDATE student SET surname = ? WHERE id = $change_id";
                $db = mysqli_connect(Localhost, Username, Password, Name);
                if (!$db) {
                    die("Connection error: " . mysqli_connect_error());
                }
                $stmt = $db->prepare($sql);
                $stmt->bind_param("s", $change);
                if ($stmt->execute())
                {
                    
                }
                    $stmt->close();
        
                    $SQL1 = "SELECT * FROM student WHERE id = ".$_SESSION["id"]."";
                    $querry = $db -> prepare($SQL1);
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
                        $_SESSION["Year"] = $user['year'];
                        $_SESSION["Path"] = $user['path'];
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
                        header('Location: '.$uri.'/Vaja1/profile');
                        exit;
                    }   
            }
        }
        else
        {
            if (isset($_POST["Surname"]) && !empty($_POST["Surname"]))
            {
                $change_id = $_SESSION["id"];
                $change = ($_POST["Surname"]);
                $sql = "UPDATE professor SET surname = ? WHERE id = $change_id";
                $db = mysqli_connect(Localhost, Username, Password, Name);
                if (!$db) {
                    die("Connection error: " . mysqli_connect_error());
                }
                $stmt = $db->prepare($sql);
                $stmt->bind_param("s", $change);
                if ($stmt->execute())
                {
                    
                }
                    $stmt->close();
        
                    $SQL1 = "SELECT * FROM professor WHERE id = ".$_SESSION["id"]."";
                    $querry = $db -> prepare($SQL1);
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
                        header('Location: '.$uri.'/Vaja1/profile');
                        exit;
                    }   
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
    header('Location: '.$uri.'/Vaja1/profile/');
    exit;
?>