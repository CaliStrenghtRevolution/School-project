<?php
    session_start();
    $_SESSION["Authority"] = Null;
    $_SESSION["Name"] = Null;
    $_SESSION["Surname"] = Null;
    $_SESSION["Username"] = Null;
    $_SESSION["Year"] = Null;
    $_SESSION["Path"] = Null;
    $_SESSION["id"] = Null;

    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']))
    {
        $uri = 'https://';
    }
    else
    {
        $uri = 'http://';
    }

    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: '.$uri.'/Vaja1/home/index.php');
    exit;
?>