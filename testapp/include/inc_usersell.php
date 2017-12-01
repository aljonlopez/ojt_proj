<!DOCTYPE html>
<html>
<body>
	
		<div class="container" style="margin-top:3%; ">
		
		<div class="row">
			
			<div class="col-md-6 col-md-offset-3">
			
				<div style="border:thin solid #e5e5e5; padding:0px 8px 8px 8px;  border-radius: 20px; background-color:#ebebe4;">
					
					<div class="row " style="padding: 0 0.5em 0.5 em 0.5em;" align="center">
						<h2 class="bg-primary input-lg" style="width:98%; padding:15px 0px 5px 0px; border-top-left-radius: 20px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-right-radius: 20px;margin-top:0px; background-color:#575ca9; ">Sell Products</h2>
					</div>
				<form enctype="multipart/form-data" id="add-form" action="" method="POST">
					<div class="form-group">
							<Label >Product Name:</label>
							<input type="text" class="form-control input-lg" maxlength="22" style="text-transform:capitalize;" name="prodname" required><br></br>
						</div>
						<div class="form-group">
							<span><label>Product Description:</label></span>
							<input type="text" class="form-control input-lg" style="text-transform:capitalize;" name="proddesc" required><br></br>
						</div>
						<input type="hidden" name="oneimage" id="t">
						<div class="form-group">
							<span><label>Product Category:</label></span>
							<select name="prodcategory" class="form-control input-lg" required><option value="">select</option><option>vegetable</option><option>fruit</option><option>cereal</option><option>seed</option><option>meat &amp; poultry</option><option>flower</option><option>herbal product</option><option>other product</option></select>
						</div>
						
						<input type="hidden" name="date" <?php date_default_timezone_set("Asia/Manila"); $date = date('Y-m-d H:i:s'); echo "value = '$date'";?>required>
		<div class="form-group">
			<span><label>Choose Photos:</label></span>
			<input type="file" id="file-1" class="file btn-primary btn-md" multiple name="image[]" onchange="loadfiles()">
		</div>
		<center>
		<input type="submit" name="upload" class="btn btn-primary btn-md" style="max-width:50%; margin-bottom:5px;"><br/>
		</form>
		<form action="?con=sellpost" method="post">
		<input type="submit" name="edit" id="edit" class="btn btn-primary btn-md" style="max-width:50%" value="Edit Products">
	</form>

</div>
</div>
</div>
</div>
<script type="text/javascript">
	$('#file-1').fileinput({
		uploadUrl:'#',
		allowedFileExtension:['jpg','png','gif'],
		overwriteInitial:false,
		maxFileSize:1000,
		maxFileNum:5,
	});
	function loadfiles()
{
    var imageFiles = document.getElementById("file-1"),
    filesLength = imageFiles.files.length;
	$a = filesLength - 1;
	
    for (var i = $a; i < filesLength; i++) {
      var trya = document.getElementById("t");
		$hhh = (imageFiles.files[i].name);
		trya.value = $hhh;
		
    }
}
</script>

</body>
</html>
<?php
require "config/db_config.php";

if(isset($_FILES['image']['tmp_name']))
{
	$num_files = count($_FILES['image']['tmp_name']);//count file upload
	
	$prodcategory = $_POST['prodcategory'];
	
	$memid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
	$res=mysqli_query($link,"select idpicture from tbl_productsell order by trans_no desc limit 1");
	while($row=mysqli_fetch_array($res)){
	$no = $row['idpicture'];
	$plus = $no + 1;
	}
	for($i=0; $i<$num_files; $i++)
	{
		if(!is_uploaded_file($_FILES['image']['tmp_name'][$i]))
		{
			echo "no file upload!!";
		}else
		{
			
			if(@copy($_FILES['image']['tmp_name'][$i], "assets/images/".$_FILES['image']['name'][$i]))
			{
				
				$path = $_FILES['image']['name'][$i];
				
				$sql = mysqli_query($link,"insert into tbl_imageupload (image, idpicture, mem_id, category) values ('$path','$plus', '$memid', '$prodcategory')");
				
				if($sql){
					echo "succeful uploadaa";
					
				}else
				{
					echo "cant upload";
				}
			}else
			{
				echo "cant upload";
			}
		}
	}
}

?>
<?php
if(isset($_POST['upload'])){
	$prodname = $_POST['prodname'];
	$proddesc = $_POST['proddesc'];
	$prodcategory = $_POST['prodcategory'];
	$oneimage = $_POST['oneimage'];
	$date = $_POST['date'];
	$memid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
	$fname = isset($_SESSION['mem_fname'])?$_SESSION['mem_fname']:'';
	$number = isset($_SESSION['mem_number'])?$_SESSION['mem_number']:'';

	$res=mysqli_query($link,"select idpicture from tbl_productsell order by trans_no desc limit 1");
	while($row=mysqli_fetch_array($res)){
		$no = $row['idpicture'];
		$plus = $no + 1;
	}
	require "config/db_config.php";
	$qry=mysqli_query($link,"INSERT INTO tbl_productsell(prod_name, prod_description, user_name, user_number, date, prod_pname, mem_id, validation, category, idpicture) VALUES('$prodname','$proddesc', '$fname','$number','$date','$oneimage','$memid','pending', '$prodcategory', '$plus')");											
}
?>
