<?php

$sql = mysqli_query($link,"SELECT * FROM tbl_productsell WHERE trans_no=$id");
while($row=mysqli_fetch_array($sql)){


?>
<div class="container" style="margin-top:3%; ">
		
		<div class="row">
			
			<div class="col-md-6 col-md-offset-3">
			
				<div style="border:thin solid #e5e5e5; padding:0px 8px 8px 8px;  border-radius: 20px; background-color:#ebebe4;">
					
					<div class="row " style="padding: 0 0.5em 0.5 em 0.5em;" align="center">
						<h2 class="bg-primary input-lg" style="width:98%; padding:15px 0px 5px 0px; border-top-left-radius: 20px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-right-radius: 20px;margin-top:0px; background-color:#575ca9; ">Update Products</h2>
					</div>
			<form action="" id="validation" name="myForm"  method="post" enctype="multipart/form-data"> 
			<br/>
				<div class="form-group">
					<span><label>Add Photos:</label></span>
					<input type="file" id="file-1" style="float:right; margin-right:10px;" class="file btn-primary btn-sm" multiple name="image[]" onchange="loadfiles()">
				</div>
				<br/>
				<div class="form-group">
					<span><label>Product Name:</label></span>
						<input type="text" name="prodname" class="form-control input-lg"  value="<?=getProductInfo($id,'prod_name')?>" ></label>
				</div>
				
				<div class="form-group">
					<span><label>Product Description:</label></span>
					<textarea rows="5" cols="40" name="proddesc" class="form-control input-lg" ><?=getProductInfo($id,'prod_description')?></textarea>
				</div>
				
				<div class="form-group">
					<span><label>Category:</label></span>
					<input type="text" name="prodcategory" class="form-control input-lg"  value="<?=getProductInfo($id,'category')?>" readonly></label>
				</div>
					<input type="hidden" name="oneimage" id="t">
					<input type="hidden" value="<?=getProductInfo($id,'category')?>" name="cat">
					<input type="hidden" value="<?=getProductInfo($id,'idpicture')?>" name="idpic">	
					<input type="hidden" value="<?=getProductInfo($id,'trans_no')?>" name="id">
					<br/>
					<br/>
					<input type="submit" name="upload" class="btn btn-primary btn-md" style="margin-left:30%; max-width:25%;"><br/>
					
					</form>
				
				
		</div> 
	</div>
 </div>
 </div>
 	
				<script>
					var loadFile = function(event) {
					var output = document.getElementById('output');
					output.src = URL.createObjectURL(event.target.files[0]);
										
					};
					
				</script>
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
<?php
}
?>
 <?php
require "config/db_config.php";

if(isset($_FILES['image']['tmp_name']))
{
	$num_files = count($_FILES['image']['tmp_name']);//count file upload
	$idpic = $_POST['idpic'];
	$cat = $_POST['cat'];
	
	
	$memid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
	
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
				
				$sql = mysqli_query($link,"insert into tbl_imageupload (image, idpicture, mem_id, category) values ('$path','$idpic', '$memid', '$cat')");
				
				/*if($sql){
					echo "succeful uploadaa";
					
				}else
				{
					
					echo "cant upload";
				}*/
			}else
			{
				echo "insert into tbl_imageupload (image, idpicture, mem_id, category) values ('$path','$idpic', '$memid', '$cat')";
				exit();
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
	$idpic = $_POST['idpic'];
	$memid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
	$fname = isset($_SESSION['mem_fname'])?$_SESSION['mem_fname']:'';
	$number = isset($_SESSION['mem_number'])?$_SESSION['mem_number']:'';

	
	require "config/db_config.php";
	$qry = mysqli_query($link,"update tbl_productsell set prod_name='$prodname', prod_description='$proddesc', prod_pname='$oneimage' where idpicture=$idpic");
}
?>	




