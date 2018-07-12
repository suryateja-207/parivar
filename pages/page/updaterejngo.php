<?php
                    
                    
                    $postid = $_POST['variable'];
                    
                    $con = mysql_connect("localhost","root","");
                    if (!$con)
                    {
                    	die('Could not connect: ' . mysql_error());
                    }
                    mysql_select_db("ngo", $con);
                    $result = mysql_query("select * from ngo");
                    while($rowval = mysql_fetch_array($result))
                    {
                         $id= $rowval['ngo_id'];
                         if ($id == $postid) {
                              
                              mysql_query("update ngo set rejected=1 where ngo_id=$id");
                              echo "Rejected";
                              break;
                         }
                	}


?>