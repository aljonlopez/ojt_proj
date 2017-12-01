<?php
require "../config/db_config.php";
extract($_POST);

$query = "Select * from tbl_member where mem_email = '$email'";
$result = mysqli_query($link,$query);
echo $counter = mysqli_num_rows($result);

mysqli_close($link);
 

?>
