<?php
if(isset($_POST['upload'])){
	function getMembersInfo($id,$fieldname){
	require "config/db_config.php";

	$sql = "Select * from tbl_member where mem_id=$id";
	$res= mysqli_query($link,$sql);
	$row =  mysqli_fetch_assoc($res);
	return $row[$fieldname];
}
}
function getMemberInfo($id,$fieldname){
require "config/db_config.php";

	$sql = "Select * from tbl_member where mem_id=$id";
	$res= mysqli_query($link,$sql);
	$row =  mysqli_fetch_assoc($res);
	return $row[$fieldname];
}

function getProductInfo($id,$fieldname){
require "config/db_config.php";

	$sql = "Select * from tbl_productsell where trans_no=$id";
	$res= mysqli_query($link,$sql);
	$row =  mysqli_fetch_assoc($res);
	return $row[$fieldname];
}
?>