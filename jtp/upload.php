<?php 
include "base.php"; 
?>  

<?php
# include "SimpleImage.php" --> now obsolete file (should be deleted)
include('class.upload.php'); # use class.upload library (http://www.verot.net/php_class_upload.htm)
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('core/head.php'); ?>

<body>

	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
        <!-- Header -->
        <div id="da-header">
        
            <?php include('core/header-top.php'); ?>

                <!-- Container -->
            </div>
            <div id="da-header-top">
                <!-- Container -->
                <?php include('core/header.php'); ?>
            </div>
            
            <div id="da-header-bottom">
                <!-- Container -->
                <div class="da-container clearfix">
                
                 	
                    <!-- Breadcrumbs -->
                    <div id="da-breadcrumb">
                        <ul>
                            <li class="active"><a href="index.php">Upload Item!</a></li>
		                    <a style="font-family: 'Calibri', sans-serif; float:right; padding-top:7px">jorgestradingpost@gmail.com</a>

                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    
        <!-- Content -->
        <div id="da-content">
            
            <!-- Container -->
            <div class="da-container clearfix">
                
	            <!-- Sidebar Separator do not remove -->
                <div id="da-sidebar-separator"></div>
                
                <!-- Sidebar -->
                <div id="da-sidebar">
                    
                <!-- sidebar navigation -->
                <?php include('core/navigation.php'); ?>  
                    
                </div>
                
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                    <div class="grid_2">
                    	<div class="da-panel">
                        	<div class="da-panel-header-items">
                            	<span class="da-panel-title">
                                    
                                    Upload your item!
                                </span>
                            </div>
							<?php
							# Initialize fields
							$username = "";
							$itemName = "";
							$description = "";
							$price = "";
							$showForm = True;

							if(isset($_POST['submit'])) {
								# Handle errors
								$errors = Array(""); # Start with a blank array of no errors
								if (empty($_POST['username'])) { array_push($errors, "Your email is blank"); } # for each error, append the error to the array
								if (empty($_POST['itemName'])) { array_push($errors, "You don't have an item name"); }
								if (!is_uploaded_file($_FILES['pic']['tmp_name'][0])) { array_push($errors, "You must have at least one picture"); }
								if (empty($_POST['description'])) { array_push($errors, "You must include an item description"); }
								if (empty($_POST['price'])) { array_push($errors, "You must list the price of your item"); }
								else if (!preg_match('/^[0-9]+$/', $_POST['price'])) { array_push($errors, "The price must be numeric"); }

								# catch user data and sanitize it for security (don't want SQL injections or other exploits...)
								$username = mysql_real_escape_string(htmlentities(trim($_POST['username']), ENT_NOQUOTES));
								$itemName = mysql_real_escape_string(htmlentities(trim($_POST['itemName']), ENT_NOQUOTES));
								$description = mysql_real_escape_string(htmlentities(trim($_POST['description']), ENT_NOQUOTES));
								$price = mysql_real_escape_string(htmlentities(trim($_POST['price']), ENT_NOQUOTES));

								# Print error (function, so we can call it when we want)
								function print_errors($errors) {
									echo '<div id="errors">'; # feel free to do some custom CSS with this
								  	echo "<p>Your item was not posted because";
								  	if (count($errors) == 2) { 					# if only one error
								   		echo " <b>" . strtolower($errors[1]) . ".</b></p>"; # print as text
								   	}
								   	else { # if multiple errors, print as list
								      echo ":";
								      echo "<ul>";
								      foreach (array_slice($errors, 1) as $error) {
								       	echo "<li>$error.</li>";
								      }
								      echo "</ul>";
								    }
								    echo "</div>";
								 }

								if (count($errors) > 1) { print_errors($errors); } # if there are any errors (not counting the first which is blank), print them
								else { # Otherwise, if no errors, continue to execute the script
								
									# as it is multiple uploads, we will parse the $_FILES array to reorganize it into $files
								    $files = array();
								    foreach ($_FILES['pic'] as $k => $l) {
								        foreach ($l as $i => $v) {
								            if (!array_key_exists($i, $files)) {
								                $files[$i] = array();
								            }
								            $files[$i][$k] = $v;
								        }
								    }

								    $j = 0; # counter used to index files
								    $imgname = Array("", "", "", "");
								    foreach ($files as $myFile) { #loop through files

								    	if ($j >= 4) { #prevents people from uploading more than four files somehow
								            array_push($errors, "Four image limit exceeded.");  # push the error into the array
								            print_errors($errors); 								# print the errors
								            exit; 												# and stop the script
								        }

									    # verify the file is a GIF, JPEG, or PNG
								        # this is pretty minimal security and should be upgraded later, but is fine for now.
								        if (is_uploaded_file($myFile["tmp_name"])) {
								            $fileType = exif_imagetype($myFile["tmp_name"]);
								            $allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
								            if (!in_array($fileType, $allowed)) {
								                array_push($errors, "You can only upload images (.gif, .jpg, or .png).");   # push the error into the array
								            	print_errors($errors); 														# print the errors
								            	exit; 																		# and stop the script
								            }
								        }

									    # now to upload the file
									    # we create an instance of the class, giving as argument the PHP object
									    # corresponding to the file field from the form
									    # All the uploads are accessible from the PHP object $_FILES
									    $handle = new Upload($myFile);

									    # then we check if the file has been uploaded properly in its *temporary* location in the server (often, it is /tmp)
									    if ($handle->uploaded) {
									    	$imgname[$j] = date("YmdHis") . rand(10000,99999); # give the image the desired file name
									        $handle->file_new_name_body = $imgname[$j];
									        $handle->image_convert = "jpg"; # make it into a jpg

									        # now, we start the upload 'process'. That is, to copy the uploaded file from its temporary location to the wanted location
									        # we'll push the file to the folder images/itemImages/
									        $handle->Process("images/itemImages/");

									        # now to create the thumbnail
									        $handle -> image_resize = true;     # turn on resize engine
									        $handle -> image_x = 300;   		# scale x to thumbnail width
									        $handle -> image_ratio_y = true;    # scale y to match ratio with new width
									        $handle->image_convert = "jpg"; 		# make it into a jpg
									        $handle -> file_new_name_body = $imgname[$j];
									        $handle -> Process("images/itemImages/thumb/");           # make image and put it in the thumbnail directory

									        $handle-> Clean(); # we delete the temporary files

									        }
									        $j++; #increment counter
									    }

									$price = number_format($price);
									$categoriesAcc = array('glasses','hat','scarf','belt','gloves','tech');
									$categoriesShoes=array('sandals','heels','boots','flats','sneakers','oxfords','slippers');
									$categoriesClothing=array('dress','sweater','top','outwear','pants','jeans','skirt','shorts','sweatshirt','blazer');
									$categoriesBag=array('handbag','backpack','wallet','luggage','messenger','makeup');
									$categoriesJew=array('necklace','bracelet','earrings','ring');
									$categoriesBook=array('textbook','book');
									$categoriesDorm=array('dorm','other');
									$categoryFound=0;
									$categoriesChosen=array();
									
									foreach($categoriesAcc as $acc){
										if(isset($_POST[$acc])){
											if($categoryFound==0){
												$categoryFound=1;
												array_unshift($categoriesChosen, 'accessories');
											}
											array_push($categoriesChosen,$acc);
											// echo $acc;
										}
									}
									if($categoryFound==0){
										foreach($categoriesShoes as $shoes){
											if(isset($_POST[$shoes])){
												if($categoryFound==0){
												
													$categoryFound=1;
													array_unshift($categoriesChosen, 'shoes');
												}
												array_push($categoriesChosen,$shoes);
												// echo $shoes;
											}
										}
									}
									if($categoryFound==0){
										
										foreach($categoriesClothing as $cloth){
											if(isset($_POST[$cloth])){
												if($categoryFound==0){
												
													$categoryFound=1;
													array_push($categoriesChosen, 'clothing');
													// echo "vardump";
													// var_dump($categoriesChosen);
													
												}
												array_push($categoriesChosen,$cloth);
												// echo $cloth;
											}
										}
									}
									if($categoryFound==0){
									
										foreach($categoriesBag as $bag){
											if(isset($_POST[$bag])){
												if($categoryFound==0){
													$categoryFound=1;
													array_unshift($categoriesChosen, 'bags');
												}
												array_push($categoriesChosen,$bag);
												// echo $bag;
											}
										}
									}
									if($categoryFound==0){
										foreach($categoriesJew as $jew){
											if(isset($_POST[$jew])){
												if($categoryFound==0){
													$categoryFound=1;
													array_unshift($categoriesChosen, 'jewelry');
												}
												array_push($categoriesChosen,$jew);
												// echo $jew;
											}
										}
									}
									if($categoryFound==0){
									
										foreach($categoriesBook as $book){
											if(isset($_POST[$book])){
												if($categoryFound==0){
													$categoryFound=1;
													array_unshift($categoriesChosen, 'books');
												}
												array_push($categoriesChosen,$book);
												// echo $book;
											}
										}
									}
									if($categoryFound==0){
										foreach($categoriesDorm as $dorm){
											if(isset($_POST[$dorm])){
												if($categoryFound==0){
												
													$categoryFound=1;
													array_unshift($categoriesChosen, 'dorm');
													
												}
												array_push($categoriesChosen,$dorm);
												// echo $dorm;
											}
										}
									}
									
									$negotiable=0;
									if(isset($_POST['negotiable'])){
										$negotiable=1;
										// echo" negotiable";
									}

									$categoriesChosenjq='';
									for($i = 1; $i < count($categoriesChosen); $i++){
										$categoriesChosenjq=$categoriesChosenjq.$categoriesChosen[$i].',';
									}

									if (!empty($categoriesChosen[0])) {
										if($categoriesChosen[0] == 'accessories' || $categoriesChosen[0] == 'shoes') { $category_type = 'accessories'; }
										else { $category_type = $categoriesChosen[0]; }
									}
									else { $category_type = ""; } #no category specified by user

									$registerquery = mysql_query("INSERT INTO items (Fuser, Fname, Fp1, Fp2, Fp3, Fp4, Fdescription, Fprice, Fnegotiable, Fcat, Ftypebook) VALUES('".$username."', '".$itemName."', '".$imgname[0]."', '".$imgname[1]."', '".$imgname[2]."', '".$imgname[3]."', '".$description."', '".$price."', '".$negotiable."', '" . $category_type . "','".$categoriesChosenjq."')");	
							     	if($registerquery) {
										echo "<h1>Success</h1>";
										echo "<p>Your item is now listed on Jorge's Trading Post!</p>";
									}
									else {
							     		echo "<h1>Error</h1>";
										echo "<p>Oooops... Something went wrong. Your item is not successfully listed.</p>";
										die('Invalid query: ' . mysql_error());    	
				     				}
				     				$showForm = False;
								}
							}
							if ($showForm == True) { # you want the form shown with erorrs and by default, but not on successful submission
								?>

                            <div class="da-panel-content">
                            	<form id="da-ex-validate3" class="da-form" action="upload.php" method="post" name="uploadItem" enctype="multipart/form-data">
	                            	<div id="da-ex-val2-error" class="da-message error" style="display:none;"></div>
    
                                    <div class="da-form-inline">
                                        <div class="da-form-row">
                                            <label>Your MHC email <span class="required">*</span></label>
                                            <div class="da-form-item small">
												<input type="text" name="username" id="username" value = "<? echo $username; ?>"/>@mtholyoke.edu
                                                <label for="gender" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Item name<span class="required">*</span></label>
                                            <div class="da-form-item large">
												<input type="text" name="itemName" id="itemName"  value = "<? echo $itemName; ?>"/>
                                                <label for="itemName" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Picture 1(The size of all pictures combined cannot exceed 8MB) <span class="required">*</span></label>
                                            <div class="da-form-item large">
	                                        	<span class="formNote">You can upload the following formats: jpg, jpeg, png, gif</span>
	
                                            	<input type="file" id="pic1" name="pic[]" class="da-custom-file" />
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Picture 2 (optional) </label>
                                            <div class="da-form-item large">
                                            	<input type="file" id="pic2" name="pic[]" class="da-custom-file" />
                                                <label for="pic2" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Picture 3 (optional)</label>
                                            <div class="da-form-item large">
                                            	<input type="file" id="pic3" name="pic[]" class="da-custom-file" />
                                                <label for="pic3" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Picture 4 (optional)</label>
                                            <div class="da-form-item large">
                                            	<input type="file" id="pic4" name="pic[]" class="da-custom-file" />
                                                <label for="pic4" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                    	<div class="da-form-row">
                                        	<label>Item Description<span class="required">*</span></label>
                                            <div class="da-form-item large">
                                            	<span class="formNote">Size, color, conditions and brand (optional), etc.</span>
                                            	<textarea id="description" name="description" rows="auto" cols="auto"><? echo $description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Item Price (Please only enter numbers) <span class="required">*</span></label>
                                            <div class="da-form-item small">
												$<input type="text" name="price" id="price" value = "<? echo $price; ?>"/><br>
                                            	<ul class="da-form-list">
                                                	<li><input type="checkbox" id="negotiable" name="negotiable" /> <label>Negotiable</label></li>
                                                </ul>
                                            	
                                                <label for="price" class="error" generated="true" style="display:none;"></label>

                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Category <br>(Please choose from only ONE large category, but you can choose more than one sub-category.)<span class="required">*</span></label>
                                            <div class="da-form-item large">
												<h2>Accessories</h2>
                                            	<ul class="da-form-list">
                                                	<li><input type="checkbox" name="glasses" /> <label>Glasses</label></li>
                                                	<li><input type="checkbox" name="hat" /> <label>Hat</label></li>
                                                	<li><input type="checkbox" name="scarf" /> <label>Scarf</label></li>
                                                	<li><input type="checkbox" name="belt" /> <label>Belt</label></li>
                                                	<li><input type="checkbox" name="gloves" /> <label>Gloves</label></li>
                                                	<li><input type="checkbox" name="tech" /> <label>Tech</label></li>
                                                </ul><br>
												<h2>Shoes</h2>

                                            	<ul class="da-form-list">
	
                                                	<li><input type="checkbox" name="sandals" /> <label>Sandals</label></li>
                                                	<li><input type="checkbox" name="heels" /> <label>Heels</label></li>
                                                	<li><input type="checkbox" name="boots" /> <label>Boots</label></li>
                                                	<li><input type="checkbox" name="flats" /> <label>Flats</label></li>
                                                	<li><input type="checkbox" name="sneakers" /> <label>Sneakers</label></li>
                                                	<li><input type="checkbox" name="oxfords" /> <label>Oxfords</label></li>
                                                	<li><input type="checkbox" name="slippers" /> <label>Slippers</label></li>
                                                </ul><br>
												<h2>Clothing</h2>

                                            	<ul class="da-form-list">
                                                	<li><input type="checkbox" name="dress" /> <label>Dress</label></li>
                                                	<li><input type="checkbox" name="top" /> <label>Top</label></li>
                                                	<li><input type="checkbox" name="outwear" /> <label>Outwear</label></li>
                                                	<li><input type="checkbox" name="sweater" /> <label>Sweater</label></li>
                                                	<li><input type="checkbox" name="pants" /> <label>Pants</label></li>
                                                	<li><input type="checkbox" name="jeans" /> <label>Jeans</label></li>
                                                	<li><input type="checkbox" name="skirt" /> <label>Skirt</label></li>
                                                	<li><input type="checkbox" name="shorts" /> <label>Shorts</label></li>
                                                	<li><input type="checkbox" name="sweatshirt" /> <label>Sweatshirt</label></li>
                                                	<li><input type="checkbox" name="blazer" /> <label>Blazer</label></li>
                                                 </ul><br>
												<h2>Bags</h2>

                                            	<ul class="da-form-list">

                                                	<li><input type="checkbox" name="handbag" /> <label>Handbag</label></li>
                                                	<li><input type="checkbox" name="backpack" /> <label>Backpack</label></li>
                                                	<li><input type="checkbox" name="wallet" /> <label>Wallet</label></li>
                                                	<li><input type="checkbox" name="luggage" /> <label>Luggage</label></li>
                                                	<li><input type="checkbox" name="messenger" /> <label>Messenger</label></li>
                                                	<li><input type="checkbox" name="makeup" /> <label>Makeup</label></li>
                                                </ul><br>
												<h2>Jewelry</h2>

                                            	<ul class="da-form-list">

                                                	<li><input type="checkbox" name="necklace" /> <label>Necklace</label></li>
                                                	<li><input type="checkbox" name="bracelet" /> <label>Bracelet</label></li>
                                                	<li><input type="checkbox" name="earrings" /> <label>Earrings</label></li>
                                                	<li><input type="checkbox" name="ring" /> <label>Ring</label></li>
                                                </ul><br>
												<h2>Books</h2>

                                            	<ul class="da-form-list">

                                                	<li><input type="checkbox" name="textbook" /> <label>Textbooks</label></li>
                                                	<li><input type="checkbox" name="book" /> <label>General books</label></li>

                                                </ul><br>
												<h2>Dorm & others</h2>

                                            	<ul class="da-form-list">

                                                	<li><input type="checkbox" name="dorm" /> <label>Dorm Stuff</label></li>
                                                	<li><input type="checkbox" name="other" /> <label>Everything Else</label></li>

                                                </ul><br>
	                                        </div>

                                        </div>
										<div class="da-form-row">

										<center>
										<input class="da-button gray" type="submit" name="submit" id="submit" value="Upload Now" />
										<p>&nbsp;</p>
										<p>Your item will be uploaded once this button is clicked. Please contact us for any corrections or if you have sold the item. Jorge's Trading Post reserves the right to delete inappropriate items.</p>
										</center>
										</div>
                                    </div>
                                </form>
                            </div>
							<?php
						}
						?>
						</div>
                    </div>
                	
                
                </div>
                
            </div>
            
        </div>
        
        <div id="da-content">
        </div>

        <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        <!-- Footer -->
        <div id="da-footer">
            <?php include('core/footer.php'); ?>
        </div>
        
    </div>
    
</body>
</html>
