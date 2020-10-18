<?php
 $link = mysqli_connect("Database HOSTNAME", "Database Username", "Databasepassword", "Database Name");

session_start();

    if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }
    if (($_GET['function']) == "logout") {
        
        session_unset();
        
    }
    

?>