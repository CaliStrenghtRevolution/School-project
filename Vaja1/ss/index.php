<?php
    include("../config.php");
    session_start();
    $error = "";
?>
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

        .submitForm {
            display: grid;
            grid-template-columns: 33% 33% 33%;
        }

        .submit {
            width: 40%;
            padding: 10px;
            margin-top: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
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

        .inputDEL {
            width: 20%;
            padding: 10px;
            margin-top: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
    <?php
        if(isset($_SESSION["Authority"]))
        {
            if($_SESSION["Authority"] != "3")
            {
                if(!isset($_SERVER['POST']['redirected']))
                {
                    header('Location: ../home/index.php');
                    die();
                }
            }
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
        <h1>Students and Subjects</h1>
        <p>Here you can assign subjects to students and students to subjects.</p>
        <hr>
        <form action = "add.php" method = "post">
            <div class="submitForm">
                <div>
                    <label for="Student">Student:</label>
                    <select class="submit" id="Student" name="Student" required>
                        <?php
                            $sql = "SELECT name, surname, id FROM student WHERE authority = '2' ORDER BY id DESC";
                            $result = $db->query($sql);

                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                            {
                        ?>

                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?> <?php echo $row['surname']?></option>

                        <?php } } ?>
                    </select>
                </div>
                <div>
                <label for="Subject">Subject:</label>
                    <select class="submit" id="Subject" name="Subject" required>
                        <?php
                            $sql = "SELECT name, id FROM subject ORDER BY id DESC";
                            $result = $db->query($sql);

                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                            {
                        ?>

                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>

                        <?php } } ?>
                    </select>
                </div>
                <button type="submit">Assign Subject</button>
            </div>
        </form>
        <hr>
        <table class="tableAdmin">
            <tr>
                <th class="columnAdmin">Name</th>
                <th class="columnAdmin">Surname</th>
                <th class="columnAdmin">Subject</th>
                <th class="columnAdmin">ID</th>
            </tr>
            <?php
                    $sql = "SELECT p.name AS p_name, p.surname AS p_surname, s.name AS s_name, ss.id FROM ss JOIN student AS p ON p.id = id_student JOIN subject AS s ON s.id = id_subject ORDER BY id DESC";
                    $result = $db->query($sql);

                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                    {
            ?>
            <tr>
                <td class="columnAdmin"><?php echo $row['p_name'] ?></td>
                <td class="columnAdmin"><?php echo $row['p_surname'] ?></td>
                <td class="columnAdmin"><?php echo $row['s_name'] ?></td>
                <td class="columnAdmin"><?php echo $row['id'] ?></td>
            </tr>

            <?php } } ?>
        </table>
        <hr>
            <form class="delete" action = "delete.php" method = "post">

                <label for="delete_id">ID:</label>
                <input class="inputDEL" type="text" id="delete_id" name="delete_id" required>

                <button type="submit">Delete Connection</button>
            </form>
    </div>
</body>
</html>