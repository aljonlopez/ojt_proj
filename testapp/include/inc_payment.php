<?php
$qry = mysqli_query($link, "select mem_id, name from tbl_loantmp");
$count = mysqli_num_rows($qry);

if($count > 0){
?>
	<br/><br/>
	<div align="center">
		<div class="table-responsive">
			<table id="table1" style="width:20%;"cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin">
				<tr>
					<td></td>
					<td>#</td>
					<td>Name</td>
					<td>Action</td>
				</tr>
			<?php
			While($row=mysqli_fetch_array($qry)){
				$a = $row['mem_id'];
			?>	
				<tr>
					<td >Application For Loan</td>
					<td><?php echo $row['mem_id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td ><a href="?con=approval&id=$mem_id">View</a></td>
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
		<div class="table-responsive">
			<table  style="width:15%;"cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered table-condensed no-margin" align="center">
				<tr>
					<th style="text-align:center;">No Applyng yet!</th>
				</tr>
			</table>
		</div>
	</div>
<?php
}
?>