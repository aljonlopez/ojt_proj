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
$('#rep').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#rep").keyup(function() {
var rep = $('#rep').val();
if(rep=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "process/pro_check.php",
data: "rep="+ rep ,
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
if(!empty($_POST['rep']))
{
$val=$_POST['rep'];
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
<input type="text" class="h_searchinput" name="name" id="rep" autocomplete="off"
value="<?php echo $val;?>">
<input type="submit" name="submit" id="submit" value="">
</form>
<div id="display"></div>
</div>
<?php
if(isset($_POST['submit'])){
	$id = $_POST['name'];
	$res=mysqli_query($link,"SELECT * FROM tbl_reports WHERE mem_id LIKE ('%" . $id . "%') or rep_fname LIKE ('%" . $id . "%')");
	$count = mysqli_num_rows($res);
		
	if($count > 0){ 
?>	
	<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin">
			<tr>
				<th> I.D. 			</th>
				<th> Date of Payment 	</th>
				<th> Amount of Balance</th>
				<th> Term 			</th>
				<th> Monthly		    </th>
				<th> Payments		    </th>
				<th> First Name	    </th>
				<th> Last Name 		</th>
				<th> Middle Name 		</th>
			</tr>
<?php
			while($row=mysqli_fetch_array($res)){
?>
				<tr>
					<td><?php echo $row['mem_id']; ?></td>
					<td><?php echo $row['rep_dateofpayment']; ?></td>
					<td><?php echo $row['rep_amountbalance']; ?></td>
					<td><?php echo $row['rep_term']; ?></td>
					<td><?php echo $row['rep_amoutmonthly']; ?></td>
					<td><?php echo $row['rep_amounofpay']; ?></td>
					<td><?php echo $row['rep_fname']; ?></td>
					<td><?php echo $row['rep_lname']; ?></td>
					<td><?php echo $row['rep_mname']; ?></td>
					</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php
}else{
?>
	<div align="center">
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered no-margin" align="center">
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
	$res=mysqli_query($link,"SELECT * FROM tbl_reports  ORDER BY rep_dateofpayment ASC ");
	?>
	<br clear='all'>
	<div class="table-responsive">
	<table style="margin:0px 10px 0px 10px;" cellpadding="0" cellspacing="0" class="table table-condensed table-striped table-bordered table-hover no-margin">
		<tr> 
			<th> I.D. 			</th> 
			<th> Date of Payment 	</th>
			<th> Amount of Balance</th>
			<th> Term 			</th>
			<th> Monthly		    </th>
			<th> Payments		    </th>
			<th> First Name	    </th>
			<th> Last Name 		</th>
			<th> Middle Name 		</th>
		</tr>
		<?php
		while($row=mysqli_fetch_array($res)){
		?>	
			<tr>
				<td><?php echo $row['mem_id'];?></td>
				<td><?php echo $row['rep_dateofpayment'];?></td>
				<td><?php echo $row['rep_amountbalance'] ;?></td>
				<td><?php echo $row['rep_term'];?></td>
				<td><?php echo $row['rep_amoutmonthly'];?></td>
				<td><?php echo $row['rep_amounofpay'];?></td>
				<td><?php echo $row['rep_fname'];?></td>
				<td><?php echo $row['rep_lname'];?></td>
				<td><?php echo $row['rep_mname'];?></td>
			</tr>
		<?php
		}
		?>
	</table>
	</div>
	<br></br>
<?php
}
?>