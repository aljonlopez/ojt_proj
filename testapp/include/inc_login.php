<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="scripts/javascript/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/javascript/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/javascript/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

	<link href="scripts/css/bootstrap-theme.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="scripts/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="scripts/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="scripts/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="all"/>
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
		jQuery(document).ready(function(){
			jQuery("#validation").validationEngine();
		});
	</script>
</head>

<br/><br/><br/><br/>
<div class="col-lg-4 col-lg-offset-4">
	<a href="http://negosyomo.filast.com/index.php"><img src="assets/images/Logo-2a.png" style="max-width: 100%;"/></a>
	<br/><br/>
	<form role="form" id="login" action="process/pro_login.php" method="post">
		<?php
			if(isset($_SESSION['msg'])){
				?>
				<div class="alert alert-danger"><?php echo $_SESSION['msg']; ?> </div>
			<?php
			}
			unset($_SESSION['msg']);
		?>
		<div class="form-group">
			<label for="email">Username:</label>
			<input type="text" name="username" class="form-control input-sm"  required>
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" name="password" class="form-control"  required>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="#" id="hide">Register</a>
	</form>

</div>
<div class="col-lg-4 col-lg-offset-4">
	<form role="form" action="process/pro_add.php" method="post" style="display:none;" id="regis">
		<div class="form-group" >
			<label for="email">First Name:</label>
			<input type="text" class="form-control input-sm" name="fname"  >
		</div>
		<div class="form-group">
			<label for="pwd">Last Name:</label>
			<input type="text" class="form-control" name="lname">
		</div>
		<div class="form-group" >
			<label for="email">Email Address:</label>
			<input type="email" id="email" onblur="emailCheck()" class="validate[required,custom[email]] form-control input-sm" name="eadd"  >
		</div>
		<div class="form-group">
			<label>Cooperative :</label>
			<select name="ncoop" class="form-control input-lg">
				<option value="">Select</option>
				<?php 
				require "config/db_config.php";
				$qry = mysqli_query($link, "select * from cooperative_names where status = 1");
				echo "select * from cooperative_names where status = 1";
				if ($qry){
					
					while($row=mysqli_fetch_array($qry)){
						?>
						<option><?php echo $row[1]; ?></option>
					<?php
					}
				}
				?>
			</select>
			<!--<input type="text" class="form-control" id="coop">-->
		</div>
		
		<input type="hidden" name="datecreated"  <?php date_default_timezone_set("Asia/Manila"); $date = date('Y-m-d H:i:s'); echo "value = '$date'";?>required>
		<input type="hidden" name="hid" value ="member">

		<div class="form-group" >
			<label for="email">Username:</label>
			<input type="text" class="form-control input-sm" name="user"  >
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" name="pass">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<span class="glyphicon glyphicon-registration-mark"></span><a href="#" id="show">Log In</a>
	</form>
</div>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#validation").validationEngine();
	});
	function emailCheck(){
		var email = $("#email").val();
		
		$.post("process/pro_email.php",{ email : email }, function(result) {
		result = $.trim(result);
									
			if (result > 0) {
				alert('Email Already registered!');
				$("#email").focus();
				return false;
			} 
		});
	}
</script>
