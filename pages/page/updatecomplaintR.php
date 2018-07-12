<?php
                    
                    
                    $postid = $_POST['variable'];
                    
                    $con = mysql_connect("localhost","root","");
                    if (!$con)
                    {
                    	die('Could not connect: ' . mysql_error());
                    }
                    mysql_select_db("ngo", $con);
                    $result = mysql_query("select * from complaint");
                    while($rowval = mysql_fetch_array($result))
                    {
                         $id= $rowval['complaint_id'];
                         if ($id == $postid) {
                              
                              mysql_query("update complaint set reject=1 where complaint_id=$id");
                              echo "Rejected";
                              break;
                         }
                	}


?>