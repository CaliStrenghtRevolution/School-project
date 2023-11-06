<?php
    include("../config.php");
    session_start();
    $error = "";
?>

<html lang="en">
<head>
    <title>SchoolBridge</title>
    <script>
        function redirect()
        {
            document.getElementById('redirect').submit();
        }
    </script>
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

        .input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .profileForm {
            display: grid;
            grid-template-columns: 33% 33% 33%;
        }

        .profile {
            width: 40%;
            padding: 10px;
            margin-top: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007acc;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #005f9e;
        }
    </style>
</head>
    <?php
        if(isset($_SESSION["Authority"]))
        {

        }
        else
        {
            if(!isset($_SERVER['POST']['redirected']))
            {
                header('Location: ../home/index.php');
                die();
            }
        }
    ?>
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
                        echo '<a href="../ps/">PS</a>';
                        echo '<a href="../ss/">SS</a>';
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
        <h1><?php echo $_SESSION["Name"].' '.$_SESSION["Surname"]?></h1>
            <?php
                if(isset($_SESSION["Authority"])) 
                {
                    if($_SESSION["Authority"] == 2) 
                    {
                        ?><h1><?php echo $_SESSION["Path"].', year '.$_SESSION["Year"]?></h1><?php
                    }
                }
            ?>
        <h1><?php echo $_SESSION["Username"]?></h1>
        <hr>
        <div class="profileForm">
            <form action = "name.php" method = "post">

                <label for="Name">Name:</label>
                <input class="profile" type="text" id="Name" name="Name" required>

                <button type="submit">Update Name</button>
            </form>

            <form action = "surname.php" method = "post">

                <label for="Surname">Surname:</label>
                <input class="profile" type="text" id="Surname" name="Surname" required>

                <button type="submit">Update Surname</button>
            </form>

            <form action = "password.php" method = "post">

                <label for="Password">Password:</label>
                <input class="profile" type="password" id="Password" name="Password" required>

                <button type="submit">Update Password</button>
            </form>
        </div>
        <div class="profileForm">
            <form action = "username.php" method = "post">

                <label for="Username">Username:</label>
                <input class="profile" type="text" id="Username" name="Username" required>

                <button type="submit">Update Username</button>
            </form>
            <?php
                if(isset($_SESSION["Authority"])) 
                {
                    if($_SESSION["Authority"] == 2) 
                    {
                        ?><form action = "path.php" method = "post">
                            <label for="Path">Path:</label>
                            <select class="profile" id="Path" name="Path" required>
                                <option value="Racunalnicar">Računalničar</option>
                                <option value="Kemik">Kemik</option>
                                <option value="Elektrotehnik">Elektrotehnik</option>
                            </select>
                            <button type="submit">Update Path</button>
                        </form>

                        <form action = "year.php" method = "post">
                            <label for="Year">Year:</label>
                            <select class="profile" id="Year" name="Year" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <button type="submit">Update Year</button>
                        </form><?php
                    }
                }
            ?>
        </div>
        <hr>
    </div>
</body>
</html>