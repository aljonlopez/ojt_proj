<?php
session_start();
require "../config/db_config.php";
extract($_POST);
$qry =mysqli_query($link,"Delete from tbl_message");	
$qr = mysqli_query($link,"Delete from tbl_trans");
$name = isset($_SESSION['mem_fname'])?$_SESSION['mem_fname']:'';
$qry = mysqli_query($link,"select * from tbl_temploan");
while($row=mysqli_fetch_array($qry)){
	$memid = $row['mem_id'];
	$dateloan = $row['dateloangiven'];
	$amount = $row['amountgiven'];
	$ter = $row['term'];
	$month = $row['monthly'];
}
		
$query = mysqli_query($link,"select * from tbl_member where mem_id=$memid");
while($row=mysqli_fetch_array($query)){
	$fname = $row['mem_fname'];
	$lname = $row['mem_lname'];
	$mname = $row['mem_mname'];
}

$query = mysqli_query($link, "SELECT * FROM tbl_member WHERE mem_id LIKE ('%" . $memid . "%')");
while($result=mysqli_fetch_array($query)){ 
	$aa = $result['mem_id'];
}
	 
if($aa=$memid ){
	$payment = 0;
	$qry =  mysqli_query($link,"INSERT INTO tbl_trans (trans_status, trans_termleft, trans_balance, trans_name, mem_id)VALUES('On process','$ter','$amount','$name', '$memid')");
	//$sql = mysqli_query($link,"INSERT INTO tbl_reports (mem_id, rep_dateofpayment, rep_amountbalance, rep_term, rep_amoutmonthly, rep_amounofpay, rep_fname, rep_lname, rep_mname) VALUES('$memid', '$dateloan', '$amount', '$ter', '$month', '$payment', '$fname', '$lname', '$mname')");
	$sql =  mysqli_query($link,"INSERT INTO tbl_loan (mem_id, dateloangiven, amountgiven, term, monthly) VALUES('$memid', '$dateloan', '$amount', '$ter', '$month')");
						
	if($sql){
		header('location:'.$_SERVER['HTTP_REFERER']);
		exit;
	}else{
		$_SESSION['msg']="Error please try again!";
	}
}	
?>