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
require "testapp/config/db_config.php";
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
				<a href="index.html"><img src="testapp/assets/images/FCMS.png" alt="" /></a>
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
					<li><a href="#" onClick="test('reg');">Register</a></li>
					<li ><a href="#" onClick="test('login');">Log In</a></li>
				</ul>
	     	</div>
	     	<div class="clear"></div>
			
	     </div>	     	
   </div>
 <div class="main">
    <div class="content">
    	
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">
								<div class="slides_container">
									
									<?php
									require "testapp/config/db_config.php";
									extract($_POST);
									$id = $_POST['id'];
									$idpic = $_POST['idpic'];

									$qry = mysqli_query($link,"select * from tbl_imageupload where idpicture=$idpic");
									while($row=mysqli_fetch_array($qry)){
									
									?>
									<a href="#" target="_blank"><img src="testapp/assets/images/<?php echo $row['image']; ?>" alt=" " /></a>
									
									<!--<a href="#" target="_blank"><img src="images/productslide-2.jpg" alt=" " /></a>
									<a href="#" target="_blank"><img src="images/productslide-3.jpg" alt=" " /></a>					
									<a href="#" target="_blank"><img src="images/productslide-4.jpg" alt=" " /></a>
									<a href="#" target="_blank"><img src="images/productslide-5.jpg" alt=" " /></a>
									<a href="#" target="_blank"><img src="images/productslide-6.jpg" alt=" " /></a>-->
									
									<?php
									}
									?>
									
								</div>
								
								<ul class="pagination">
								
									<?php
									require "testapp/config/db_config.php";
									extract($_POST);
									$id = $_POST['id'];
									$idpic = $_POST['idpic'];
									
									$qry = mysqli_query($link,"select * from tbl_imageupload where idpicture=$idpic");
									while($row=mysqli_fetch_array($qry)){
									
									?>
									<li><a href="#"><img src="testapp/assets/images/<?php echo $row['image']; ?>" alt=" " /></a></li>
									<?php
									}
									?>
									
									<!--<li><a href="#"><img src="images/thumbnailslide-2.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-3.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-4.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-5.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-6.jpg" alt=" " /></a></li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2">
					<?php
					require "testapp/config/db_config.php";
					extract($_POST);
					$id = $_POST['id'];
					
					$qry = mysqli_query($link,"select * from tbl_productsell where trans_no=$id");
					while($row=mysqli_fetch_array($qry)){
					
					?>
					<h2>Product Name:&nbsp;<?php echo $row[1]; ?></h2>
					<p>Description:</p>
                    <p><?php echo $row[2]; ?>.</p>
					<p>Posted By: <?php echo $row[3];?></p>
					<p>Mobile Number:</p>
					<p><?php echo $row[4]; ?></p>
					<?php
					}
					?>
					<br/>
					<div class="available">
					
					</div>
				
				 
			</div>
			<div class="clear"></div>
		  </div>
		
	 
	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>		
   
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

