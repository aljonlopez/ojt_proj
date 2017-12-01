<?php

require "config/db_config.php";

extract($_GET);


if(isset($_POST['delete'])){
extract($_POST);

$sql = "Delete from tbl_member where mem_id=$num";
$result = mysqli_query($link,$sql);
}

header('location:http://negosyomo.filast.com/testapp/index.php?con=list');