<?php
    define('Localhost','localhost');
    define('Username','Vaja1');
    define('Password','SMVvaja1');
    define('Name','vaja1');

    $db = mysqli_connect(Localhost,Username,Password,Name);

    if ($db === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    ?>