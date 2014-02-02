<?php 
include "base.php"; 
?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Freckle+Face' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Margarine' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Margarine|Englebert' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Chau+Philomene+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Belleza' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- iOS webapp metatags -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />


<!-- iOS webapp icons -->
<link rel="apple-touch-icon-precomposed" href="images/touch-icon-iphone.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/touch-icon-ipad.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/touch-icon-retina.png" />

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="css/fluid.css" media="screen" />
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.theme.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.css" media="screen" />
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen" />

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen" />
<!-- jGrowl Plugin -->
<script type="text/javascript" src="plugins/jgrowl/jquery.jgrowl.min.js"></script>
<link rel="stylesheet" href="plugins/jgrowl/jquery.jgrowl.css" media="screen" />
<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.ui.js"></script>

<!-- Plugin Files -->

<!-- FileInput Plugin -->
<script type="text/javascript" src="js/jquery.fileinput.js"></script>
<!-- Placeholder Plugin -->
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<!-- Mousewheel Plugin -->
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<!-- Scrollbar Plugin -->
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<!-- Tooltips Plugin -->
<script type="text/javascript" src="plugins/tipsy/jquery.tipsy-min.js"></script>
<link rel="stylesheet" href="plugins/tipsy/tipsy.css" />

<!-- Validation Plugin -->
<script type="text/javascript" src="plugins/validate/jquery.validate.js"></script>

<!-- Statistic Plugin JavaScript Files (requires metadata and excanvas for IE) -->
<script type="text/javascript" src="js/jquery.metadata.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="js/core/plugins/dandelion.circularstat.min.js"></script>

<!-- Flot Plugin -->
<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>

<!-- Wizard Plugin -->
<script type="text/javascript" src="js/core/plugins/dandelion.wizard.min.js"></script>

<!-- Fullcalendar Plugin -->
<script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="plugins/fullcalendar/gcal.js"></script>
<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.css" media="screen" />
<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print" />

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.dashboard.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>

<title>SeniorSale!</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39867312-1', 'seniorsalemhc.com');
  ga('send', 'pageview');

</script>
</head>

<body>

	<!-- Dandelion Customizer (remove if not needed) -->
    <div id="da-customizer">
    </div>

	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
        <!-- Header -->
        <div id="da-header">
        
        	<div id="da-header-top">
                <center class="da-container clearfix">
	                <div id="da-logo-img">
                        <a href="index.php">
                            <img  src="images/sslogo5.png" alt="SeniorSale" />
                        </a>
                        <a href="index.php">
                            <img  src="images/notOnlyForSeniors.png" alt="Not Only For Seniors" />
                        </a>
                    </div>
    
                </center>
                <!-- Container -->
            </div>
        	<div id="da-header-top">
                <!-- Container -->
                <div class="da-container clearfix" style="padding-top:10px">
                    <a href="upload.php" style="padding-top:10px; font-family: 'Englebert', sans-serif;color:yellow; font-size: 14pt;" >CLICK HERE to post your items NOW for free! </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div style="float:right; padding-bottom:10px">
							<input type=button class="da-button red large" onClick="location.href='donate.html'" value='Donate!'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type=button class="da-button pink large" onClick="location.href='howto.html'" value='How it works?'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                	
		                	<input type=button class="da-button blue large" onClick="location.href='whyUs.html'" value='Why us?'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                    	<button id="da-ex-dialog-disclaimer" class="da-button green large">Disclaimer</button>
						</div>
	                    <div id="da-ex-dialog-div-disclaimer" style="display:none;">
	                    	<p>SeniorSale is a digital platform where Mount Holyoke students can sell and buy their second-hand stuff within our community. Sellers can list their products by sending us pictures and brief descriptions. Buyers can contact the sellers directly for their interested products. We also offer the option of paying for the item via PayPal. Please note that we are only responsible for listing the information that students provide us with, but not for the quality of the products. For more information, please contact seniorsalemhc@gmail.com
							</p>
	                    </div>
	
						
                    <!-- Header Toolbar Menu -->
                    <div id="da-header-toolbar" class="clearfix">
                    </div>
                                    
                </div>
            </div>
            
            <div id="da-header-bottom">
                <!-- Container -->
                <div class="da-container clearfix">
                
                 	
                    <!-- Breadcrumbs -->
                    <div id="da-breadcrumb">
                        <ul>
                            <li class="active"><a href="new.php"><img src="images/icons/black/16/clock.png" alt="new" />Just Added!</a></li>
		                    <a style="font-family: 'Roboto Condensed', sans-serif; float:right; padding-top:7px">seniorsalemhc@gmail.com</a>
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
                
                    <!-- Main Navigation -->
                    <div id="da-main-nav" class="da-button-container">
                        <ul>

    
                            <li>
                            	<a href="index.php">
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/heart___favorite.png" alt="What's HOT" />
                                    </span>
                                	What's HOT
                                </a>
                            </li>
	                        <li class="active">
                            	<a href="new.php">
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/clock_2.png" alt="Newly added" />
                                    </span>
                                	Just Added!
                                </a>
                            </li>
                            <li>
                            	<a href="accessoriesAll.php">
    
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/ice_cream_2.png" alt="" />
                                    </span>
                                    Accessories
                                </a>
                                <ul class="closed">
                                	<li><a href="form-layouts.html">Necklace</a></li>
                                	<li><a href="form-elements.html">Earring</a></li>
                                	<li><a href="form-validation.html">Ring</a></li>
                                	<li><a href="form-validation.html">Glass</a></li>
                                	<li><a href="form-validation.html">Scarf</a></li>
                                	<li><a href="form-validation.html">Bracelet</a></li>
                                </ul>
                            </li>
                            <li>
                            	<a href="shoes.php">
                                	<!-- Nav Notification -->
                                     
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/footprints.png" alt="Shoes" />
                                    </span>
                                    Shoes
                                </a>
                            </li>
                            <li>
                            	<a href="clothesAll.php">
     
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/dress.png" alt="Clothes" />
                                    </span>
                                	Clothing
                                </a>
                                <ul class="closed">
                                	<li><a href="form-layouts.html">Blazer</a></li>
                                	<li><a href="form-elements.html">Skirt</a></li>
                                	<li><a href="form-validation.html">Shirt</a></li>
                                	<li><a href="form-validation.html">Dress</a></li>
                                	<li><a href="form-validation.html">Pant</a></li>
                                	<li><a href="form-validation.html">Short</a></li>
                                	<li><a href="form-validation.html">Sweater</a></li>
                                	<li><a href="form-validation.html">Sweatshirt</a></li>
                                	<li><a href="form-validation.html">Sweatpant</a></li>
                                	<li><a href="form-validation.html">T-shirt</a></li>
                                </ul>
                            </li>
                            <li>
                            	<a href="bagAll.php">
                                	<!-- Nav Notification -->
                                     
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/bag_2.png" alt="Charts" />
                                    </span>
                                    Bags
                                </a>
                            </li>
                            <li>
                            	<a href="jewelryAll.php">
                                	<!-- Nav Notification -->
                                     
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/price_tag.png" alt="Charts" />
                                    </span>
                                    Jewelries
                                </a>
                            </li>
                            <li>
                            	<a href="bookAll.php">
                                	<!-- Nav Notification -->
                                     
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/fountain_pen.png" alt="Charts" />
                                    </span>
                                    Books
                                </a>
                            </li>

                            <li>
                            	<a href="dorm.php">
                                	<!-- Nav Notification -->
                                     
                                	<!-- Icon Container -->
                                	<span class="da-nav-icon">
                                    	<img src="images/icons/black/32/home_2.png" alt="Charts" />
                                    </span>
                                    Dorm &<br> Others
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
					<?php
					
						$result = mysql_query("SELECT * FROM items ORDER BY Ftime DESC LIMIT 10;");
						if (!$result) {
							echo 'result=null';
						}
						else{
							$bigDiv=1;
							while($row = mysql_fetch_assoc($result)){
								if($bigDiv==1){
									echo '<div id="da-content-area">';
								}
								echo '<div class="grid_2">
									<div class="da-panel">
								    	<div class="da-panel-header-items">
								        	<span class="da-panel-title">
								                <img src="images/icons/color/heart.png" alt="" />';
								echo $row["Fname"];
								echo '        </span>';
								echo'	</div>';			
								echo' 								        <div class="da-panel-content with-padding">	';
								echo' 			<center>
								 				<ul>';
								echo'				<div class="imageThumbs">';
								echo '            <a href="images/itemImages/';
								echo $row["Fp1"];
								echo '">';
								echo '   <img style="padding-right:10px; padding-bottom:10px" width="200px" src="images/itemImages/thumb/';
								$p1withoutExt = preg_replace("/\\.[^.\\s]{3,4}$/", "", $row["Fp1"]);
								echo $p1withoutExt.'.jpg';
							echo '" alt="" />';
							echo '</a>';
							if($row["Fp2"]!=""){
								echo '            <a href="images/itemImages/';
								echo $row["Fp2"];
								echo '">';
								echo '   <img style="padding-right:10px; padding-bottom:10px" width="200px" src="images/itemImages/thumb/';
								$p1withoutExt = preg_replace("/\\.[^.\\s]{3,4}$/", "", $row["Fp2"]);
								echo $p1withoutExt.'.jpg';
								echo '" alt="" />';
								echo '</a>';
							}
							if($row["Fp3"]!=""){
							
								echo '            <a href="images/itemImages/';
								echo $row["Fp3"];
								echo '">';
								echo '   <img style="padding-right:10px; padding-bottom:10px" width="200px" src="images/itemImages/thumb/';
								$p1withoutExt = preg_replace("/\\.[^.\\s]{3,4}$/", "", $row["Fp3"]);
								echo $p1withoutExt.'.jpg';
								echo '" alt="" />';
								echo '</a>';
							}
							if($row["Fp4"]!=""){
							
								echo '            <a href="images/itemImages/';
								echo $row["Fp4"];
								echo '">';
								echo '   <img style="padding-right:10px; padding-bottom:10px" width="200px" src="images/itemImages/thumb/';
								$p1withoutExt = preg_replace("/\\.[^.\\s]{3,4}$/", "", $row["Fp4"]);
								echo $p1withoutExt.'.jpg';
									echo '" alt="" />';
									echo '</a>';
								}
								echo '		</div>';
								echo '	</ul>';
								echo ' 	</center>';
								echo '				            	<form class="da-form">
												                	<div class="da-form-inline-itemDetails">
												                        <div class="da-form-row">
																		<p>';
								echo $row["Fdescription"];
								echo '</p>
									                        </div>
															<div class="da-form-row">';
								echo '<label>Price: $';
								echo $row["Fprice"];
								if($row["Fnegotiable"]==1){
									echo ' negotiable';
									
								}
								echo '</label>';
								echo '<a href="mailto:';
								echo $row["Fuser"];
								echo '@mtholyoke.edu" style="float:right">';
								echo '<button class="da-button blue large" style="font-size:14pt; font-family: \'Roboto Condensed\', sans-serif;">Contact Seller (';
								echo $row["Fuser"];
								echo ')</button>';
								echo '	</a>';
															
								echo '	</div>
										 </div>
											</form>';
															
										echo '   </div>';
															
								echo '   </div>';
								echo '</div>';
								
								if($bigDiv==0){
									echo '</div>';
								}
								$bigDiv=1-$bigDiv;
							}
						}
						
					?>
					
                </div>
                
            </div>
            
        </div>
        
        <div id="da-content">
        </div>

        <!-- Footer -->
        <div id="da-footer">
        	<div class="da-container clearfix">
				<iframe src="http://www.facebook.com/plugins/like.php?
				app_id=185800681493185&amp;href=https://www.facebook.com/SeniorSale&amp;send=false
				&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;
				action=like&amp;colorscheme=light&amp;font&amp;height=35"
				scrolling="no" frameborder="0" style="border:none;
				overflow:hidden;width:180px; height:35px;" allowTransparency=
				"true"></iframe><br>
				<a style="font-family: 'Roboto Condensed', sans-serif;font-size:12pt; color:#202081" href="https://www.facebook.com/SeniorSale" target="_blank">Visit our facebook page! <img src="images/icons/black/32/facebook.png" alt="" /></a><br>
				<a style="font-family: 'Roboto Condensed', sans-serif;font-size:16pt" href="mailto:seniorsalemhc@gmail.com">seniorsalemhc@gmail.com</a>
                <p style="font-family: 'Roboto Condensed', sans-serif; font-size:12pt; color: #FF0080">SeniorSale is an information sharing platform. We do not SELL anything. We are not responsible for the quality, price, or the accuracy of the descriptions but we expect every participant to obey the Honor Code. If you have questions or doubts about certain items, please email the sellers directly.</p>

            </div>
        </div>
        
    </div>
    
</body>
</html>
