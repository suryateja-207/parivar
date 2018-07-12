<?php
                    
                    
                    $postid = $_POST['variable'];
                    
                    $con = mysql_connect("localhost","root","");
                    if (!$con)
                    {
                    	die('Could not connect: ' . mysql_error());
                    }
                    mysql_select_db("ngo", $con);
                    $result = mysql_query("select * from event");
                    while($rowval = mysql_fetch_array($result))
                    {
                    	$id= $rowval['eventid'];
                    	if ($id == $postid) {
                    		$ngo = $rowval['support'];
                    		$ngo = $ngo + 1;
                    		mysql_query("update event set support=$ngo where eventid=$id");
                    		echo $ngo;
                    		break;
                    	}
                	}


?>