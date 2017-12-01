<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="scripts/javascript/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/javascript/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/javascript/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

	<script>
		$(document).ready(function(){
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
</head>
<body>			
	<h2><b>Log In</b></h2>
	<form action="#" method="post">
		<input name="username" placeholder="Username" type="text" style="width:100%;" class="form-control input-lg" required>
		<input name="password" placeholder="Password" type="password" style="width:100%;" class="form-control input-lg" required>
		<input name="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Login "><br></br>
		<i class="fa fa-registered" id="hide">Register</i>
	</form>
	
	<h2><b>Register Form</b></h2>

	<form action="#" id="validation" name="myForm" class="form col-md-12 center-block" method="post">
		<span><label>First Name:</label></span>
		<input name="fname" style="width:100%;" type="text" class="form-control input-lg" required>
									
		<span><label>Last Name:</label></span>
		<input name="lname" type="text" style="width:100%;" class="form-control input-lg" required>
									
										<span><label>Username:</label></span>
										<input name="user" type="text" style="width:100%;" class="form-control input-lg" required>
									
										<span><label>Password:</label></span>
										<input name="pass" type="password" style="width:100%;" class="form-control input-lg" required>
									
									
										<input name="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="SUBMIT"><br></br>
										<a href="#"><i class="fa fa-registered" id="show">Log In</i></a>
									
								</form>
			
</html>
