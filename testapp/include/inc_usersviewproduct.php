<?php
require "config/db_config.php"; 
?>
 <html xmlns="http://www.w3.org/1999/xhtml">
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
<div class='h_search'>
<form method="post" action="#">
<input type="text" class="h_searchinput" name="name" id="name" autocomplete="off"
value="<?php echo $val;?>">
<input type="submit" name="submit" id="submit" value="">
</form>
</div>
<div id="display"></div>

<div class="clear"></div>
<?php
if(isset($_POST['submit'])){
	$id = $_POST['name'];
	$res=mysqli_query($link,"SELECT * FROM tbl_productsell WHERE prod_name LIKE ('%" . $id . "%')");
	$count = mysqli_num_rows($res);
		
	if($count > 0){ 
		echo"<br></br>";
		echo '<div align="center">';
			echo'<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered no-margin">'; 
				echo	"<tr>"; 
					echo    "<th> Product Id </th>";
					echo    "<th> Product Name </th>"; 
					echo    "<th> Username </th>";
					echo    "<th> Contact me </th>"; 
					echo    "<th> Name of Image </th>";
					echo 	"<th>Status</th>";
					echo    "<th> Action</th>";
					
				echo    "</tr>"; 

				while($row = mysqli_fetch_array($res)){   
					extract($row);
					
					echo"<tr>
						<td>" . $row[0] . "  </td>
						<td>" . $row[1] . "  </td>
						<td>" . $row[3] . "  </td>
						<td>" . $row[4] . "  </td>
						<td>" . $row[6] . "  </td>
						<td>" . $row[8] . " </td>
						<td><a href='?con=viewsellproduct&id=$trans_no'>View</a></td>
					</tr>";
				}
			echo "</table>";
		echo '</div>';
	}else{
		echo '<br/>';
		echo '<div align="center">';
			echo'<table  style="width:15%;"cellpadding="0" cellspacing="0" class="table table-striped table-bordered no-margin" align="center">';
				echo '<tr>';
					echo'<th style="text-align:center;">No Records Found!</th>';
				echo '</tr>';
			echo'</table>';
		echo '</div>';
	}
}else{
	
	$query = mysqli_query($link,"SELECT * FROM tbl_productsell ORDER BY trans_no ASC"); 
	echo"<br></br>";
	echo '<div align="center">';
		echo'<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered no-margin">'; 
			 echo "<tr>"; 
				echo    "<th style='width:2%'> #</th>";
				echo    "<th > Product Name </th>"; 
				echo    "<th> Username </th>";
				echo    "<th style='width:10%'> Contact me </th>"; 
				echo    "<th style='width:2%'> Name of Image </th>"; 
				echo 	"<th >Status</th>";
				echo    "<th style='width:2%'> Action</th>";
			echo "</tr>"; 

			while($row = mysqli_fetch_array($query)){   
				extract($row);
				echo"<tr>
					<td>" . $row[0] . "  </td>
					<td>" . $row[1] . "  </td>
					<td>" . $row[3] . "  </td>
					<td>" . $row[4] . "  </td>
					<td>" . $row[6] . "  </td>
					<td>" . $row[8] . " </td>
					<td><a href='?con=viewsellproduct&id=$trans_no'>View</a></td>
				</tr>";
			}
		echo "</table>";
	echo '</div>';
}
?>
</div>
</body>
</html>