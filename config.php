<?php
    /*The central configuration file
    that contains required parameters to establish a connection with the MySQL Server's database instance */
    $username = "d86295sa328613";
    $database = "d86295_bookstore";
    include('content/include/password.php');
    $servername = "d86295.mysql.zonevs.eu";
    $yhendus = new mysqli($servername, $username, $password, $database);
    /* Use UTF8 encoding for database */
    $yhendus -> set_charset("utf8");
?>