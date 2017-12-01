<?php
require "../config/db_config.php";
if(isset($_POST['name']))
{
$name=trim($_POST['name']);
$query2=mysqli_query($link,"SELECT * FROM tbl_productsell WHERE prod_name LIKE '%$name%' OR category LIKE '%$name%' OR user_name LIKE '%$name%'  ");
echo "<ul>";
while($query3=mysqli_fetch_array($query2))
{
?>

<li onclick='fill("<?php echo $query3['prod_name']; ?>")'><?php echo $query3['prod_name']; ?></li>
<?php
}
}
if(isset($_POST['check']))
{
$name=trim($_POST['check']);
$query2=mysqli_query($link,"SELECT * FROM tbl_member WHERE mem_fname LIKE '%$name%' OR mem_id LIKE '%$name%' OR mem_cooperative LIKE '%$name%' OR mem_lname LIKE '%$name%' OR mem_mname LIKE '%$name%' OR mem_age LIKE '%$name%' OR mem_gender LIKE '%$name%' OR mem_homeaddress LIKE '%$name%' OR mem_provaddress LIKE '%$name%' OR mem_number LIKE '%$name%' OR mem_email LIKE '%$name%' OR mem_status LIKE '%$name%' ");
echo "<ul>";
while($query3=mysqli_fetch_array($query2))
{
?>
<li onclick='fill("<?php echo $query3['mem_fname'];?>")'><?php echo $query3['mem_fname']; ?></li>


<?php
}
}
if(isset($_POST['rep']))
{
$name=trim($_POST['rep']);
$query2=mysqli_query($link,"SELECT * FROM tbl_reports WHERE rep_fname LIKE '%$name%' OR mem_id LIKE '%$name%' ");
echo "<ul>";
while($query3=mysqli_fetch_array($query2))
{
?>
<li onclick='fill("<?php echo $query3['rep_fname'];?>")'><?php echo $query3['mem_id']; ?>&nbsp;<?php echo $query3['rep_fname']; ?></li>


<?php
}
}
?>
</ul>