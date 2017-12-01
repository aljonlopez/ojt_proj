<?php
if (isset($_POST['num'])){
	$id = $_POST['num'];
}
unset($_POST['num']);

$bdate = explode(" ",getMemberInfo($id,'mem_dateofbirth')); 
$bdate = $bdate[0];
?>
<?php
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
}
unset($_SESSION['msg']);

?>

<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#validation").validationEngine();
	});
</script>
						
<div class="container" style="margin-top:3%; ">
		
		<div class="row">
			
			<div class="col-md-12 ">
			
				<div style="border:thin solid #e5e5e5; padding:0px 8px 8px 8px;  border-radius: 20px; background-color:#ebebe4;">
					
					<div class="row " style="padding: 0 0.5em 0.5 em 0.5em;" align="center">
						<h2 class="bg-primary input-lg" style="width:99%; padding:15px 0px 5px 0px; border-top-left-radius: 20px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-right-radius: 20px;margin-top:0px; background-color:#575ca9; ">Edit Information</h2>
					</div>
			<form  action="process/pro_edit.php" id="validation" name="myForm" method="post" enctype="multipart/form-data"> 
				<div class="form-inline form-group">
					<label>Last Name</label>
					<input type="text" name="lname" class="form-control input-lg" id="lname" style="margin-left:1%; margin-right:1%;" value="<?=getMembersInfo($id,'mem_lname')?>"required>
					<label>First Name</label>
					<input type="text" id="fname" name="fname" class="form-control input-lg" style="margin-left:1%; margin-right:1%;" value="<?=getMemberInfo($id,'mem_fname')?>"required>
					<label>Middle Name</label>
					<input type="text" name="mname" id="mname" class="form-control input-lg" style="margin-left:1%;" value="<?=getMemberInfo($id,'mem_mname')?>"required>
				</div>
				
				<div class="form-inline form-group ">
					<label>Gender</label>
					
					<select class="form-control input-lg " style="margin-left:3%; margin-right:13.5%;" name="gender" required>
                    	<option value="">select</option>
                        <option <?php if(getMemberInfo($id,'mem_gender') == 'male') echo 'selected';?>>male</option>
                        <option <?php if(getMemberInfo($id,'mem_gender') == 'female') echo 'selected';?>>female</option>
					</select>
					
					<label>Status</label>
					<select class="form-control input-lg" style="margin-left:3.5%; margin-right:13%;" name="stat" required>
						<option value="">select</option>
                        <option <?php if(getMemberInfo($id,'mem_status') == 'single') echo 'selected';?>>single</option>
                        <option <?php if(getMemberInfo($id,'mem_status') == 'married') echo 'selected';?>>married</option>
					</select>
					<label>cooperative</label>
					<select class="form-control input-lg" style="margin-left:1.5%;" name="ncoop" required>
						<option value="">select</option>
                        <option <?php if(getMemberInfo($id,'mem_cooperative') == 'aaa') echo 'selected';?>>aaa</option>
                        <option <?php if(getMemberInfo($id,'mem_cooperative') == 'bbb') echo 'selected';?>>bbb</option>
                        <option <?php if(getMemberInfo($id,'mem_cooperative') == 'ccc') echo 'selected';?>>ccc</option>
                        <option <?php if(getMemberInfo($id,'mem_cooperative') == 'ddd') echo 'selected';?>>ddd</option>
					</select>
				</div>
				<input type="hidden" value="<?=getMemberInfo($id,'mem_id')?>" name="num">
				<div style="border:1px solid #575ca9;">
				</div>
				<br/>
				<div class="form-group col-xs-4" id="pic" style="float:right;">
				
				<?php
				require "config/db_config.php";
				
				$sql=mysqli_query($link,"select mem_imagename from tbl_member where mem_id= $id");
				
				while($row=mysqli_fetch_array($sql)){
					if(empty($row['mem_imagename'])){
						?>
							<img name="image" id="output" src="assets/images/photoblank.png"  style="max-width: 160px; max-height: 120px; margin-right:90px;"/>
					<?php
					}else{
						?>
							<img name="image" id="output" src="assets/images/<?=getMemberInfo($id,"mem_imagename")?>"  style="max-width: 160px; max-height: 120px; margin-right:90px;"/>
					<?php
					}
				}
				
				?>
				<input type="file" id="image" name="image" accept="image/*" style="display:none;" onchange="loadFile(event)"/>
				<br/><br/><br/>
				<input type="button" value="upload" id="show" class="btn btn-primary"onclick="showhide(event)">
				</div>
				
				<div class="form-group">
					<span><label>Age:</label></span>
					<input type="text" name="age" class="form-control input-lg" style="width:65.50%;" placeholder="0" value="<?=getMemberInfo($id,'mem_age')?>" required></label>
				</div>
				
				<div class="form-group">
					<span><label>Mobile Number:</label></span>
					<input type="text" name="number" class="validate[required,custom[number]] form-control input-lg" style="width:65.50%;" placeholder="0" value="<?=getMemberInfo($id,'mem_number')?>"required></label>
				</div>
				
				
					
				<div class="form-group">
					<span><label>Email Address:</label></span>
					<input type="text" class="validate[required,custom[email]] form-control input-lg"  style="width:65.50%; text-transform:none;"  name="eadd" id="email" value="<?=getMemberInfo($id,'mem_email')?>"required></label>
				</div>
				
				<div class="form-group">
					<span><label>Date of Birth:</label></span>
					<input type="date" name="dateofbirth" class="form-control input-lg" style="width:65.50%;" value="<?php echo $bdate; ?>"required></label>
				</div>
				
				<div class="form-group">
					<span><label>Home Address:</label></span>
					<input type="text" name="address1" class="form-control input-lg" style="width:65.50%;" value="<?=getMemberInfo($id,'mem_homeaddress')?>"required></label>
				</div>
				
				<div class="form-group">
					<span><label>Provincial Address:</label></span>
					<input type="text" name="address2" class="form-control input-lg" style="width:65.50%;" value="<?=getMemberInfo($id,'mem_provaddress')?>"required></label>
				</div>
						
				<div class="form-group">
					<br/>
					<br/>
					<input type="submit" name="upload" style="width:25%;" class="btn btn-primary btn-lg btn-block" value="Save">
				</div>
				<script>
					var loadFile = function(event) {
					var output = document.getElementById('output');
					output.src = URL.createObjectURL(event.target.files[0]);
					//var txtimage = document.getElementById('imagename');
					//txtimage.value = imagetxt.value;
					//alert(txtimage.value);
					};
					var showhide = function(event){
						
						
						$("#image").show();
						$("#show").hide();
						
						
						
					}
				</script>
			</form> 
			</div>
		</div> 
	</div>
 </div>

