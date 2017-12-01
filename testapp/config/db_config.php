<?php
//display error (debug mode)
error_reporting(E_ALL);
ini_set('display_errors', 1);
//$connection = mysql_connect("localhost", "root", "");
//$db = mysql_select_db("coop", $connection);
$link = mysqli_connect("localhost", "root", "", "cooperative");
