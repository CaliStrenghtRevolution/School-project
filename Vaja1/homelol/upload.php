<?php
include("../config.php");
session_start();
$error = "";

if (isset($_SESSION["Name"])) {
    if (isset($_POST["submit"]) && isset($_FILES['fileUpload'])) {
        // File upload handling
        $icon_name = $_FILES['fileUpload']['name'];
        $icon_size = $_FILES['fileUpload']['size'];
        $icon_tmp_name = $_FILES['fileUpload']['tmp_name'];
        $icon_error = $_FILES['fileUpload']['error'];

        if ($icon_error === 0) {
            $icon_ex = pathinfo($icon_name, PATHINFO_EXTENSION);
            $icon_ex_lc = strtolower($icon_ex);

            $allowed_exs = array("zip");

            if (in_array($icon_ex_lc, $allowed_exs)) {

                $title = $_POST['variable_to_pass_title'];
                $new_icon_name = $_SESSION["Surname"] . " " . $_SESSION["Name"] . " - " . $title. '.' . $icon_ex_lc;
                $icon_upload_path = 'student-files/' . $new_icon_name;
                move_uploaded_file($icon_tmp_name, $icon_upload_path);

                $db = mysqli_connect(Localhost, Username, Password, Name);
                $date = date("Y-m-d");
                $id_student = $_SESSION["id"];
                $id_materials = $_POST['variable_to_pass'];

                $SQL = "INSERT INTO submission (File, id_student, id_materials) VALUES (?, ?, ?)";
                $querry = $db->prepare($SQL);
                $querry->bind_param("sss", $new_icon_name, $id_student, $id_materials);
                $querry->execute();
                $db->close();
            } else {
                $em = "You can't upload files of this type!";
                header("Location: index.php?error=$em");
            }
        } else {
            $em = "An error occurred during file upload!";
            header("Location: index.php?error=$em");
        }
    } else {
        $em = "Unknown error occurred!";
        header("Location: index.php?error=$em");
    }
}

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}

$uri .= $_SERVER['HTTP_HOST'];
header('Location: ' . $uri . '/Vaja1/homelol/');
exit;
?>