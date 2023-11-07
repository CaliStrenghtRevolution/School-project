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
        .file-card {
            padding: 20px;
            margin-bottom: 10px;
            position: relative;
            border: double 5px #ccc;
            border-style: double;
        }

    button {
        background-color: #007acc;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .inputFile {
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

.file-header {
    background-color: #007acc;
    color: white;
    font-size: 20px;
    padding: 15px 20px;
    margin-bottom: 20px;
}

.file-title {
    font-weight: bold;
}

.file-description {
    color: #666;
}

.file-date {
    font-size: 12px;
    color: #999;
    position: absolute;
    bottom: 10px;
    left: 20px;
}

.inputTitle {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
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
        if(!isset($_SESSION["Authority"]))
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
                    else
                    {
                        echo '<a href="../homelol/">Tasks</a>';
                    }

                    if($_SESSION["Authority"] == 2) 
                    {
                        echo '<a href="../student-subject/">Assign</a>';
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
        <?php
            if(isset($_SESSION["Authority"])) 
            {
                if($_SESSION["Authority"] == 1) 
                {
                    $sql = "SELECT * FROM materials WHERE id_professor = ".$_SESSION["id"]." ORDER BY id DESC";
                }
                else
                {
                    $sql = "SELECT * FROM materials ORDER BY id DESC";
                }
            }

                $result = $db->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
            { 
        ?>
            <div class="file-card">
            <?php
                if(isset($_SESSION["Authority"])) 
                {
                    if($_SESSION["Authority"] == 1) 
                    {
                        ?><form class="file-header" action="../assignments/index.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="variable_to_pass" value="<?php echo $row['id']; ?>">   
                            <button style="background-color: #ccc; color: black;"><?php echo $row['title']; ?></button>
                            <div style="float: right;"><?php echo $row['id']; ?></div>  
                        </form><?php
                    }
                    else
                    {
                        ?><div class="file-header"><?php echo $row['title']; ?><div style="float: right;"><?php echo $row['id']; ?></div></div><?php
                    }
                }
            ?>
                <div class="file-body">
                    <a href="../homelol/professor-files/<?php echo $row['file'];?>" download="<?php echo $row['file'];?>">
                        <button class="file-title"><?php echo $row['file']; ?></button>
                    </a>
                    <p class="file-description"><?php echo $row['description']; ?></p>
                    <p class="file-date">changed on "<?php echo $row['date']; ?>"</p>
                </div>
                <?php
                    if(isset($_SESSION["Authority"]))
                    {
                        if($_SESSION["Authority"] == "2")
                        {
                            ?><form action="upload.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileUpload" class="inputFile">
                                <input type="hidden" name="variable_to_pass" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="variable_to_pass_title" value="<?php echo $row['title']; ?>">
                                <button type="submit" name="submit" style="float: right;">SAVE</button>
                            </form><?php
                        }
                    }
                ?>
            </div>
        <?php } } ?>
                <?php
                    if(isset($_SESSION["Authority"]))
                    {
                        if($_SESSION["Authority"] == "1")
                        {
                            ?><hr>
                            <form class="delete" action = "delete.php" method = "post">
                    
                                <label for="delete_id">ID:</label>
                                <input class="inputDEL" type="text" id="delete_id" name="delete_id" required>
                    
                                <button type="submit">Delete Materials</button>
                            </form>
                            <hr>
                            <div class="file-card">
                                <form action="uploadPRO.php" method="post" enctype="multipart/form-data">
                                    <div class="file-header">
                                        <input class="inputTitle" type="text" placeholder="Title" id="title" name="title" maxlength="30" required>
                                    </div>
                                    <div class="file-body">
                                        <input class="inputTitle" style="margin-bottom: 15px;" placeholder="Description" type="text" id="description" name="description" maxlength="300" required>
                                        <input type="file" name="fileUpload" class="inputFile" id="inputFile" required>
                                        <button type="submit" name="submit" style="float: right;">SAVE</button>
                                    </div>
                                </form>
                            </div><?php
                        }
                    }
                ?>
    </div>
</body>
</html>