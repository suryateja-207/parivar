<?php
                    session_start();
                    $id=$_SESSION['SESS_MEMBER_ID'];
                    $postid = $_POST['variable'];
                    $temp=0;
                    $con = mysql_connect("localhost","root","");
                    if (!$con)
                    {
                         die('Could not connect: ' . mysql_error());
                    }
                    mysql_select_db("ngo", $con);
                    $result = mysql_query("INSERT INTO `interested`( `ngo_id`,`donation_post_id`) VALUES ('".$id."', '".$_SESSION['SESS_MEMBER_ID']."')");
					$rowval = mysql_fetch_array($result);
                    while($rowval)
                    {
                         $id= $rowval['donation_post_id'];
                         if ($id == $postid) {
                              $ngo = $rowval['interested_ngos'];
                              $ngo = $ngo + 1;
							  $temp=1;
                              mysql_query("update donation_post set interested_ngos=$ngo where donation_post_id=$id");
							  echo "You have successfully marked for collection. Please contact the donor to collect the item";
                              break;
                         }
                    }
					if($temp==0)
					echo "Already marked for collection";


?>