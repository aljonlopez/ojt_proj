<form action="process/pro_loan.php" method="post" method="get">
	<fieldset>
		<legend>Loan</legend>
		<?php
		require "config/db_config.php";
		$query = mysqli_query($link,"SELECT * FROM tbl_loan"); 
		while($row = mysqli_fetch_array($query)){   
			extract($row);
			echo"<label>Transaction Number:</label>&nbsp;&nbsp;&nbsp;<input disabled='true' type='hidden' type='text' name='tid' value=" . $row['transaction_ID'] . "><br></br>";
		}
		mysqli_close($link);

		?>
			
		<label>Member ID:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="memid" id="checking" onblur="checkmember"><br></br>
		<label>Date Loan Given:</label>&nbsp;&nbsp;&nbsp;<input type="date" name="dateloan"><br></br>
		<label>amountloan:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="amount" id="money"><br></br>
		<label>Term:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="term" id="t" onblur="myFunction()"><br></br>
		<label>Monthly Payment:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="month" id="difference"><br></br>
			
		<script>
			function checkmember(){
				var xa = document.getElementById("checking");
				var aa = document.getElementById("t");
				aa.value = xa.value;
			}
		</script>
			
		<script>	
			function myFunction() {
				var x = document.getElementById("money");
				var a = document.getElementById("t");
				var sum = document.getElementById("difference");
				$diff = x.value/a.value;
				sum.value = $diff;
			}
		</script>
		<input type="submit" value="SUBMIT">
	</fieldset>
</form>