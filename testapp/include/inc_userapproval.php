<?php
require "config/db_config.php";
$res=mysqli_query($link,"SELECT m.*, l.* FROM tbl_member m, tbl_loantmp l WHERE m.mem_id=l.mem_id");
while($row=mysqli_fetch_array($res)){
	
?>
	<div class="container">
		<div class="row" style="padding-top:3%;">
			<div class="col-md-6 col-md-offset-3">
				<form action="process/pro_message.php" method="post" >
					<div class="row">
						<div class="col-md-6" align="right" style="padding-top:1%;">
							<label>ID:</label>
						</div>
						<div class="col-md-6">
							<input type="text" style="border-style:none; " class="form-control" name="id" value="<?php echo  "" . $row['mem_id'] . ""; ?>">
						</div>
						<div class="col-md-6" align="right" style="padding-top:1%;">
							<label>AMOUNT OF LOAN:</label>
						</div>
						<div class="col-md-6">
							<input type="text" style="border-style:none;" class="form-control" value="<?php echo " " . $row['amountgiven'] . " ";?>">
						</div>
						<div class="col-md-6" align="right" style="padding-top:1%;">
							<label>PAYMENT OF TERM:</label>
						</div>
						<div class="col-md-6">
							<input type="text" style="border-style:none;" class="form-control" value="<?php echo " " . $row['term'] . " ";?>">
						</div>
						<div class="col-md-6" align="right" style="padding-top:1%;">
							<label>MONTHLY PAYMENT:</label>
						</div>
						<div class="col-md-6">
							<input type="text" style="border-style:none;" class="form-control" value="<?php echo " " . $row['monthly'] . " ";?>">
						</div>
						<div class="col-md-6" align="right" style="padding-top:1%;">
							<label>FIRST NAME:</label>
						</div>
						<div class="col-md-6">
							<input type="text" style="border-style:none;" class="form-control" value="<?php echo " " . $row['name'] . " ";?>">
						</div>
						<div class="col-md-6" align="right" style="padding-top:1%;">
							<label>LAST NAME:</label>
						</div>
						<div class="col-md-6">
							<input type="text" style="border-style:none;" class="form-control" value="<?php echo " " . $row['mem_lname'] . " ";?>">
						</div>					
						&nbsp;
						<div class="col-md-3 col-md-offset-5">
							<input type="submit" name="approve" value="Approve" class="btn btn-primary btn-lg btn-block"><input type="submit" name="decline" value="Decline" class="btn btn-primary btn-lg btn-block">
						</div>
					</div>
				</form>
			</div>			
		</div>
	</div>
<?php
}
?>