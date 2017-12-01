<div class="container" style="margin-top:3%; ">
	<div class="row">
		<div class="col-md-4 col-md-offset-9">
			<form action="" method="post">
				<div class="form-inline">
					<input type="text" name="num" class="form-control try"  placeholder="transaction number" />
					<input type="submit" name="submit" class="btn-sm" style="color:white; border-radius:10px; border:none; background-color:#3C50A1;" value="search">
				</div>
			</form>
		</div>
	</div>
</div>

     

<?php
if(isset($_POST['submit'])){
	$num = $_POST['num'];

	$res=mysqli_query($link,"SELECT * FROM tbl_reports WHERE loan_id LIKE ('%" . $num . "%')");
	$count = mysqli_num_rows($res);
		
	if($count > 0){ 
	?>
		<br clear='all'>
		<div align="center" >
			<div class="table-responsive" style="padding:5% 3% 0px 3%;">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered no-margin"> 
					<tr style='max-width:50px;'>
						<th style="width:5%; text-align:center;"> Transaction No.</th>
						<th> Date of Payment 	</th>
						<th> Amount of Balance</th>
						<th> Term 			</th>
						<th> Monthly		    </th>
						<th> Payments		    </th>
					</tr>
					<?php
					while($row=mysqli_fetch_array($res)){
					?>
						<tr>
							<td><?php echo $row['loan_id'];?></td>
							<td><?php echo $row['rep_dateofpayment'];?></td>
							<td><?php echo $row['rep_amountbalance'] ;?></td>
							<td><?php echo $row['rep_term'];?></td>
							<td><?php echo $row['rep_amoutmonthly'];?></td>
							<td><?php echo $row['rep_amounofpay'];?></td>
						</tr>
					<?php
					}
					?>
				
				</table>
			</div>
		</div>
		<br></br>
	<?php
	}else{
	?>
		<br/>
		<div align="center">
			<div class="table-responsive" style="padding:5% 3% 0px 3%;">
				<table style="width:15%;" cellpadding="0" cellspacing="0" class="table table-striped table-bordered no-margin" align="center">
					<tr>
						<th style="text-align:center;">No Records Found!</th>
					</tr>
				</table>
			</div>
		</div>
		
	<?php
	}	
	?>
<?php
}else{

	$userid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
	$res=mysqli_query($link,"SELECT * FROM tbl_reports WHERE mem_id=$userid ORDER BY rep_dateofpayment ASC ");
	
	?>
	<br clear='all'>
	<div class="table-responsive" style="padding:5% 3% 0px 3%;">
	<table style="margin:0px 10px 0px 10px;" cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered table-hover no-margin">
		
		<tr> 
			<th style="width:5%; text-align:center;"> Transaction No.</th>
			<th> Date of Payment 	</th>
			<th> Amount of Balance</th>
			<th> Term 			</th>
			<th> Monthly		    </th>
			<th> Payments		    </th>
		</tr>
		<?php
		
		
		while($row=mysqli_fetch_array($res)){
		
		?>	
				
			<tr>	
				<td><?php echo $row['loan_id'];?></td>
				<td><?php echo $row['rep_dateofpayment'];?></td>
				<td><?php echo $row['rep_amountbalance'] ;?></td>
				<td><?php echo $row['rep_term'];?></td>
				<td><?php echo $row['rep_amoutmonthly'];?></td>
				<td><?php echo $row['rep_amounofpay'];?></td>
				
			</tr>
		<?php
		if($row['rep_amountbalance'] == 0){
			echo '</table><br/><br/>
			
			<table style="margin:0px 10px 0px 10px;" cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered table-hover no-margin">';
				?>
				
				<tr> 
					<th style="width:5%; text-align:center;"> Transaction No.</th>
					<th> Date of Payment 	</th>
					<th> Amount of Balance</th>
					<th> Term 			</th>
					<th> Monthly		    </th>
					<th> Payments		    </th>
				</tr>
		<?php
		}
		}
		?>
	</table>
	</div>
	<br></br>
<?php
}
?>

