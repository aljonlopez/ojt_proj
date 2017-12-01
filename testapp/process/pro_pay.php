<?php
session_start();
require "../config/db_config.php";
require "../library/func_lib.php";
extract($_POST);

$id = $_POST['memid'];
$payment = $_POST['amount'];
$datenow =$_POST['datenow'];

$query = mysqli_query($link,"select * from tbl_loan where mem_id=$id");
while($row=mysqli_fetch_array($query)){
	$amountbal = $row['amountgiven'];
	$term = $row['term'];
	$monthly = $row['monthly'];
}
$sql = mysqli_query($link,"select * from tbl_loanstorage where mem_id=$id order by loan_id desc limit 1");
while($row=mysqli_fetch_array($sql)){

	$loanid = $row['loan_id'];
	$amountloan = $row['amountgiven'];
	$datelloan = $row['dateloangiven'];
	$termloan = $row['term'];
	$monthloan = $row['monthly'];

}
$query = mysqli_query($link,"select * from tbl_member where mem_id=$id");
while($row=mysqli_fetch_array($query)){
	$fname = $row['mem_fname'];
	$lname = $row['mem_lname'];
	$mname = $row['mem_mname'];
}

if($amountbal<=0){	
	$sql = "Delete from tbl_message";
	$sql = "Delete from tbl_loan where mem_id=$id";
	$result = mysqli_query($sql,$link);
	$_SESSION['msg']="fully paid";
	header('location:'.$_SERVER['HTTP_REFERER']);
	exit();
}else{
	
	$total = ($amountbal - $payment);
	
	if ($total<=0){
		$sql = mysqli_query($link,"INSERT INTO tbl_reports (mem_id, rep_dateofpayment, rep_amountbalance, rep_term, rep_amoutmonthly, rep_amounofpay, rep_fname, rep_lname, rep_mname, loan_id) VALUES('$id', '$datenow', '$total', '$term', '$monthly', '$payment', '$fname', '$lname', '$mname', '$loanid')");
		//$sql = mysqli_query($link,"INSERT INTO tbl_temp (mem_id, rep_dateofpayment, rep_amountbalance, rep_term, rep_amoutmonthly, rep_amounofpay, rep_fname, rep_lname, rep_mname) VALUES('$id', '$datenow', '$total', '$term', '$monthly', '$payment', '$fname', '$lname', '$mname')");
		$sql = mysqli_query($link,"UPDATE tbl_loan SET amountgiven='$total' WHERE mem_id=$id");
		$sql = mysqli_query($link,"INSERT INTO tbl_payment (loan_id, payment, datepayments, mem_id, balance)VALUES('$loanid','$payment','$datenow','$id','$total')");
		
		if($sql){
			echo "succes";
		}else{
			echo "try again!";
		}
		
		$tr = mysqli_query($link,"select * from tbl_trans");
		while($rw=mysqli_fetch_array($tr)){
			$checking = $rw['trans_termleft'];	
		}
				
		$termcheck = ($checking - 1);
		
		$query = mysqli_query($link,"UPDATE tbl_trans SET trans_status='Completed', trans_termleft='$termcheck', trans_balance='$total'");
		if($query){
			echo "haha";
		}else{
			echo "hehe";
		}
		
		header('location:'.$_SERVER['HTTP_REFERER']);		
		$sql = mysqli_query($link,"Delete from tbl_loan where mem_id=$id");
		header('location:'.$_SERVER['HTTP_REFERER']);
		exit();

	}else{
		$sql = mysqli_query($link,"INSERT INTO tbl_reports (mem_id, rep_dateofpayment, rep_amountbalance, rep_term, rep_amoutmonthly, rep_amounofpay, rep_fname, rep_lname, rep_mname, loan_id) VALUES('$id', '$datenow', '$total', '$term', '$monthly', '$payment', '$fname', '$lname', '$mname', '$loanid')");
		//$sql = mysqli_query($link,"INSERT INTO tbl_temp (mem_id, rep_dateofpayment, rep_amountbalance, rep_term, rep_amoutmonthly, rep_amounofpay, rep_fname, rep_lname, rep_mname) VALUES('$id', '$datenow', '$total', '$term', '$monthly', '$payment', '$fname', '$lname', '$mname')");
		$sql = mysqli_query($link,"UPDATE tbl_loan SET amountgiven='$total' WHERE mem_id=$id");
		$sql = mysqli_query($link,"INSERT INTO tbl_payment(loan_id, payment, datepayments, mem_id)values('$loanid','$payment','$datenow','$id')");
		if($sql){
			echo "succes";
		}else{
			echo "try again!";
		}
				
		$tr = mysqli_query($link,"select * from tbl_trans");
		while($rw=mysqli_fetch_array($tr)){
			$checking = $rw['trans_termleft'];	
		}
				
		$termcheck = ($checking - 1);
		
		$query = mysqli_query($link,"UPDATE tbl_trans SET trans_termleft='$termcheck', trans_balance='$total'");
		if($query){
			echo "haha";
		}else{
			echo "hehe";
		}
		
		header('location:'.$_SERVER['HTTP_REFERER']);	
		if($amountbal<=0){	
			$sql = mysqli_query($link,"Delete from tbl_loan where mem_id=$id");
			header('location:'.$_SERVER['HTTP_REFERER']);
			exit();
		}
	}
}
?>