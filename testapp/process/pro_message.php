<?php
require "../config/db_config.php";

if(isset($_POST['approve'])){
	$id = $_POST['id'];
	$qry = mysqli_query($link,"select * from tbl_loantmp");
	while($row=mysqli_fetch_array($qry)){
		$memid = $row['mem_id'];
		$date = $row['dateloangiven'];
		$amount = $row['amountgiven'];
		$tm = $row['term'];
		$month = $row['monthly'];
		$name = $row['name'];
		$qry=mysqli_query($link,"INSERT INTO tbl_temploan(mem_id, dateloangiven, amountgiven, term, monthly, name)VALUES('$memid', '$date', '$amount', '$tm', '$month', '$name')");
	}
	$sql = "Delete from tbl_loantmp";
	$result = mysqli_query($link,$sql);
	$qry = mysqli_query($link,"INSERT INTO tbl_message (mem_id, message) VALUES('$id','Congratulations your request is already approved')");
	header ('Location: http://negosyomo.filast.com/testapp/index.php?con=pay');
}
if(isset($_POST['decline'])){
	$id = $_POST['id'];
	$qry = mysqli_query($link,"INSERT into tbl_message (mem_id, message) VALUES('$id', 'Sorry your application has been decline') ");
	header('location:'.$_SERVER['HTTP_REFERER']);
}
?>