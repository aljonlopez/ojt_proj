<?php
session_start();
require "../config/db_config.php";
extract($_POST);

$username = addslashes($username);
$password = addslashes($password);
$query = mysqli_query( $link, "select * from tbl_member WHERE password='$password' AND username='$username'");

if(mysqli_num_rows($query)>0){
	$row = mysqli_fetch_assoc($query);
	$user_id = $row['mem_id'];
		
	$_SESSION['mem_cooperative']=$row['mem_cooperative'];
	$_SESSION['mem_lname']=$row['mem_lname'];
	$_SESSION['mem_fname']=$row['mem_fname'];
	$_SESSION['mem_mname']=$row['mem_mname'];
	$_SESSION['mem_gender']=$row['mem_gender'];
	$_SESSION['mem_homeaddress']=$row['mem_homeaddress'];
	$_SESSION['mem_provaddress']=$row['mem_provaddress'];
	$_SESSION['mem_number']=$row['mem_number'];
	$_SESSION['mem_email']=$row['mem_email'];
	$_SESSION['mem_age']=$row['mem_age'];
	$_SESSION['mem_status']=$row['mem_status'];
	$_SESSION['mem_dateofbirth']=$row['mem_dateofbirth'];
	$_SESSION['mem_privilage']=$row['mem_privilage'];
	$_SESSION['mem_id']=$user_id;
	if($_SESSION['mem_privilage']=="admin"){
		header('location:../index.php?con=list');
	}elseif($_SESSION['mem_privilage']=="member"){
		header('location:../index.php?con=user');
	}
}else{
	$_SESSION['msg']="Login Error!";
	header('location:'.$_SERVER['HTTP_REFERER']);
	
}
?>