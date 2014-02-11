<?php
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
                                            <span class="da-panel-title">';
                                echo $row["Fname"];
                                echo '        </span>';
                                echo'   </div>';            
                                echo'                                       <div class="da-panel-content with-padding"> ';
                                echo'           <center>
                                                <ul>';
                                echo'               <div class="imageThumbs">';

                                # fixed some code bloat here by iterating over an array instead of having separate code for each image
                                $img_possible = array("Fp1", "Fp2", "Fp3", "Fp4");  # list all the possible images
                                foreach ($img_possible as $img_try) {               # iterate over all the possible images
                                    $img_row = $row[$img_try];
                                    if ($img_row != "") {                           # test to make sure the image exists
                                                                                    # if it does, display code for it
                                        echo "            <a href=\"images/itemImages/$img_row.jpg\">";
                                        echo "  <img style=\"padding-right:10px; padding-bottom:10px\" width=\"200px\" src=\"images/itemImages/thumb/$img_row.jpg\" alt=\"\"></a>";
                                    }
                                }

                                echo '      </div>';
                                echo '  </ul>';
                                echo '  </center>';
                                echo '                              <form class="da-form">
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
                                echo '<button class="da-button gray large" style="font-size:15pt; font-family: \'Calibri\', sans-serif;">Contact Seller (';
                                echo $row["Fuser"];
                                echo ')</button>';
                                echo '  </a>';

                                echo '  </div>
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