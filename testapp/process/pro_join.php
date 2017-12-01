<?php
require "../config/db_config.php";
 
echo "<table class='listing' cellpadding='0' cellspacing='0'>"; 
    echo    "<tr>"; 
    echo    "<th> Name:		</th>"; 
    echo    "<th> Amount:	</th>";
	echo	"</tr>"; 
	
$res=mysql_query("SELECT m.*, l.* FROM tbl_member m, tbl_loan l WHERE m.mem_id=l.mem_id");
while($row=mysql_fetch_array($res))
{
	echo "<tr>
	<td>" . $row['mem_fname'] . "</td><br></br>
	<td>" . $row['amountgiven'] . "</td>";
	echo"</tr>";
	echo"</table>";
}



?>