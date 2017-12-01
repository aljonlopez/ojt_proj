<?php

function getMember($id,$fieldname){
$link = mysqli_connect("localhost", "root", "", "coop1");
	$sql = mysqli_query($link,"Select * from tbl_productsell where prod_id=$id");
	
	$row =  mysqli_fetch_assoc($sql);
	return $row[$fieldname];
	
}