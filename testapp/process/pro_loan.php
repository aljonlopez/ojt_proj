<?php 
session_start();
require "../config/db_config.php";
extract($_POST);
	
$name=$_POST['memid']; 

$data = mysqli_query($link, "SELECT * FROM tbl_member WHERE mem_id LIKE ('%" . $name . "%')");
$_SESSION['msg']="ERROR MEMBER NUMBER";
header('location:'.$_SERVER['HTTP_REFERER']);

while($result=mysqli_fetch_array($data)){ 
	$try = $result['mem_fname'];
}
	
if($try = $name){
	$name=$_POST['memid']; 
	$dateloana=$_POST['dateloan'];
	$amounta=$_POST['amount'];
	$tera=$_POST['ter'];
	$montha=$_POST['month'];
	
		echo"<form method='post' action='pro_addloan.php'>";
			echo"<input type='text' name='memid' value='$name' type='hidden'>";
			echo"<input type='date' name='dateloan' value='$dateloana' type='hidden'>";
			echo"<input type='text' name='amount' value='$amounta' type='hidden'>";
			echo"<input type='text' name='term' value='$tera' type='hidden'>";
			echo"<input type='text' name='month' value='$montha' type='hidden'>";
		echo"</form>";
			//header('location:pro_addloan.php');
}else{
}
?>