<?php
require '../config/config.php';
extract($_GET);
extract($_POST);
//$macid = '00:00:00:000';
if(!empty($macid)){
	$query = "Select userid from tbl_registeruser where deviceinfo = '$macid'";
	$result = mysqli_query($con,$query);
	$counter = mysqli_num_rows($result);
	$counter = 1;
	if($counter >= 2){
		$msg = "twice";
	}else{
		$query2 = "Select userid from tbl_registeruser where email = '$email'";
		$result2 = mysqli_query($con,$query2);
		$email_counter = mysqli_num_rows($result2);
		if($email_counter == 0){
			$username =  "guest";
			$password =  "guest";
		
			$deviceinfo = $macid;
			$newuser = "INSERT INTO `tbl_registeruser` ( `usergroup`,`firstname`, `lastname`,  `address`, `city`,  `email`, `deviceinfo`, `datecreated`,`secretkey`,`province`,`isFree`,`otherCity`,`username`, `password`) 
			VALUES ( '10','".  $fname . "','" . $lname   . "','" . $address . "',24,'". $email . "','" . $deviceinfo  . "','" . $date = date('Y-m-d H:i:s') . "','". $token."','1','1','".$city."','" . $username . "','" .  $password . "')";
		
			$result = mysqli_query($con,$newuser) or die(mysqli_error());
		
			if($result){
				$msg = "true";
			}else{
				$msg = "false";
			}	
		}
		else{
			$msg = "duplicate";
		}			
	}
}else{
	$msg = "direct";
}
mysqli_close($con);
echo "{value:'$msg'}";

?>

