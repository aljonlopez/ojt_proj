<?php

require "config/db_config.php";
extract($_POST);

$sqla = mysqli_query($link,"Delete from tbl_imageupload where idpicture=$idpic");


$sql = "Delete from tbl_productsell where trans_no=$id";
$result = mysqli_query($link,$sql);


header('location:'.$_SERVER['HTTP_REFERER']);
