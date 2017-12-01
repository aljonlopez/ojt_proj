<?php
session_start();
require "../config/db_config.php";
if (isset($_POST['upload'])){
	extract($_POST); 
	if($_FILES["image"]["name"]==""){
		$sql = mysqli_query($link,"UPDATE tbl_member SET mem_cooperative='$ncoop', mem_lname='$lname', mem_fname='$fname', mem_mname='$mname', mem_gender='$gender', mem_homeaddress='$address1', mem_provaddress='$address2', mem_number='$number', mem_email='$eadd', mem_age='$age', mem_status='$stat', mem_dateofbirth='$dateofbirth' WHERE mem_id=$num");
		$qry = mysqli_query($link, "UPDATE tbl_productsell SET user_name='$fname', user_number='$number' WHERE mem_id=$num");

		if($sql and $qry){
			header('location:http://192.168.50.54/this/testapp/?con=list');
			exit();
		} else{
			echo "ERROR: Could not able to execute $sql. ";
		}
	}else{
		extract($_POST);
		$target_dir = "../assets/images/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			
				
			$try = $_FILES["image"]["name"];	
		
		}
		
		$sql = mysqli_query($link,"UPDATE tbl_member SET mem_cooperative='$ncoop', mem_lname='$lname', mem_fname='$fname', mem_mname='$mname', mem_gender='$gender', mem_homeaddress='$address1', mem_provaddress='$address2', mem_number='$number', mem_email='$eadd', mem_age='$age', mem_status='$stat', mem_dateofbirth='$dateofbirth', mem_imagename='$try' WHERE mem_id=$num");
		$qry = mysqli_query($link, "UPDATE tbl_productsell SET user_name='$fname', user_number='$number' WHERE mem_id=$num");

		if($sql and $qry){
			header('location:http://192.168.50.54/this/testapp/?con=list');
			exit();
		} else{
		  echo "ERROR: Could not able to execute $sql. ";
		}
	}
	
}


if (isset($_POST['addusers'])){
	extract($_POST); 
	$target_dir = "../assets/images/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		require "../config/db_config.php";
			
		$try = $_FILES["image"]["name"];				
	}
		
	$sql = mysqli_query($link, "INSERT INTO tbl_member (mem_cooperative, mem_lname, mem_fname, mem_mname, mem_gender, mem_homeaddress, mem_provaddress, mem_number, mem_email, mem_age, mem_status, mem_dateofbirth, username, password, mem_privilage, mem_datecreated, mem_imagename, positionadmin ) VALUES('$ncoop', '$lname', '$fname', '$mname', '$gender', '$address1', '$address2', '$number', '$eadd', '$age', '$stat', '$dateofbirth', '$user', '$pass', '$hid', '$datecreated', '$try', '$ncoop')");

	if($sql){
		header('location:http://negosyomo.filast.com/testapp/?con=list');
		exit();
	} else{
	  echo "ERROR: Could not able to execute $sql. ";
	}
	
}
if (isset($_POST['admin'])){
	extract($_POST); 
	$target_dir = "../assets/images/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		require "../config/db_config.php";
			
		$try = $_FILES["image"]["name"];				
	}
		
	$sql = mysqli_query($link, "INSERT INTO tbl_member (mem_cooperative, mem_lname, mem_fname, mem_mname, mem_gender, mem_homeaddress, mem_provaddress, mem_number, mem_email, mem_age, mem_status, mem_dateofbirth, username, password, mem_privilage, mem_datecreated, mem_imagename, positionadmin ) VALUES('$ncoop', '$lname', '$fname', '$mname', '$gender', '$address1', '$address2', '$number', '$eadd', '$age', '$stat', '$dateofbirth', '$user', '$pass', 'member', '$datecreated', '$try', 'admin')");

	if($sql){
		header('location:http://negosyomo.filast.com/testapp/?con=list');
		exit();
	} else{
	  echo "ERROR: Could not able to execute $sql. ";
	}
	
}
if (isset($_POST['user'])){
	extract($_POST); 
	$target_dir = "../assets/images/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		require "../config/db_config.php";
			
		$try = $_FILES["image"]["name"];				
	}
		
	$sql = mysqli_query($link, "INSERT INTO tbl_member (mem_cooperative, mem_lname, mem_fname, mem_mname, mem_gender, mem_homeaddress, mem_provaddress, mem_number, mem_email, mem_age, mem_status, mem_dateofbirth, username, password, mem_privilage, mem_datecreated, mem_imagename, positionadmin ) VALUES('$ncoop', '$lname', '$fname', '$mname', '$gender', '$address1', '$address2', '$number', '$eadd', '$age', '$stat', '$dateofbirth', '$user', '$pass', 'member', '$datecreated', '$try', 'admin')");

	if($sql){
		header('location:http://negosyomo.filast.com/testapp/?con=list');
		exit();
	} else{
	  echo "ERROR: Could not able to execute $sql. ";
	}
	
}
?>