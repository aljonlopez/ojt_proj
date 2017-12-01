<html>
<body onLoad="load()">

<?php
require "config/db_config.php";
define('CONSTANT_NAME', 'SOME VALUE'); 

$userid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
$fname = isset($_SESSION['mem_fname'])?$_SESSION['mem_fname']:'';

$query = mysqli_query($link,"select * from tbl_loan where mem_id=$userid");

while($row=mysqli_fetch_array($query)){
	if($row['amountgiven']<=0){
		
	}else{
		?>
		<script type='text/javascript'>
		window.location="?con=userpay";
		</script>
		<?php
	}
}
$qry = mysqli_query($link,"select * from tbl_loantmp where mem_id=$userid");
if(mysqli_num_rows($qry)!=0){
	while($row=mysqli_fetch_array($qry)){
	?>
	
		<div class="container">
			<div class="row" style="padding-top:3%;">
				<div class="col-md-6 col-md-offset-3 alert alert-info" align="center">
					<form><br/>
						<p>Hi <?php echo $row['name']?> please wait for your application to be approved by the administrator.</p>
						<p>Thank you for patience.</p>
						<br/>
					</form>
				</div>	
			</div>
		</div>
		<?php
	}
}else{
	$query = mysqli_query($link,"select mem_id, message from tbl_message where mem_id=$userid");

	if(mysqli_num_rows($query)!=0){
		while($row=mysqli_fetch_array($query)){
			
			$a = $row['message'];
			?>
			<div class="container">
				<div class="row" style="padding-top:3%;">
					<div class="col-md-6 col-md-offset-3 alert alert-success" align="center">
						<form><br/>
							<p style='margin-left:60px;'><?php echo $a;?></p>
							<p style='margin-left:90px;'>just <a href='process/pro_applyloan.php'>click here</a> to complete the process</p>
						</form>
					</div>
				</div>
			</div>
		<?php
		}

	}else{
			
		?>
		
		<div class="container" style="margin-top:3%; ">
		
		<div class="row">
			
			<div class="col-md-6 col-md-offset-3">
			
				<div style="border:thin solid #e5e5e5; padding:0px 8px 8px 8px;  border-radius: 20px; background-color:#ebebe4;">
					
					<div class="row " style="padding: 0 0.5em 0.5 em 0.5em;" align="center">
						<h2 class="bg-primary" style="width:98%; border-top-left-radius: 20px; border-top-right-radius: 20px;margin-top:0px; background-color:#575ca9; height:10%;">Application Loan</h2>
					</div>
					
					<form action="process/pro_addloan.php"   method="post" >
						<br clear="all">
						<?php
						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
						}
							unset($_SESSION['msg']);
						?>
						<div class="form-group">	
							<span><label>Member ID:</label></span>
							<input type="text" name="memid" style="border-style:none; background-color:#ebebe4 !important;" class="form-control input-lg" <?php echo "value='$userid'";?> id="checking" onBlur="checkmember" required readonly>
						</div>
						<input type="hidden" name="dateloan" class="form-control input-lg" <?php date_default_timezone_set("Asia/Manila"); $date = date('Y-m-d H:i:s'); echo "value = '$date'";?>required>
						
						<div class="form-group">
							<span><label>Amount Loan:</label></span>
							<input type="text" value="5000" name="amount" onchange="loan()" id="money" class="form-control input-lg" required>
						</div>
						<div class="form-group">
							<span><label>Monthly Term:</label></span>
							<select name="ter" id="t" onchange="myFunction()" class="form-control input-lg" required><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option></select>
							<!--<input type="text" name="ter" id="t" value="5" class="haha input-lg" onBlur="myFunction()" required>-->
						</div>
						<div class="form-group">
							<span><label>Monthly Payment:</label></span>
							<input type="text" name="month" id="difference" style="border-style:none; background-color:#ebebe4 !important;" class="form-control input-lg" readonly></span>
						</div>
						<div class="form-group">
							<input type="submit"style="border-style:none; background:#82c341;"  name="submit" value="SUBMIT" class="btn btn-primary btn-lg btn-block">
						</div>
						
						
						
						
					</form>
			</div>		
				</div>
		</div>
	</div>
	
	<script>
							function load(){
								var x = document.getElementById("money");
								var a = document.getElementById("t");
								var sum = document.getElementById("difference");
								$diff = x.value/a.value;
								sum.value = $diff;
							}
							function checkmember(){
								var x = document.getElementById("money");
								var a = document.getElementById("t");
								var sum = document.getElementById("difference");
								$diff = x.value/a.value;
								sum.value = $diff;
							}
							function checkmember(){
								var xa = document.getElementById("checking");
								var aa = document.getElementById("t");
								aa.value = xa.value;
							}
							
							function myFunction() {
								
								var x = document.getElementById("money");
								var a = document.getElementById("t");
								var sum = document.getElementById("difference");
								$diff = x.value/a.value;
								var n = $diff.toFixed(2)
								sum.value = n;
							}
							function loan() {
								var x = document.getElementById("money");
								var a = document.getElementById("t");
								var sum = document.getElementById("difference");
								$diff = x.value/a.value;
								var n = $diff.toFixed(2)
								sum.value = n;
								if(x.value<5000){
									alert("Loan should be more than 5000");
									x.value = "5000";
									 $("#money").focus();
									 }
								
								
								
							}
						</script>
	<?php
	}
}
?>