<?php
require "../config/db_config.php";
if(isset($_POST['name']))
{
$name=trim($_POST['name']);
$query2=mysqli_query($link,"SELECT * FROM tbl_member WHERE mem_fname LIKE '%$name%' OR mem_lname LIKE '%$name%' ");
echo "<ul>";
while($query3=mysqli_fetch_array($query2))
{
?>

<li onclick='fill("<?php echo $query3['mem_fname']; ?>")'><?php echo $query3['mem_fname']; ?></li>
<?php
}
}
?>
</ul>