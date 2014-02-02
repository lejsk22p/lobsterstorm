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
                            <li class="active"><a href="#">How It Works</a></li>
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
                	<div id="da-content-area" style="font-family: 'Calibri', sans-serif; font-size: 12pt;">
						<h1>Selling Your Item</h1>
                        <ol>
                        <li>Upload your item <a href='upload.php'>here</a>! (Include pictures and a general description of your item; you will see a "success!" page if you item has completed uploading.)*</li>
                        <li>An MHC community member will email you if they're interested.</li>
                        <li>Meet up with them and rake in the dough!</li>
                        <li>Email us and let us know about your success! This will let us to know to take down your post to keep more buyers from contacting you.**</li>
                        </ol>

                        <img src='images/sell.png' />

                        <p style='font-size: 6pt'>&nbsp;</p>

                        <p style='font-size: 10pt'>*(Your MHC email address is required for security reasons. We reserve the right to delete your items if we detect non-MHC email address).

                        <br>**If you haven't met the buyer before, consider handling transaction in a public place.

                        <br>JTP is intended to be a local, community centered web platform. Exercise caution if contacted by buyers outside the Mount Holyoke network.</p>



                        <h1>Browse & Buy</h1>
                        <ol>

                        <li>Browse local items in our eco-chic boutique!</li>
                        <li>Contact the seller using an @mtholyoke.edu address if you're interested in trying an item.*</li>
                        <li>Try and buy it if it works for you!</li>
                        </ol>

                        <p style='font-size: 10pt'>*note - this site is intended for use by the members of the Mount Holyoke community.</p>

                        <img src='images/buy.png' />


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
