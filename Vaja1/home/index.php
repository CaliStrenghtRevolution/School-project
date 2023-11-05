<?php
    include("config.php");
    session_start();
    $error = "";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolBridge</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .navbar {
            background-color: #007acc;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #005f9e;
        }

        .navbar-right {
            float: right;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007acc;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="../home/">Home</a>
            <?php
                if(isset($_SESSION["Authority"])) 
                {
                    if($_SESSION["Authority"] == 3) 
                    {
                        echo '<a href="../students/">Students</a>';
                        echo '<a href="../subjects/">Subjects</a>';
                        echo '<a href="../professors/">Professors</a>';
                    }
                }
            ?>
        <div class="navbar-right">
            <?php  
                if(!isset($_SESSION["Authority"])) 
                {
                    echo '<a href="../login/">Login</a>';
                    echo '<a href="../signup/">Sign Up</a>';
                }
                else
                {
                    echo '<a href="../profile/">'.$_SESSION["Name"].' '.$_SESSION["Surname"].'</a>';
                    echo '<a href="../login/logout.php">Logout</a>';
                }
            ?>
        </div>
    </div>

    <div class="container">
        <h1>Welcome to SchoolBridge</h1>
        <p>Your gateway to seamless education.</p>
        <hr>
        <h3 style="color: #007acc; text-align: center;">Don't have an account yet? Sign up today and make bridges to connect to your school work and professors!</h3>
        <hr>
    </div>
</body>
</html>