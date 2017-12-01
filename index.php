<!DOCTYPE HTML>
	<head>
		<link href="testapp/assets/images/favicon.ico" rel="icon" type="image/x-icon" />
		<title>Cooperative ecommerce style</title>
		<?php 
			include "testapp/include/inc_header.php"; 
		?>
		<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/display.css" rel="stylesheet" type="text/css" media="all"/>
		
		<script>
			function test(value){
				window.location.href='testapp/index.php?g='+value;
			}
			function cat(val){
			
				window.location.href='category.php?cg='+val;
			}
		</script>
	</head>
	<body>
		<div class="wrap">
			<div class="header">
				<div class="headertop_desc">
					<div class="logo">
						<a href="index.php"><img src="testapp/assets/images/Logo-2a.png" width="420px;" height="57px;" alt="" /></a>
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
			</div>
			  
			<div id="menu_mobile1" class="header_bottom">
				<div class="menu">
					<nav class="men">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#" onClick="test('reg');">Register</a></li>
							<li ><a href="#" onClick="test('login');">Log In</a></li>
						</ul>
							
					</nav>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		
			<div class="header_slide">
				<div class="header_bottom_left">				
					<div class="categories">
						<ul>
							<h3>Categories</h3>
							<li>
								<table width="100%" >
									<tr>
										<td>
											<table width="150%">
												<tr>
													<td  style="border-bottom: 1px solid #EEE;" ><a href="#" onclick="cat('vegetable');"><img src="images/Veges-Icon.jpg"  style="margin:5px 0px 0px 35px;" height="50px;" alt="aa"/><br/><label style="margin-left:20px;">Vegetables</a></td>
												</tr>
												<tr>
													<td style="border-bottom: 1px solid #EEE;" ><a href="#" onClick="cat('cereal');"><img src="images/Cereal.jpg" width="50px;" style="margin:5px 0px 0px 35px;" height="50px;" alt="aa"><br/><label style="margin-left:30px;">Cereal</label></a></td>
												</tr>
												<tr>
													<td style="border-bottom: 1px solid #EEE;" ><a href="#" onClick="cat('meatpoultry');"><img src="images/Meat-Icon.jpg" width="50px;" style="margin:5px 0px 0px 35px;" height="50px;" alt="aa"><br/><label style="margin-left:10px;">Meat &amp; Poultry</label></a></td>
												</tr>
												<tr>
													<td style="border-bottom: 1px solid #EEE;"><a href="#" onClick="cat('herbal');"><img src="images/Herbal.jpg" width="50px;" style="margin:5px 0px 0px 35px;" height="50px;" alt="aa"><br/><label>Herbal Products</label></a></td>
												</tr>
											</table>
										</td>
										<td>
											<table width="100%">
												<tr>
													<td style="border-bottom: 1px solid #EEE;"><a href="#" onclick="cat('fruit');"><img src="images/Fruits-Icon.jpg" width="50px;" style="margin:5px 20px 0px 0px;" height="50px;" alt="aa"><br/><label >Fruits<label></a></td>
												</tr>
												<tr>
													<td style="border-bottom: 1px solid #EEE;"><a href="#" onClick="cat('seed');"><img src="images/Seeds.jpg" width="50px;" style="margin:5px 20px 0px 0px;" height="50px;" alt="aa"><br/><label>Seeds</label></a></td>
												</tr>
												<tr>
													<td style="border-bottom: 1px solid #EEE;"><a href="#" onClick="cat('flower');"><img src="images/Flowers.jpg" width="50px;" style="margin:5px 20px 0px 0px;" height="50px;" alt="aa"><br/><label>Flowers</label></a></td>
												</tr>
												<tr>
													<td><a href="#" onClick="cat('other product');"><img src="images/Other-Products.jpg" width="50px;" style="margin:5px 20px 0px 0px;" height="50px;" alt="aa"><label >Others Product</label></a></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</li>
							
						</ul>
					</div>							
				</div>
				<div align="center">
					<div class="header_bottom_right">					 
						<div class="slider">					     
							<div id="slider">
								<div id="mover">
									<div id="slide-1" class="slide">			                    
										<img src="images/Opt-1.png" class="img-responsive" alt="learn more" />									    
									</div>	
									<div class="slide">
										<img src="images/Opt-2.png" class="img-responsive" alt="learn more" />				
									</div>
									<div class="slide">						             	
										<img src="images/Opt-3.png" class="img-responsive" alt="learn more" />		
									</div>												
								</div>		
							</div>
							<div class="clear"></div>					       
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
	    
			<div class="container-fluid" >
				<div class="row" style="padding:1em;">
					<h3 class="bg-primary" style="color:#000;">All Products</h3>
				
				</div>
				<br/>
				<div class="row">
					<?php 
					require "testapp/config/db_config.php"; 
					$sql = mysqli_query($link,"SELECT * FROM tbl_productsell  where idpicture=idpicture "); 
					$ctr = 0;
					while($row=mysqli_fetch_array($sql)){
						$ctr= $ctr+1;
						$prod_id = $row[0];
						$valid = $row['validation'];
						if($valid == "approve"){ 
							?>
							<div class="col-md-3">
								<div style="border:thin solid #e5e5e5; padding:10px;" align="center">
									<img src="testapp/assets/images/<?php echo $row['prod_pname']; ?>" class="img-responsive"  style="height:212px; width:212px;" alt="" />
									<h4><?php echo trim($row['prod_name']); ?></h4>
										
									<form method="post" action="preview.php">
										<input type="hidden" name="idpic" value="<?php echo $row['idpicture'];?>"> 
										<input type="hidden" name="id" value="<?php echo $row['trans_no'];?>"> 
										<h4><input type="submit" class="btn btn-danger" value="View Details"></h4>
									</form>
									<div class="clear"></div>
								</div>
							</div>
							<?php	
									
							if(($ctr%4) == 0){
								echo '</div><br/><div class="row">';
							}

						}
					}
					?>	
				</div>
			</div>
		 
		   <div class="footer">
				<div class="copy_right">
						<p>Copyright &copy; 2016. All rights reserved. </p>
				   </div>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {			
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
			</script>
			<a href="#" id="toTop"><span id="toTopHover"> </span></a>
			<script>
			/* When the user clicks on the button, 
			toggle between hiding and showing the dropdown content */
			function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
			}

			// Close the dropdown if the user clicks outside of it
			window.onclick = function(event) {
			  if (!event.target.matches('.dropbtn')) {

				var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			  var openDropdown = dropdowns[i];
			  if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			  }
			}
		  }
			}
			</script>
		</div>
	</body>
</html>

