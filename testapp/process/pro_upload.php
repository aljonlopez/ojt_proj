<?php

require "../config/db_config.php";
if(isset($_POST['app'])){
$id = $_POST['id'];
$qry = mysqli_query($link,"UPDATE tbl_productsell SET validation='approve' where trans_no = $id");
if($qry){
	echo 'success';
	header('location:'.$_SERVER['HTTP_REFERER']);
} 
else{
	echo 'error';
}
}
if(isset($_POST['dec'])){
	$id = $_POST['id'];
$qry = mysqli_query($link,"UPDATE tbl_productsell SET validation='declined' where trans_no = $id");
if($qry){
	echo 'success';
	header('location:'.$_SERVER['HTTP_REFERER']);
} 
else{
	echo 'error';
}
}
?>