<?php
    include("config.php");
    session_start();
    $error = "";
?>

<html lang="en">
<head>
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

        .tableAdmin {
            border: solid 1px #ccc;
            width: 100%;
        }

        .columnAdmin {
            width: 20%;
            padding: 10px;
            border-right: solid 1px #ccc;
            border-bottom: solid 1px #aaa;
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

        .formAdmin {
            display: grid;
            grid-template-columns: auto auto;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="../home/">Home</a>
            <?php  
                if($_SESSION["Authority"] == 3) 
                {
                    echo '<a href="../students/">Students</a>';
                    echo '<a href="../subjects/">Subjects</a>';
                    echo '<a href="../professors/">Professors</a>';
                }
            ?>
        <div class="navbar-right">
            <?php  
                if(!isset($_SESSION["Authority"])) 
                {
                    echo '<a href="../login/">Login</a>';
                }
                else
                {
                    echo '<a href="../login/logout.php">Logout</a>';
                }
            ?>
        </div>
    </div>

    <div class="container">
        <h1>Students</h1>
        <p>This table shows every student attending SchoolBridge. As the Administrator, you can add new students, or remove previous ones.</p>
        <table class="tableAdmin">
            <tr>
                <th class="columnAdmin">Name</th>
                <th class="columnAdmin">Surname</th>
                <th class="columnAdmin">Path</th>
                <th class="columnAdmin">Year</th>
                <th class="columnAdmin">Username</th>
                <th class="columnAdmin">ID</th>
            </tr>
            <?php
                    $sql = "SELECT * FROM student ORDER BY id DESC";
                    $result = $db->query($sql);

                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                    {
            ?>
            <tr>
                <td class="columnAdmin"><?php echo $row['name'] ?></td>
                <td class="columnAdmin"><?php echo $row['surname'] ?></td>
                <td class="columnAdmin"><?php echo $row['path'] ?></td>
                <td class="columnAdmin"><?php echo $row['year'] ?></td>
                <td class="columnAdmin"><?php echo $row['username'] ?></td>
                <td class="columnAdmin"><?php echo $row['id'] ?></td>
            </tr>

            <?php } } ?>
        </table>
        <br>
        <hr>
        <div class="formAdmin">
            <form class = "delete" action = "delete.php" method = "post">

                <label for="delete_id">ID:</label>
                <input type="text" id="delete_id" name="delete_id" required>

                <button type="submit">Delete Student</button>
            </form>
            <form class = "delete" action = "change_password.php" method = "post">

                <label for="change_id">ID:</label>
                <input type="text" id="change_id" name="change_id" required>

                <label for="change">New password:</label>
                <input type="password" id="change" name="change" required>

                <button type="submit">Update Password</button>
            </form>
        </div>
        <hr>
        <br>
    </div>
</body>
</html>