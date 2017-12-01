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
$('#check').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#check").keyup(function() {
var check = $('#check').val();
if(check=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "process/pro_check.php",
data: "check="+ check ,
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
if(!empty($_POST['check']))
{
$val=$_POST['check'];
}
else
{
$val='';
}
}
?>

<?php
require "config/db_config.php";
echo '<div style="padding-left:2.5%;" >';
echo '<a href="?con=addusers" style="margin-left:5px; margin-top:5%;" class="alert alert-info fa fa-user">&nbsp;&nbsp;Add Members</a>';	
echo '</div>';
if(isset($_POST['submit'])){
	$id = $_POST['name'];
	
?>

<?php
	$res=mysqli_query($link,"SELECT * FROM tbl_member WHERE mem_lname LIKE ('%" . $id . "%') or mem_fname LIKE ('%" . $id . "%')");
	$count = mysqli_num_rows($res);
		
	if($count > 0){ 
?>
		<div align="center">	
			<div class="table-responsive" style="padding:5% 3% 0px 3%;">
				
				<table cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin">
					<tr>
						<th> #    </th>
						<th> Cooperative </th>
						<th> Last Name           </th>
						<th> First Name </th>
						<th> Middle Name </th>
						<th> Number </th>
						<th> Email Address </th>
						<th> Age </th>
						<th> Status </th> 
						<th> Date of birth </th>
						<th> Username </th>
						<th>Action</th>
					</tr>
				<?php
				while($row = mysqli_fetch_array($res)){   //Creates a loop to loop through results
					extract($row);
				?>
					<tr>
						<td><?php echo $row['mem_id']; ?></td>
						<td><?php echo $row['mem_cooperative']; ?></td>
						<td><?php echo $row['mem_lname']; ?></td>
						<td><?php echo  $row['mem_fname']; ?></td>
						<td><?php echo $row['mem_mname']; ?></td>
						<td><?php echo $row['mem_number']; ?></td>
						<td><?php echo $row['mem_email']; ?></td>
						<td><?php echo $row['mem_age']; ?></td>
						<td><?php echo $row['mem_status']; ?></td>
						<td><?php echo $row['mem_dateofbirth']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo '<a href="?con=viewprofile&id=$mem_id">'?>view</a></td>
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
		
		<div align="center">
			<div class="table-responsive" style="padding:5% 3% 0px 3%;">
				<table style="width:15%;" cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin" align="center">
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

	$query = mysqli_query($link,"SELECT * FROM tbl_member ORDER BY mem_id DESC"); 
?>
	<div align="center">
		<div class="table-responsive"  style="padding:3% 3% 0px 3%;">
			<table align="center" cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin" >
				<tr> 
					<th> #    </th> 
					<th> Cooperative </th> 
					<th> Last Name           </th>
					<th> First Name </th>
					<th> Middle Name </th>
					<th> Number </th>
					<th> Email Address </th> 
					<th> Age </th> 
					<th> Status </th>
					<th> Date of birth </th>
					<th> Username </th>
					<th>Action</th>
				</tr>
				<?php
				while($row = mysqli_fetch_array($query)){   //Creates a loop to loop through results
					extract($row);
				?>
					<tr>
						<td><?php echo $row['mem_id']; ?></td>
						<td><?php echo $row['mem_cooperative']; ?></td>
						<td><?php echo $row['mem_lname']; ?></td>
						<td><?php echo $row['mem_fname']; ?></td>
						<td><?php echo $row['mem_mname']; ?></td>
						<td><?php echo $row['mem_number']; ?></td>
						<td><?php echo $row['mem_email']; ?></td>
						<td><?php echo $row['mem_age']; ?></td>
						<td><?php echo $row['mem_status']; ?></td>
						<td><?php echo $row['mem_dateofbirth']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<?php echo "<td><a href='?con=viewprofile&id=$mem_id'>view</a></td>"; ?>
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
