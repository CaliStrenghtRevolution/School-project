<?php
    define('Localhost','localhost');
    define('Username','Endles');
    define('Password','MannrobicsMann');
    define('Name','Vaja1');

    $db = mysqli_connect(Localhost,Username,Password,Name);

    if ($db === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>