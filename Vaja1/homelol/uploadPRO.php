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
                $new_icon_name = $_SESSION["Surname"] . " " . $_SESSION["Name"] . " - " . $_POST["title"]. '.' . $icon_ex_lc;
                $icon_upload_path = 'professor-files/' . $new_icon_name;
                move_uploaded_file($icon_tmp_name, $icon_upload_path);

                $db = mysqli_connect(Localhost, Username, Password, Name); // Replace with your database credentials from config.php
                $title = $_POST["title"];
                $description = $_POST["description"];
                $date = date("Y-m-d");
                $id_professor = $_SESSION["id"];
                $id_subject = 1;

                $SQL = "INSERT INTO materials (Title, Description, File, Date, id_professor, id_subject) VALUES (?, ?, ?, ?, ?, ?)";
                $querry = $db->prepare($SQL);
                $querry->bind_param("ssssss", $title, $description, $new_icon_name, $date, $id_professor, $id_subject);
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