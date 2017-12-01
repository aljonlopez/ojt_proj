<?php
session_start();
require "../config/db_config.php";
extract($_POST);
	
$qr = mysqli_query($link,"Delete from tbl_trans");
$qr = mysqli_query($link, "Delete from tbl_loan");
$qr = mysqli_query($link, "Delete from tbl_temploan");
$name = isset($_SESSION['mem_fname'])?$_SESSION['mem_fname']:'';

$qry = mysqli_query($link, "INSERT INTO tbl_loantmp (mem_id, dateloangiven, amountgiven, term, monthly, name) VALUES('$memid', '$dateloan', '$amount', '$ter', '$month', '$name')");
$qry = mysqli_query($link, "INSERT INTO tbl_loanstorage (mem_id, dateloangiven, amountgiven, term, monthly) VALUES('$memid', '$dateloan', '$amount', '$ter', '$month')");						
if($qry){
	header('location:'.$_SERVER['HTTP_REFERER']);
}else{
	$_SESSION['msg']="Error please try again!";
}


?>