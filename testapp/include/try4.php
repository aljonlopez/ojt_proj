<?php
						
						$target_dir = "../assets/images/";
							$target_file = $target_dir . basename($_FILES["image"]["name"]);
									$uploadOk = 1;
									$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						if(isset($_POST['upload'])){
							$prodname = $_POST['prodname'];
							$proddesc = $_POST['proddesc'];
							$prodprice = $_POST['prodprice'];
							$date = date('Y-m-d');
							$memid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
							$fname = isset($_SESSION['mem_fname'])?$_SESSION['mem_fname']:'';
							$number = isset($_SESSION['mem_number'])?$_SESSION['mem_number']:'';

							
									// Check if image file is a actual image or fake image
									
										$check = getimagesize($_FILES["image"]["tmp_name"]);
										if($check !== false) {
											echo "File is an image - " . $check["mime"] . ".";
											$uploadOk = 1;
										} else {
											echo "File is not an image.";
											$uploadOk = 0;
										}
									
									// Check if file already exists
									if (file_exists($target_file)) {
										echo "Sorry, file already exists.";
										$uploadOk = 0;
									}
									// Check file size
									if ($_FILES["image"]["size"] > 5000000) {
										echo "Sorry, your file is too large.";
										$uploadOk = 0;
									}
									// Allow certain file formats
									if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
									&& $imageFileType != "gif" ) {
										echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
										$uploadOk = 0;
									}
									// Check if $uploadOk is set to 0 by an error
									if ($uploadOk == 0) {
										echo "Sorry, your file was not uploaded.";
									// if everything is ok, try to upload file
									} else {
										if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
											echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
											require "../config/db_config.php";
											$a = $target_file;
											
										$qry=mysqli_query($link,"INSERT INTO tbl_productsell(prod_name, prod_description, prod_price, user_name, user_number, date, prod_pname, mem_id) VALUES('$prodname','$proddesc','$prodprice','$fname','$number','$date','$a','$memid')");											
										
										} else {
											echo "Sorry, there was an error uploading your file.";
										}
}
								
								
								
								
													
								
							}
						
					?>