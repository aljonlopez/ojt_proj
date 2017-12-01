<?php 
$userid = isset($_SESSION["mem_id"])?$_SESSION["mem_id"]:"";

$query = mysqli_query($link,"select * from tbl_trans where mem_id=$userid");
$count = mysqli_num_rows($query);
	
if($count > 0){
	?>
	<br clear="all">
	<div align="center">
	<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin"> 
		<tr>
			<th>Status</th>
			<th>Term Left</th>
			<th>Balance</th>
			<th>Name</th>
		</tr>
	<?php
	while($row=mysqli_fetch_array($query)){
	?>
		<tr>
			<td><?php echo $row['trans_status']; ?></td>
			<td><?php echo $row['trans_termleft']; ?></td>
			<td><?php echo $row['trans_balance']; ?></td>
			<td><?php echo $row['trans_name']; ?></td>
		  </tr>
	<?php
	}
	?>
	</table>
	</div>
	</div>
<?php
}else{
?>
	<br/>
	<div align="center">
	<table  style="width:15%;"cellpadding="0" cellspacing="0" class="table table-striped table-bordered no-margin" align="center">
		<tr>
			<th style="text-align:center;">No Records Found!</th>
		</tr>
	</div>
	</table>
<?php
	}
?>