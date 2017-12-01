
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
			
			<div class="col-md-6 col-md-offset-3">
			
				<div style="border:thin solid #e5e5e5; padding:0px 8px 8px 8px;  border-radius: 20px; background-color:#ebebe4;">
					
					<div class="row " style="padding: 0 0.5em 0.5 em 0.5em;" align="center">
						<h2 class="bg-primary" style="width:98%; border-top-left-radius: 20px; border-top-right-radius: 20px;margin-top:0px; background-color:#575ca9; height:10%;">View Product</h2>
					</div>
			<form action="process/pro_upload.php" id="validation" name="myForm" method="post" enctype="multipart/form-data"> 
				<p></p>
				<img name="image" id="output" src="assets/images/<?=getProductInfo($id,'prod_pname')?>"  style="max-width: 160px; max-height: 120px; float:right; margin-right:90px;"/>
				
				<div class="form-group">
					<span><label>Product Name:</label></span>
						<input type="text" name="age" class="haha input-lg" style="width:65.50%;" placeholder="0" value="<?=getProductInfo($id,'prod_name')?>" readonly></label>
				</div>
				
				<div class="form-group">
					<span><label>Product Description:</label></span>
					<textarea rows="5" cols="40" name="number" class="haha input-lg" style="width:65.50%;"readonly><?=getProductInfo($id,'prod_description')?></textarea>
				</div>
				
				<div class="form-group">
					<span><label>Username:</label></span>
					<input type="text" class="haha input-lg"  style="width:65.50%; text-transform:none;"  name="eadd" id="email" value="<?=getProductInfo($id,'user_name')?>"readonly></label>
				</div>
				
				<div class="form-group">
					<span><label>User Number:</label></span>
					<input type="text" name="dateofbirth" class="haha input-lg" style="width:65.50%;" value="<?=getProductInfo($id,'user_number')?>"readonly></label>
				</div>
				
				<div class="form-group">
					<span><label>Date Posted:</label></span>
					<input type="text" name="address1" class="haha input-lg" style="width:65.50%;" value="<?=getProductInfo($id,'date')?>"readonly></label>
				</div>
				
				<div class="form-group">
					<span><label>Member Id:</label></span>
					<input type="text" name="address2" class="haha input-lg" style="width:65.50%;" value="<?=getProductInfo($id,'mem_id')?>"readonly></label>
				</div>
				<div class="form-group">
					<span><label>Status:</label></span>
					<input type="text" name="address2" class="haha input-lg" style="width:65.50%;" value="<?=getProductInfo($id,'validation')?>"readonly></label>
				</div>
				<div class="form-group">
					<span><label>Category:</label></span>
					<input type="text" name="address2" class="haha input-lg" style="width:65.50%;" value="<?=getProductInfo($id,'category')?>"readonly></label>
				</div>
						
					<input type="hidden" value="<?=getProductInfo($id,'trans_no')?>" name="id">
					<br/>
					<br/>
					<input type="submit" name="app" style="width:25%; margin-left:25%;" class="btn btn-primary btn-lg btn-block" value="Approve"><input type="submit" name="dec" style="width:25%; margin-left:5px;" class="btn btn-primary btn-lg btn-block" value="Decline">
					<br/>
					<br/>					
					<input type="hidden" value="<?=getProductInfo($id,'mem_id')?>" name="num">
					</form>
					
				<script>
					var loadFile = function(event) {
					var output = document.getElementById('output');
					output.src = URL.createObjectURL(event.target.files[0]);
										
					};
					
				</script>
				</div>
		</div> 
	</div>
 </div>

