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