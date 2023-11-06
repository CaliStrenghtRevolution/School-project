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

        .inputDEL {
            width: 20%;
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

        h1 {
            color: #007acc;
        }

        .formAdmin {
            display: grid;
            grid-template-columns: auto auto;
        }

        .ADDgrid {
            display: grid;
            grid-template-columns: 70% 15%;
            gap: 45px;
        }

        .containerADD {
            max-width: 400px;
            margin: 10px auto;
            padding: 20px 30px;
            background-color: #fff;
            box-shadow: 0 5px 7px rgba(0, 0, 0, 0.2);
        }

        .input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button:hover {
            background-color: #005f9e;
        }
    </style>
</head>
    <?php
        if(isset($_SESSION["Authority"]))
        {
            if($_SESSION["Authority"] != "2")
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
                if($_SESSION["Authority"] == 3) 
                {
                    echo '<a href="../students/">Students</a>';
                    echo '<a href="../subjects/">Subjects</a>';
                    echo '<a href="../professors/">Professors</a>';
                    echo '<a href="../ps/">PS</a>';
                    echo '<a href="../ss/">SS</a>';
                }
                if($_SESSION["Authority"] == 2) 
                {
                    echo '<a href="../subjects/">Subjects</a>';
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
                    echo '<a href="../profile/">'.$_SESSION["Name"].' '.$_SESSION["Surname"].'</a>';
                    echo '<a href="../login/logout.php">Logout</a>';
                }
            ?>
        </div>
    </div>

    <div class="container">
    <?php

// Check if the student's path and year are set in the session
if(isset($_SESSION['Path']) && isset($_SESSION['Year'])) {
    // Store the path and year in variables for easier use
    $studentPath = $_SESSION['Path'];
    $studentYear = $_SESSION['Year'];

    // SQL query to select subjects that match the student's path and year
    $sql = "SELECT name, year, path FROM Subject WHERE path = ? AND year = ? ORDER BY name ASC";
    
    // Prepare the SQL statement to prevent SQL injection
    if($stmt = $db->prepare($sql)) {
        // Bind the path and year variables as parameters to the prepared statement
        $stmt->bind_param("si", $studentPath, $studentYear);
        
        // Execute the query
        $stmt->execute();
        
        // Store the result
        $result = $stmt->get_result();
        
        // Check if any subjects were found
        if ($result->num_rows > 0) {
            echo '<div class="main-container">';
            echo '<h1>Assign Subjects</h1>';
            echo '<div class="grid-container">';

            // Fetch associative array and output each subject as a checkbox item
            while ($row = $result->fetch_assoc()) {
                echo '<div class="grid-item">';
                echo '<input type="checkbox" id="subject_' . htmlspecialchars($row['path']) . '_' . $row['year'] . '" name="subject[]" value="' . htmlspecialchars($row['name']) . '" class="checkbox">';
                echo '<label for="subject_' . htmlspecialchars($row['path']) . '_' . $row['year'] . '" class="subject-label">' . htmlspecialchars($row['name']) . '</label>';
                echo '</div>';
            }

            echo '</div>'; // Close grid-container
            echo '</div>'; // Close main-container
        } else {
            echo 'No subjects found for your current path and year.';
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "SQL statement could not be prepared.";
    }
} else {
    echo 'Student path or year is not set in the session.';
}
?>
</div>