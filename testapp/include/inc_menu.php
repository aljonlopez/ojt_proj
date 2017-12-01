<?php
if($_SESSION['mem_privilage']=="admin"){
?>
<div class="header_bg">
	<div class="wrap">
		<div class="header">
			<div class="clear"></div>
		</div>
	</div>
</div>

<div class="header_btm">
	<div class="wrap">
		<div class="header_sub">
			<div class="h_menu">
				<ul>
					<li class="<?=isset($active1)?$active1:''?>"><a href="?con=list" >Members</a> </li>| 
					<li class="<?=isset($active2)?$active2:''?>"><a href="?con=pay" >Loans</a></li>|
					<li class="<?=isset($active5)?$active5:''?>"><a href="?con=report" >Reports</a></li> |
					<li class="<?=isset($active6)?$active6:''?>"><a href="?con=setting" >Settings</a></li> |
					<li class="<?=isset($active7)?$active7:''?>"><a href="?con=sell" >Product Posted</a></li> |
					<li><a href="process/pro_logout.php">Logout</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<br/>


<?php
}
?>

<?php
	if($_SESSION['mem_privilage']=="member"){
?>

<div class="header_bg">
	<div class="wrap">
		<div class="header">
			<div class="clear"></div>
		</div>
	</div>
</div>

<div class="header_btm">
	<div class="wrap">
		<div class="header_sub">
			<div class="h_menu">
				<ul>
					<?php	
					require "config/db_config.php";
					$sql = mysqli_query($link, "SELECT * FROM tbl_member WHERE mem_id=$userid");
					$row=mysqli_fetch_array($sql);
                        
					$qry = mysqli_query($link,"select * from tbl_loan");
					?>
					<?php
					
					if(mysqli_num_rows($qry)!=0){
					?>		
                        <li class="<?=isset($active1)?$active1:''?>"><a href="?con=user" >Home</a></li> |
                        <li class="<?=isset($active3)?$active3:''?>"><a href="?con=userpay" >Payment of Loan</a> </li>|
                        <li class="<?=isset($active4)?$active4:''?>"><a href="?con=userreport" >Reports</a> </li>|
                        <li class="<?=isset($active7)?$active7:''?>"><a href="?con=usertrans" >Transaction</a> </li>|
                        <li class="<?=isset($active5)?$active5:''?>"><a href="?con=usersell" >Sell</a> </li>|
                        <li><a href="process/pro_logout.php">Logout</a></li>
                        <span style="float:right; color:#000; margin-top:10px;text-decoration:none; font-weight:normal;">Welcome&nbsp;<?php echo $row['mem_fname'];  ?></span>

					<?php
					}else{
					?>
					
					<li class="<?=isset($active1)?$active1:''?>"><a href="?con=user" >Home</a></li> |
					<li class="<?=isset($active2)?$active2:''?>"><a href="?con=userloan" >Application Loan</a></li> |
					<li class="<?=isset($active4)?$active4:''?>"><a href="?con=userreport" >Reports</a> </li>|
					<li class="<?=isset($active7)?$active7:''?>"><a href="?con=usertrans" >Transaction</a> </li>|
					<li class="<?=isset($active5)?$active5:''?>"><a href="?con=usersell" >Sell</a> </li>|
					<li><a href="process/pro_logout.php">Logout</a></li>
					<span style="float:right; color:#000; margin-top:10px;text-decoration:none; font-weight:normal;">Welcome&nbsp;<?php echo $row['mem_fname'];  ?></span>
					
				   <?php
					}
					?>
					
				</ul>
			</div>	
				<div class="clear"></div>
        	
		</div>
	</div>
</div>

<?php
	}
?>
