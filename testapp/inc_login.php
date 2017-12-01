<?php

$g = addslashes($_GET['g']);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

	
$(document).ready(function(){
	var view = '<?php echo $g;?>';
	
if(view =='reg'){

	$("#regis").show();
	$("#login").hide();
}
else{
	$("#regis").hide();
	$("#login").show();
}
	

	$("#hide").click(function(){
		$("#regis").show();
		$("#login").hide();
    });
	$("#show").click(function(){
		$("#regis").hide();
		$("#login").show();
    });
    
});

</script>


</script>
<div id="main">
	<div id="tbl_user">
		<div class="field">
			<?php
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
				}
					unset($_SESSION['msg']);
			?>
			<div class="modal-dialog" id="login">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="text-center"><b>Log In</b></h1>
					</div>
			
					<div class="modal-body">
						<form action="process/pro_login.php" method="post" class="form col-md-12 center-block" >
							<div class="form-group">
								<input name="username" placeholder="Username" type="text" style="width:100%;" class="form-control input-lg" required>
							</div>

							<div class="form-group">
								<input name="password" placeholder="Password" type="password" style="width:100%;" class="form-control input-lg" required>
							</div>	
							<div class="form-group">
							<input name="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Login "><br></br>
							<a href="#"><i class="fa fa-registered" id="hide">Register?</i></a>
							</div>	
					
						</form>
						
						<div class="modal-footer"></div>
					</div>
				</div>
				
				</div>
			</div>
		</div>
	</div>
</div>
<div id="regis" style="display:none;">
<div id="main">
	<div id="tbl_user">
		<div class="field">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="text-center"><b>Register Form</b></h1>
					</div>
					
					<div class="modal-body">
						<form action="process/pro_add.php" class="form col-md-12 center-block" method="post">
							<div class="form-group">
								<input name="fname" placeholder="First Name" style="width:100%;" type="text" class="form-control input-lg" required>
							</div>
							
							<div class="form-group">
								<input name="lname" placeholder="Last Name" type="text" style="width:100%;" class="form-control input-lg" required>
							</div>
							
							<div class="form-group">
								<input name="mname" placeholder="Middle Name" type="text" style="width:100%;" class="form-control input-lg" required>
							</div>
							
							<div class="form-group">
								<input name="date" placeholder="Date of Birth" type="date" style="width:100%;" class="form-control input-lg" required>
							</div>
							
							<div class="form-group">
								<input name="user" placeholder="Username" type="text" style="width:100%;" class="form-control input-lg" required>
							</div>
							
							<div class="form-group">
								<input name="pass" placeholder="Password" type="password" style="width:100%;" class="form-control input-lg" required>
							</div>	
							
							<input type="hidden" name="datecreated" >
							<input type="hidden" size="50"name="hid" value="member">
							<div class="form-group">
								<input name="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="SUBMIT"><br></br>
								<a href="#"><i class="fa fa-registered" id="show">Log In?</i></a>
							</div>	
							
						</form>
						<div class="modal-footer"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

