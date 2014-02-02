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
                            <li><a href="clothesAll.php">Clothing</a></li>
                            <li class="active"><span>Shorts</span></li>
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
                    <?php include('core/navigation_clothes.php'); ?>                                
                    
                </div>
                
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                    <!-- Content Area -->
                    <?php
                    
                    $result = mysql_query("SELECT * FROM items WHERE Ftypeclothing LIKE '%shorts%' ORDER BY Ftime DESC");
                    include('core/content.php');
                    ?>
                    
                                           
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
