<?php
require "config/db_config.php"; 
?>
 <html>
 <head> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <title>Untitled Document</title> 
 <link rel="stylesheet" href="style.css" type="text/css">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
 </script>
<script type="text/javascript">
function fill(Value)
{
$('#name').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#name").keyup(function() {
var name = $('#name').val();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "process/pro_check.php",
data: "name="+ name ,
success: function(html){
$("#display").html(html).show();
}
});
}
});
});
</script>
</head>
<body>
<div id="content">
<?php
$val='';
if(isset($_POST['submit']))
{
if(!empty($_POST['name']))
{
$val=$_POST['name'];
}
else
{
$val='';
}
}
?>
<br/>
<div class='h_search'>
<form method="post" action="#">
<input type="text" class="h_searchinput" name="name" id="name" autocomplete="off"
value="<?php echo $val;?>">
<input type="submit" name="submit" id="submit" value="">

</form>
<div id="display"></div>
</div>


<div class="clear"></div>

<?php
if(isset($_POST['submit'])){
	$id = $_POST['name'];
	$res=mysqli_query($link,"SELECT * FROM tbl_productsell WHERE prod_name LIKE ('%" . $id . "%') or category LIKE ('%" . $id . "%') or user_name LIKE ('%" . $id . "%')");
	$count = mysqli_num_rows($res);
		
	if($count > 0){ 
?>		
		<div align="center">
			<div class="table-responsive" style="padding:5% 3% 0px 3%;">
				<table cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin">'; 
					<tr>
						<th> Product Id </th>
						<th> Product Name </th>
						<th> Username </th>
						<th> Contact me </th> 
						<th> Name of Image </th>
						<th>Status</th>
						<th> Action</th>
					</tr>
					<?php
					while($row = mysqli_fetch_array($res)){   
						extract($row);
					?>	
						<tr>
							<td><?php echo $row[0]; ?></td>
							<td><?php echo $row[1]; ?></td>
							<td><?php echo $row[3]; ?></td>
							<td><?php echo $row[4]; ?></td>
							<td><?php echo $row[6]; ?></td>
							<td><?php echo $row[8]; ?></td>
							<?php echo "<td><a href='?con=viewsellproduct&id=$trans_no'>View</a></td>"; ?>
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
			<div class="table-responsive" style="padding:5% 3% 0px 3%;">
			<table  style="width:15%;"cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin" align="center">
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
	
	$query = mysqli_query($link,"SELECT * FROM tbl_productsell ORDER BY trans_no DESC"); 
?>
	<div align="center">
		<div class="table-responsive" style="padding:5% 3% 0px 3%;">
			<table cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin">
				<tr>
					<th style='width:2%'> #</th>
					<th > Product Name </th>
					<th> Username </th>
					<th style='width:10%'> Contact me </th>
					<th style='width:2%'> Name of Image </th>
					<th >Status</th>
					<th style='width:2%'> Action</th>
				</tr>
				<?php
				while($row = mysqli_fetch_array($query)){   
					extract($row);
				?>
					<tr>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[6]; ?></td>
						<td><?php echo $row[8]; ?></td>
						<?php echo "<td><a href='?con=viewsellproduct&id=$trans_no'>View</a></td>"; ?>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
<?php	
}
?>
</div>
</body>
</html>