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
                            <li class="active"><a href="#">About</a></li>
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

						<p>Run for Mount Holyoke students by Mount Holyoke students, Jorge’s Trading Post is a local way to buy online - and a way to sell the things you don’t want or use in your dorm.</p>

                        <p style="font-size: 2pt;">&nbsp;</p>

                        <h1>Team:</h1> 
                        <p>JTP is run solely by MoHos, with a little help from Jorge. Together, we work on marketing, web development, and team management to bring this great product to the community! If you’re interested in joining the Jorge’s Trading Post team, contact us at jorgestradingpost@gmail.com.</p>

                        <p style="font-size: 2pt;">&nbsp;</p>

                        <h1>History:</h1>
                        <p>JTP was originally founded as "SeniorSale" by three graduating seniors at MHC in 2013. They built the site for seniors and the community to sell their items during the school year and pre-graduation. After they graduated, they passed the site on to the current team, which runs JTP as a project of the MHC Entrepreneurship Club under the advising of Prof. Steven Schmeiser.</p>

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
