<?php
session_start();
require "../config/db_config.php";

if (isset($_POST['upload'])){
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
				
	$sql = mysqli_query($link,"UPDATE tbl_member SET mem_cooperative='$ncoop', mem_lname='$lname', mem_fname='$fname', mem_mname='$mname', mem_gender='$gender', mem_homeaddress='$address1', mem_provaddress='$address2', mem_number='$number', mem_email='$eadd', mem_age='$age', mem_status='$stat', mem_dateofbirth='$dateofbirth', mem_imagename='$try' WHERE mem_id=$num");
	$qry = mysqli_query($link, "UPDATE tbl_productsell SET user_name='$fname', user_number='$number' WHERE mem_id=$num");

	if($sql and $qry){
		header('location:http://negosyomo.filast.com/testapp/index.php?con=user');
		exit();
	} else{
	  echo "ERROR: Could not able to execute $sql. ";
	}
	
}
?>