<?php 
include "base.php"; 
?>  

<?php include "SimpleImage.php" ?>

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
							// if($_POST['submit']){
							// 															echo "<pre>";
							// 															var_dump($_POST);
							// 															var_dump($_FILES);
							// 														}
							if($_POST['submit'] && !empty($_POST['username']) && !empty($_POST['itemName']) && !empty($_FILES['pic1']) && !empty($_POST['description'])&& !empty($_POST['price']))
							{
								
								
								
								
								//file handling
								$allowedExts = array("gif", "jpeg", "jpg", "png","JPG");
								$fileNameArray=array();
								for ($i=1; $i<=4; $i++){
									$picNum="pic".$i;
									// echo count($_FILES[$picNum]["name"]);
									if(is_uploaded_file($_FILES[$picNum]['tmp_name'])){
										$extension = pathinfo($_FILES[$picNum]["name"]);
										$filename='';
										// echo $extension["extension"];
										// echo $picNum;
										// var_dump($_FILES[$picNum]);
										
										if ((($_FILES[$picNum]["type"] == "image/gif")
										|| ($_FILES[$picNum]["type"] == "image/jpeg")
										|| ($_FILES[$picNum]["type"] == "image/JPEG")
										|| ($_FILES[$picNum]["type"] == "image/GIF")
										|| ($_FILES[$picNum]["type"] == "image/PNG")
										|| ($_FILES[$picNum]["type"] == "image/jpg")
										|| ($_FILES[$picNum]["type"] == "image/JPG")
										|| ($_FILES[$picNum]["type"] == "image/png"))
										&& in_array($extension["extension"], $allowedExts))
										{
											if ($_FILES[$picNum]["error"] > 0)
										    {
										    	echo "Error: " . $_FILES[$picNum]["error"] . "<br>";
										    }
										  	else
										    {

										    	//
										    	
										    	
										    	//

										    	// echo "Upload: " . $_FILES[$picNum]["name"] . "<br>";
										    	// echo "Type: " . $_FILES[$picNum]["type"] . "<br>";
										    	// echo "Size: " . ($_FILES[$picNum]["size"] / 1024) . " kB<br>";
												$filename=date("YmdHis") . rand(10000,99999).".".$extension["extension"];
												// echo "new file name: " .$filename;
												if (file_exists("images/itemImages/" . $filename))
												{
													echo "images/itemImages/" . $filename . " already exists. ";
												}
												else
												{
													$namewithoutExt = preg_replace("/\\.[^.\\s]{3,4}$/", "", $filename);
													// echo $namewithoutExt.'.jpg';
													
												   	if(move_uploaded_file($_FILES[$picNum]["tmp_name"],
												    	"images/itemImages/" . $filename)==TRUE){
												    		// echo "Stored in: " . "images/itemImages/" . $filename;
															array_push($fileNameArray,$filename);
													}
													if (!copy(	"images/itemImages/" . $filename, 	"images/itemImages/thumb/" . $namewithoutExt.'.jpg')) {
													    // echo "failed to copy thumb...\n";
													}
												}
										    }
										}
										else
										{
										  	echo "Invalid file";
										}
									}
								}
								
								$username = mysql_real_escape_string($_POST['username']);
								$itemName = mysql_real_escape_string($_POST['itemName']);
								$description = mysql_real_escape_string($_POST['description']);
								$price = number_format($_POST['price']);
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
								// 
								// echo $username;
								// echo $itemName;
								// echo $pic2;
								// echo $pic3;
								// echo $pic4;
								// echo $description;
								// echo $price;
								$categoriesChosenjq='';
								for($i = 1; $i < count($categoriesChosen); $i++){
									$categoriesChosenjq=$categoriesChosenjq.$categoriesChosen[$i].',';
								}
								if($categoriesChosen[0] == 'accessories'){
									$registerquery = mysql_query("INSERT INTO items (Fuser, Fname, Fp1, Fp2, Fp3, Fp4, Fdescription, Fprice, Fnegotiable, Fcat, Ftypeacc) VALUES('".$username."', '".$itemName."', '".$fileNameArray[0]."', '".$fileNameArray[1]."', '".$fileNameArray[2]."', '".$fileNameArray[3]."', '".$description."', '".$price."', '".$negotiable."', 'accessories','".$categoriesChosenjq."')");	
						     		if($registerquery)
									{
										echo "<h1>Success</h1>";
										echo "<p>Your item is now listed on Jorge's Trading Post!</p>";
									}
									else
									{
						     			echo "<h1>Error</h1>";
										echo "<p>Oooops... Something went wrong. Your item is not successfully listed.</p>";
						
									    die('Invalid query: ' . mysql_error());
									}    	
			     				}
								if($categoriesChosen[0] == 'shoes'){
									$registerquery = mysql_query("INSERT INTO items (Fuser, Fname, Fp1, Fp2, Fp3, Fp4, Fdescription, Fprice, Fnegotiable, Fcat, Ftypeshoes) VALUES('".$username."', '".$itemName."', '".$fileNameArray[0]."', '".$fileNameArray[1]."', '".$fileNameArray[2]."', '".$fileNameArray[3]."', '".$description."', '".$price."', '".$negotiable."', 'shoes','".$categoriesChosenjq."')");	
						     		if($registerquery)
									{
										echo "<h1>Success</h1>";
										echo "<p>Your item is now listed on Jorge's Trading Post!</p>";
									}
									else
									{
						     			echo "<h1>Error</h1>";
										echo "<p>Oooops... Something went wrong. Your item is not successfully listed.</p>";
						
									    die('Invalid query: ' . mysql_error());
									}    	
			     				}
								if($categoriesChosen[0] == 'clothing'){
									$registerquery = mysql_query("INSERT INTO items (Fuser, Fname, Fp1, Fp2, Fp3, Fp4, Fdescription, Fprice, Fnegotiable, Fcat, Ftypeclothing) VALUES('".$username."', '".$itemName."', '".$fileNameArray[0]."', '".$fileNameArray[1]."', '".$fileNameArray[2]."', '".$fileNameArray[3]."', '".$description."', '".$price."', '".$negotiable."','clothing','".$categoriesChosenjq."')");	
						     		if($registerquery)
									{
										echo "<h1>Success</h1>";
										echo "<p>Your item is now listed on Jorge's Trading Post!</p>";
									}
									else
									{
										echo "in clothing";
						     			echo "<h1>Error</h1>";
										echo "<p>Oooops... Something went wrong. Your item is not successfully listed.</p>";
						
									    die('Invalid query: ' . mysql_error());
									}    	
			     				}
								if($categoriesChosen[0] == 'bags'){
									$registerquery = mysql_query("INSERT INTO items (Fuser, Fname, Fp1, Fp2, Fp3, Fp4, Fdescription, Fprice, Fnegotiable, Fcat, Ftypebags) VALUES('".$username."', '".$itemName."', '".$fileNameArray[0]."', '".$fileNameArray[1]."', '".$fileNameArray[2]."', '".$fileNameArray[3]."', '".$description."', '".$price."', '".$negotiable."','bags','".$categoriesChosenjq."')");	
						     		if($registerquery)
									{
										echo "<h1>Success</h1>";
										echo "<p>Your item is now listed on Jorge's Trading Post!</p>";
									}
									else
									{
						     			echo "<h1>Error</h1>";
										echo "<p>Oooops... Something went wrong. Your item is not successfully listed.</p>";
						
									    die('Invalid query: ' . mysql_error());
									}    	
			     				}
								if($categoriesChosen[0] == 'jewelry'){
									$registerquery = mysql_query("INSERT INTO items (Fuser, Fname, Fp1, Fp2, Fp3, Fp4, Fdescription, Fprice, Fnegotiable, Fcat, Ftypejewelry) VALUES('".$username."', '".$itemName."', '".$fileNameArray[0]."', '".$fileNameArray[1]."', '".$fileNameArray[2]."', '".$fileNameArray[3]."', '".$description."', '".$price."', '".$negotiable."', 'jewelry','".$categoriesChosenjq."')");	
						     		if($registerquery)
									{
										echo "<h1>Success</h1>";
										echo "<p>Your item is now listed on Jorge's Trading Post!</p>";
									}
									else
									{
						     			echo "<h1>Error</h1>";
										echo "<p>Oooops... Something went wrong. Your item is not successfully listed.</p>";
						
									    die('Invalid query: ' . mysql_error());
									}    	
			     				}
								if($categoriesChosen[0] == 'dorm'){
									$registerquery = mysql_query("INSERT INTO items (Fuser, Fname, Fp1, Fp2, Fp3, Fp4, Fdescription, Fprice, Fnegotiable, Fcat, Ftypedorm) VALUES('".$username."', '".$itemName."', '".$fileNameArray[0]."', '".$fileNameArray[1]."', '".$fileNameArray[2]."', '".$fileNameArray[3]."', '".$description."', '".$price."', '".$negotiable."','dorm','".$categoriesChosenjq."')");	
						     		if($registerquery)
									{
										echo "<h1>Success</h1>";
										echo "<p>Your item is now listed on Jorge's Trading Post!</p>";
									}
									else
									{
						     			echo "<h1>Error</h1>";
										echo "<p>Oooops... Something went wrong. Your item is not successfully listed.</p>";
						
									    die('Invalid query: ' . mysql_error());
									}    	
			     				}
								if($categoriesChosen[0] == 'books'){
									$registerquery = mysql_query("INSERT INTO items (Fuser, Fname, Fp1, Fp2, Fp3, Fp4, Fdescription, Fprice, Fnegotiable, Fcat, Ftypebook) VALUES('".$username."', '".$itemName."', '".$fileNameArray[0]."', '".$fileNameArray[1]."', '".$fileNameArray[2]."', '".$fileNameArray[3]."', '".$description."', '".$price."', '".$negotiable."', 'books','".$categoriesChosenjq."')");	
						     		if($registerquery)
									{
										echo "<h1>Success</h1>";
										echo "<p>Your item is now listed on Jorge's Trading Post!</p>";
									}
									else
									{
						     			echo "<h1>Error</h1>";
										echo "<p>Oooops... Something went wrong. Your item is not successfully listed.</p>";
						
									    die('Invalid query: ' . mysql_error());
									}    	
			     				}
			
								
								
							}
							else{
								?>

                            <div class="da-panel-content">
                            	<form id="da-ex-validate3" class="da-form" action="upload.php" method="post" name="uploadItem" enctype="multipart/form-data">
	                            	<div id="da-ex-val2-error" class="da-message error" style="display:none;"></div>
    
                                    <div class="da-form-inline">
                                        <div class="da-form-row">
                                            <label>Your MHC email <span class="required">*</span></label>
                                            <div class="da-form-item small">
												<input type="text" name="username" id="username" />@mtholyoke.edu
                                                <label for="gender" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Item name<span class="required">*</span></label>
                                            <div class="da-form-item large">
												<input type="text" name="itemName" id="itemName" />
                                                <label for="itemName" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Picture 1(The size of all pictures combined cannot exceed 8MB) <span class="required">*</span></label>
                                            <div class="da-form-item large">
	                                        	<span class="formNote">You can upload the following formats: jpg, jpeg, png, gif</span>
	
                                            	<input type="file" id="pic1" name="pic1" class="da-custom-file" />
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Picture 2 (optional) </label>
                                            <div class="da-form-item large">
                                            	<input type="file" id="pic2" name="pic2" class="da-custom-file" />
                                                <label for="pic2" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Picture 3 (optional)</label>
                                            <div class="da-form-item large">
                                            	<input type="file" id="pic3" name="pic3" class="da-custom-file" />
                                                <label for="pic3" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Picture 4 (optional)</label>
                                            <div class="da-form-item large">
                                            	<input type="file" id="pic4" name="pic4" class="da-custom-file" />
                                                <label for="pic4" class="error" generated="true" style="display:none;"></label>
                                            </div>
                                        </div>
                                    	<div class="da-form-row">
                                        	<label>Item Description<span class="required">*</span></label>
                                            <div class="da-form-item large">
                                            	<span class="formNote">Size, color, conditions and brand (optional), etc.</span>
                                            	<textarea id="description" name="description" rows="auto" cols="auto"></textarea>
                                            </div>
                                        </div>
                                        <div class="da-form-row">
                                            <label>Item Price (Please only enter numbers) <span class="required">*</span></label>
                                            <div class="da-form-item small">
												$<input type="text" name="price" id="price" /><br>
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
