<?php

require "../config/db_config.php";
extract($_POST); 

$sql = mysqli_query($link,"SELECT * FROM try");

while($row=mysqli_fetch_array($sql)){
	
	
	echo"
	<html>
		<body>
			<div class='grid_1_of_4 images_1_of_4'>
				<img height='100' width='150' src='" . $row['image'] . "' >
</body>
</html>";				
}
				?>