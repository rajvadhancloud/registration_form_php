<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "College_Website";
    $connection = "";

    try{
        $connection = mysqli_connect($db_server,$db_user,$db_password,$db_name);
        echo "connected to database succesfully <br><br>";
    }
    catch(mysqli_sql_exception){
        echo "could not connect to database <br><br>";
    }
?>