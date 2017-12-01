<?php
require "config/db_config.php";
extract($_POST); 

$userid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
$id = isset($_SESSION['pro_idpic'])?$_SESSION['pro_idpic']:'';
$sql = mysqli_query($link,"SELECT * FROM tbl_productsell");

while($row=mysqli_fetch_array($sql)){
	$valid = $row['validation'];
	if($valid == "pending"){ 	
	?>
		<html>
			<body>
				<div class="grid_1_of_4 images_1_of_4">
					<?php echo "<img height='100' width='150' src='assets/images/" . $row['prod_pname'] . "' >";?>
					<div class="price-details">
						<div align="center">
						<form action="process/pro_upload.php" method="post" class="form col-md-8 center-block">
							<br></br>
							<input type="text" style="border-style:none; text-align:center; width:100px; font-size:12px; height:10px;" class="haha input-lg" name="id" value="<?php echo  "" . $row[1] . ""; ?>"><br><br/>
							<input type="text" style="border-style:none; text-align:center; width:100px; font-size:12px; height:10px;" class="haha input-lg" value="<?php echo " " . $row[2] . " ";?>"><br><br/>
							<input type="text" style="border-style:none; text-align:center; width:100px; font-size:12px; height:10px;" class="haha input-lg" value="<?php echo " " . $row[3] . " ";?>"><br><br/>
							<input type="text" style="border-style:none; text-align:center; width:100px; font-size:12px; height:10px;" class="haha input-lg" value="<?php echo " " . $row[4] . " ";?>"><br><br/>
							<input type="text" style="border-style:none; text-align:center; width:100px; font-size:12px; height:10px;" class="haha input-lg" value="<?php echo " " . $row[5] . " ";?>"><br><br/>
							<input type="text" style="border-style:none; text-align:center; width:100px; font-size:12px; height:10px;" class="haha input-lg" value="<?php echo " " . $row[6] . " ";?>"><br><br/>
							<input type="hidden" name="id" value="<?php echo " " . $row[0] . " ";?>"><br><br/>
							
							<input type="submit" style="width:50%;" name="approve" value="Approve" class="btn btn-primary btn-lg"><br><br/><input type="submit" style="width:50%; name="decline" value="Decline" class="btn btn-primary btn-lg ">
							<br><br/>
						</form>
						</div>
					</div>					 
				</div>
			</body>
		</html>
	<?php
	}
}
?>

							 
