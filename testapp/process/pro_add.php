<?php
session_start();
require "../config/db_config.php";
extract($_POST); 

if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
	}
		unset($_SESSION['msg']);
		
	
	
	$sql = mysqli_query($link, "INSERT INTO tbl_member (mem_cooperative, mem_lname, mem_fname, mem_email, username, password, mem_privilage, mem_datecreated) VALUES('$ncoop', '$lname', '$fname', '$eadd', '$user', '$pass', '$hid', '$datecreated')");
	if($sql){
		echo '<script>alert("Succes");</script>';
	header('location:http://negosyomo.filast.com/testapp/index.php?g=login');
	}	
?>

