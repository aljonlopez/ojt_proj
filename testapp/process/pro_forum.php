<?php
session_start();
if(isset($_POST['upload'])){
	$prodid = $_POST['prodid'];
	$prodname = $_POST['prodname'];
	$proddesc = $_POST['proddesc'];
	$prodprice = $_POST['prodprice'];
	$date = date('Y-m-d');
	$fname = isset($_SESSION['mem_fname'])?$_SESSION['mem_fname']:'';
	$number = isset($_SESSION['mem_number'])?$_SESSION['mem_number']:'';
				
	if (getimagesize($_FILES['image']['tmp_name'])== FALSE){
		echo "select an image!";
	}else{
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
					
		require "../config/db_config.php";
		$qry="INSERT INTO tbl_productsell(prod_name, prod_description, prod_price, user_name, user_number, date, prod_pname, prod_image) VALUES('$prodname','$proddesc','$prodprice','$fname','$number','$date','$name','$image')";
		$result=mysqli_query($qry,$link);
				
	if ($result){
		echo "<br/> Image Uploaded";
	}else{
		echo "<br/> Image Not Uploaded";	
	}
	}
}
?>