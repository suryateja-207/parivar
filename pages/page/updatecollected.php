<?php
                    
                    
                    $postid = $_POST['variable'];
                    
                    $con = mysql_connect("localhost","root","");
                    if (!$con)
                    {
                    	die('Could not connect: ' . mysql_error());
                    }
                    mysql_select_db("ngo", $con);
                    $result = mysql_query("select * from donation_post");
                    while($rowval = mysql_fetch_array($result))
                    {
                    	$id= $rowval['donation_post_id'];
                    	if ($id == $postid) {
                    		$collect = $rowval['collected'] ;
                    		$collect = 1;
                    		mysql_query("update donation_post set collected=$collect where donation_post_id=$id");
                    		echo "dad";
                    		break;
                    	}
                	}


?>