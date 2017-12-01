<?php
$userid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
?>
<html>
	<body>
		<div class="container" style="margin-top:3%; ">
		
		<div class="row">
			
			<div class="col-md-6 col-md-offset-3">
			
				<div style="border:thin solid #e5e5e5; padding:0px 8px 8px 8px;  border-radius: 20px; background-color:#ebebe4;">
					
					<div class="row " style="padding: 0 0.5em 0.5 em 0.5em;" align="center">
						<h2 class="bg-primary" style="width:98%; border-top-left-radius: 20px; border-top-right-radius: 20px;margin-top:0px; background-color:#575ca9; height:10%;">Payment Loan</h2>
					</div>
					<form action="process/pro_pay.php" method="post" >
						
						<div class="form-group">
							<span><label>Member I.D.:</label></span>
							<input type="text" class="form-control input-lg" <?php echo "value='$userid'";?> name="memid"><br></br>
						</div>
						
							<?php
								if(isset($_SESSION['msg'])){
									echo $_SESSION['msg'];
								}
									unset($_SESSION['msg']);
							?>
						
						<div class="form-group">	
							<span><label>Amount of Payment:</label></span>
							<input type="text" class="form-control input-lg" name="amount" onblur="checkmoney()"
								<?php $userid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:''; 
									$res=mysqli_query($link,"SELECT * FROM tbl_loan WHERE mem_id=$userid"); 
									while($row=mysqli_fetch_array($res)){ 
										$money = $row['amountgiven'];
										$bal = $row['monthly'];
										if ($money<=0){
											echo "value='0'";
										}else{
											echo "value='$bal'";
										}
									}
								?>readonly> 
						</div>	
						
						<div class="form-group">
							<span><label>Date:</label></span>
							<input type="text" name="datenow" class="form-control input-lg" <?php date_default_timezone_set("Asia/Manila"); $date = date('Y-m-d H:i:s'); echo "value = '$date'";?>><br></br>
						</div>
						
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-lg btn-block" value="SUBMIT">
						</div>
				
					</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
