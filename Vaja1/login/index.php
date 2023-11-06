<html>
    <title>Login</title>
<head>
         <link rel="stylesheet" href="../home/styles.css">

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
            max-width: 400px;
            margin: 100px auto;
            padding: 20px 30px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007acc;
            margin-top: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 99%;
            padding: 10px;
            margin-bottom: 15px;
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
        include("config.php");
        session_start();
        $error = "";

        if(isset($_SESSION["Authority"]))
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
        <a href="../home">Home</a>
    </div>

    <form id='redirect' action='../login/index.php' method='POST'>
        <input type='hidden' name='redirected1', value='true' hidden>
    </form>

    <div class="container">
        <h1>Log in to School Bridge</h1>
        <form action = "login.php" method = "post">

            <label for="Username">Username:</label>
            <input type="text" id="Username" name="Username" required>

            <label for="Password">Password:</label>
            <input type="password" id="Password" name="Password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</html>