<?php 
include "base.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include('core/head.php'); ?>

<body>

    <!-- Dandelion Customizer (remove if not needed) -->
    <div id="da-customizer">
    </div>

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
                            <li class="active"><a href="#">Donate!</a></li>
                            <a style="font-family: 'Calibri', sans-serif;float:right; padding-top:7px">jorgestradingpost@gmail.com</a>
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
                
                	<!-- Content Area -->
                	<div id="da-content-area" style="font-family: 'Calibri', sans-serif;">
						
						<div style="font-size:16pt; padding-top:60px; font-weight: bold;">Did you know...</div>
						<br><br>
						
						<div style="font-size:13pt;font-family: 'Calibri', sans-serif;">Your $5 donation can let 100 more students know about us.
							<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post"style="float:right" target = "paypal">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="business" value="li22b@mtholyoke.edu">
							<input type="hidden" name="currency_code" value="USD">
							<input type="hidden" name="item_name" value="Five Dollar Donation to Jorge's Trading Post">
							<input type="hidden" nme="amount" value="5">
							<input type="image" src="images/donate/donatePapal.png" style="height:60px" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
							</form>
						</div>
							<br><br>
							<div style="font-size:13pt;font-family: 'Calibri', sans-serif;">Your $10 donation can rent us a web-hosting for more functionalities of the website.
								<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post"style="float:right" target = "paypal">
								<input type="hidden" name="cmd" value="_xclick">
								<input type="hidden" name="business" value="li22b@mtholyoke.edu">
								<input type="hidden" name="currency_code" value="USD">
								<input type="hidden" name="item_name" value="Ten Dollar Donation to Jorge's Trading Post">
								<input type="hidden" name="amount" value="10">
								<input type="image" src="images/donate/donatePapal.png" style="height:60px" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
								</form>
							</div>
								<br><br>
							<div style="font-size:13pt;font-family: 'Calibri', sans-serif;">Your $20 donation can get you even MORE website features!
									<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post"style="float:right" target = "paypal">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="li22b@mtholyoke.edu">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="item_name" value="Twenty Dollar Donation to Jorge's Trading Post">
									<input type="hidden" name="amount" value="20">
									<input type="image" src="images/donate/donatePapal.png" style="height:60px" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
									</form>
							</div>
									<br><br>
							<div style="font-size:13pt;font-family: 'Calibri', sans-serif;">Your $30 donation can get us all of the above AND ice-cream for our sleep-deprived engineers.
										<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post"style="float:right" target = "paypal">
										<input type="hidden" name="cmd" value="_xclick">
										<input type="hidden" name="business" value="li22b@mtholyoke.edu">
										<input type="hidden" name="currency_code" value="USD">
										<input type="hidden" name="item_name" value="Thirty Dollar Donation to Jorge's Trading Post">
										<input type="hidden" name="amount" value="30">
										<input type="image" src="images/donate/donatePapal.png" style="height:60px" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
										</form>
            				
							</div>
							<br><br>
							
							<div style="font-size:13pt;font-family: 'Calibri', sans-serif;">Have $1? If every unique visitor donates $1 to us, we can expand Jorge's Trading Post to all five colleges within a month.
											<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post"style="float:right" target = "paypal">
											<input type="hidden" name="cmd" value="_xclick">
											<input type="hidden" name="business" value="li22b@mtholyoke.edu">
											<input type="hidden" name="currency_code" value="USD">
											<input type="hidden" name="item_name" value="One Dollar Donation to Jorge's Trading Post">
											<input type="hidden" name="amount" value="1">
											<input type="image" src="images/donate/donatePapal.png" style="height:60px" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
											</form>

								</div>
								<br><br>
								<br><br>
								<center style="font-size:20pt">Thank you!
								</center>
                    </div>
                </div>
                
            </div>
            
        </div>
        <div id="da-content">
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
