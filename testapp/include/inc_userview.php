<?php
require "../config/db_config.php";
$query = mysqli_query($link,"select * from tbl_member");
$count = mysqli_num_rows($query);
		
while($row=mysqli_fetch_array($query)){
	echo "<lable>" . $row['mem_id'] . "</label>";
}
	
?>