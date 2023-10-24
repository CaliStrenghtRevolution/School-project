<?php
    include_once("config.php");
    session_start();
    $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $db = mysqli_connect(Localhost,Username,Password,Name);
        $username = $_POST["Username"];
        $password = sha1($_POST["Password"]);
        $SQL1 = "SELECT name FROM student WHERE username = ? AND password = ?";
        $querry = $db -> prepare($SQL1);
        $querry -> bind_param("ss",$username,$password);
        $querry -> execute();
        $result = $querry -> get_result();
        if(mysqli_num_rows($result) != 0)
        {
            $_SESSION["Name"] = mysqli_fetch_assoc($result)['name'];
            $db -> close();
        }
        else
        {
            $_SESSION["Name"] = Null;

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

        $db = mysqli_connect(Localhost,Username,Password,Name);
        $username = $_POST["username"];
        $password = sha1($_POST["password"]);
        $SQL2 = "SELECT id FROM users WHERE username = ? AND password = ?";
        $querry = $db -> prepare($SQL2);
        $querry -> bind_param("ss",$username,$password);
        $querry -> execute();
        $result = $querry -> get_result();
        if(mysqli_num_rows($result) != 0)
        {
            $_SESSION["id"] = mysqli_fetch_assoc($result)['id'];
            $db -> close();

            $db = mysqli_connect(Localhost,Username,Password,Name);
            $sql = "SELECT * FROM profile WHERE user = '" . $_SESSION['id'] . "'";
            $result = $db->query($sql);
            $id = mysqli_fetch_assoc($result)['user'];

            if($id != $_SESSION['id'])
            {
                $_SESSION['icon'] = 'pfpicon.png';

                $sql = "SELECT * FROM users WHERE Name = '" . $_SESSION['Name'] . "'";
                $result = $db->query($sql);
                $users_id = mysqli_fetch_assoc($result)['id'];

                $stmt = $db->prepare("INSERT INTO profile(user, icon) VALUES (?, ?)");
                $stmt->bind_param("ss", $users_id, $_SESSION['icon']);
                $stmt->execute();
            }
            else
            {
                $sql = "SELECT icon FROM profile WHERE user = '" . $_SESSION['id'] . "'";
                $result = $db->query($sql);
                $icon = mysqli_fetch_assoc($result)['icon'];
    
                $_SESSION['icon'] = $icon;
            }
            $sql = "SELECT * FROM profile WHERE user = '" . $_SESSION['id'] . "'";
            $result = $db->query($sql);
            $profile_id = mysqli_fetch_assoc($result)['id'];

            $_SESSION['profile'] = $profile_id;
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