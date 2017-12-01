<?php
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
}
unset($_SESSION['msg']);
							
require "config/db_config.php";
extract($_POST); 

$userid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';

$sql = mysqli_query($link, "SELECT * FROM tbl_member WHERE mem_id=$userid");
while($row=mysqli_fetch_array($sql)){

?>
	<br/>
	<div class="container-fluid" >
		<div class="row">
			<div class="col-md-5" >
				<table class="table table-responsive">
					<th style="background:#575ca9; color:white;"><i class="fa fa-info"></i>&nbsp;&nbsp;Personal Information<a href="?con=useredit" style="font-size:18px; color:white; padding-right:10px; float:right "><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Edit</a></th>
						<tr>
							<td><label>Name:</label>&nbsp;&nbsp;<label style="text-transform:uppercase; font-weight: normal;"><?php $lname = $row['mem_lname']; $fname = $row['mem_fname']; $mname = $row['mem_mname']; echo "$fname $lname $mname"; ?></label></td>
						</tr>
						<tr>
							<td><label>Status:</label>&nbsp;&nbsp;<label style="text-transform:uppercase; font-weight: normal;"><?php $stat = $row['mem_status']; echo "$stat"; ?></label></td>
						</tr>
						<tr>
							<td><label>Gender:</label>&nbsp;&nbsp;<label style="text-transform:uppercase; font-weight: normal;"><?php $gender = $row['mem_gender']; echo "$gender"; ?></label></td>
						</tr>
						<tr>
							<td><label>Cooperative:</label>&nbsp;&nbsp;<label style="text-transform:uppercase; font-weight: normal;"><?php $coop = $row['mem_cooperative']; echo "$coop"; ?></label></td>
						</tr>
						<tr>
							<td><label>Age:</label>&nbsp;&nbsp;<label style="font-weight: normal;"><?php $age = $row['mem_age']; echo "$age"; ?></label></td>
						</tr>
						<tr>
							<td><label>Mobile Number:</label>&nbsp;&nbsp;<label style="text-transform:uppercase; font-weight: normal;"><?php $number = $row['mem_number']; echo "$number"; ?></label></td>
						</tr>
						<tr>
							<td><label>Home Address:</label>&nbsp;&nbsp;<label style="text-transform:uppercase; font-weight: normal;"><?php $home = $row['mem_homeaddress']; echo "$home"; ?></label></td>
						</tr>
						<tr>
							<td><label>Provincial Address:</label>&nbsp;&nbsp;<label style="text-transform:uppercase; font-weight: normal;"><?php $prov = $row['mem_provaddress']; echo "$prov"; ?></label></td>
						</tr>
					</table> 
			</div>	
	
<?php
}
?>
			<div class="col-md-7">
				
				<?php
					require "config/db_config.php";	
					$qry = mysqli_query($link, "select prod_name, prod_description from tbl_productsell where mem_id=$userid order by date desc limit 1");
					
					echo'<table style="max-width:100%;" cellpadding="0" cellspacing="0" class="table table-responsive table-striped table-bordered no-margin">'; 
							echo'<th colspan="2" style="background:#575ca9; color:white; height:10%;"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Recents Post in sell page<a href="?con=sellpost" style="font-size:18px; color:white; margin-right:10px; float:right ">View All</a></th>';
							echo "<tr>";
								echo "<th border='0'>Product Name</th>"; 
								echo "<th>Product Description</th>";
							echo'</tr>';
						
							while($row=mysqli_fetch_array($qry)){
								echo "<tr>
										<td>" . $row['prod_name']   . "</td>
										<td>" . $row['prod_description'] . "</td>
								</tr>";
							}
						echo '</table>';
				?>
				<br/>
				<?php
				
				$qry = mysqli_query($link, "select rep_dateofpayment, rep_amountbalance from tbl_reports where mem_id=$userid order by rep_dateofpayment desc limit 2");
				echo'<table style="max-width:100%;"cellpadding="0" cellspacing="0" class="table table-responsive table-striped table-bordered no-margin">'; 
						echo'<th colspan="2" style="background:#575ca9; color:white; height:10%;"><i class="fa fa-list-ul"></i>&nbsp;&nbsp;Recents Reports<a href="?con=userreport" style="font-size:18px; color:white; margin-right:10px; float:right ">View All</a></th>';
						echo "<tr>"; 
							echo "<th> Date of Payment</th>"; 
							echo "<th> Amount Balance</th>";
						echo'</tr>';
						while($row=mysqli_fetch_array($qry)){
							echo "<tr>
								<td>" . $row['rep_dateofpayment']   . "</td>
								<td>" . $row['rep_amountbalance'] . "</td>
							</tr>";
						}
					echo '</table>';
				?>
				<br/>
				<?php
				$qry = mysqli_query($link, "select trans_status, trans_termleft from tbl_trans where mem_id=$userid limit 1");
				echo'<table style="max-width:100%;"cellpadding="0" cellspacing="0" class="table table-responsive table-striped table-bordered no-margin">'; 
						echo'<th colspan="2" style="background:#575ca9; color:white; height:10%;"><i class="fa fa-spinner"></i>&nbsp;&nbsp;Transaction<a href="?con=usertrans" style="font-size:18px; color:white; margin-right:10px; float:right ">View</a></th>';
						echo "<tr>"; 
							echo "<th> Loan Status</th>"; 
							echo "<th> Monthly term left</th>";
						echo'</tr>';
					
						while($row=mysqli_fetch_array($qry)){
							echo "<tr>
									<td>" . $row['trans_status']   . "</td>
									<td>" . $row['trans_termleft'] . "</td>
									
							</tr>";
						}
					echo '</table>';
				?>
			</div>
		</div>
	</div>

	
		

