<form action="process/pro_add.php" method="post">
		
	<fieldset>
		<legend>Registration Form</legend>
		<label>LAST NAME: </label><input type="text" name="lname">&nbsp;&nbsp;<label>FIRST NAME: </label><input type="text" name="fname">&nbsp;&nbsp;<label>MIDDLE NAME: </label><input type="text" name="mname" >&nbsp;&nbsp;<label>Number:</label><input type="text" name="num" size="1">
	</fieldset>

	<fieldset>
		<legend>General Information</legend>
		<label>GENDER:</label>
		<select name="gender">
		<option value="male">Male</option>
		<option value="female">Female</option>
		</select>
		<br></br>
		<label>CIVIL STATUS:</label>
		<select name="stat">
		<option value="single">Single</option>
		<option value="married">Married</option>
		</select>
		<br></br>
		<label>Name of Cooperative:</label> <input type="text" name="ncoop">
		<br></br>
		<label>Age:</label> <input type="text" name="age">
		<br></br>
		<label>Mobile Number:</label><input type="text" name="number">
		<br></br>
		<label>Email Address:</label><input type="text" name="eadd">
		<br></br>
		<label>Date of Birth:</label> <input type="date" name="dateofbirth">
		<br></br>
		<label> HOME ADDRESS:</label><input type="text" size="50" name="address1">

		<br></br>
		<label>PROVINCIAL ADDRESS:</label> <input type="text" size="50"name="address2">
		<br></br>
		<br></br>
		<br></br>
		
		<div class="button"><input type="submit" name="submit" value="SUBMIT">
		<INPUT type="button" value="Click" onClick="window.open('include/inc_search.php','windowname',' width=400,height=200', 'center')"></div>
	</fieldset>
</form>
