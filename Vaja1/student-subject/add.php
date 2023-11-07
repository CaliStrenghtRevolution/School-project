<?php
    include_once("../config.php");
    session_start();
    $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $db = mysqli_connect(Localhost,Username,Password,Name);
        $student_id = $_SESSION["id"];
        $subject_id = $_POST["Subject"];
        $SQL = "SELECT * FROM ss WHERE id_student = $student_id AND id_subject = $subject_id";
        $querry = $db -> prepare($SQL);
        //$querry -> bind_param("ss", $professor_id, $subject_id);
        $querry -> execute();
        $result = $querry -> get_result();
        if(mysqli_num_rows($result) == 0)
        {
            //upon account not existing
            $SQL = "INSERT INTO ss(id_student, id_subject) VALUES (?, ?)";
            $querry = $db -> prepare($SQL);
            $querry -> bind_param("ss",$student_id , $subject_id);
            $querry -> execute();
            $db -> close();
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
    header('Location: '.$uri.'/Vaja1/student-subject/');
    exit;
?>