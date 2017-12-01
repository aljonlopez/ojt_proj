<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<link href="testapp/assets/images/favicon.ico" rel="icon" type="image/x-icon" />

<title>View Products</title>



<?php 
include "testapp/include/inc_header.php"; 


?>
<script>
		
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
		
	</script>
	<script>
function test(value){
	
	//$().redirect('index.php', {'post_var_1': 'login'});
	window.location.href='testapp/index.php?g='+value;
	
}

</script>
</head>
<body>

  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			
			<div class="logo">
				<a href="index.php"><img src="testapp/assets/images/FCMS.png" alt="" /></a>
			</div>
		</div>
		<div class="header_top">
			
			  
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
		
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#" onclick="test('reg');">Register</a></li>
					<li ><a href="#" onclick="test('login');">Log In</a></li>
				</ul>
	     	</div>
	     	<div class="clear"></div>
			
	     </div>	     	
   </div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
			<?php 
						require "testapp/config/db_config.php"; 
						$cg = addslashes($_GET['cg']); 
						
						$sql = mysqli_query($link,"SELECT * FROM tbl_productsell where category='$cg' and idpicture=idpicture limit 1"); 
						while($row=mysqli_fetch_array($sql)){
							
							?>
    		<h3><?php echo $row[9]; ?>S&nbsp;Products</h3>
			<?php
						}
			?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			
					<?php 
						require "testapp/config/db_config.php"; 
						$cg = addslashes($_GET['cg']); 
						
						$sql = mysqli_query($link,"SELECT * FROM tbl_productsell where category='$cg' and idpicture=idpicture "); 
						while($row=mysqli_fetch_array($sql)){
							
							?>
					<div class="grid_1_of_4 images_1_of_4">
						
					 <a href="preview.html"><img src="testapp/assets/images/<?php echo $row['prod_pname']; ?>" height="210px;" alt="" /></a>
						
					 <h2><?php echo $row['prod_name']; ?></h2>
					<div class="price-details">
				           		<div class="add-cart">	
									<form method="post" action="preview.php">
									<input type="hidden" name="idpic" value="<?php echo $row['idpicture'];?>"> 
									<input type="hidden" name="id" value="<?php echo $row['trans_no'];?>"> 
									<h4><input type="submit" style="border:0px; height:25px; color:white; background:red;"value="View Details"></h4>
									</form>
								</div>
							 <div class="clear"></div>
					</div>
					 
				</div>
				<?php
					}
				?>
				
				
				
				<div class="clear"></div>
			</div>
			</div>
			</div>
   <div class="footer">
   	  
        <div class="copy_right">
				<p>&copy; 2016. All rights reserved.</p>
		   </div>
    </div>
   <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

