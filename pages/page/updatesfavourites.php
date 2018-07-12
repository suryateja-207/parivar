<?php        
	$ngoid = $_POST['variable'];
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
		if ($id == $ngoid) {
			$ngo = $rowval['favourites'];
			$ngo = $ngo + 1;
			mysql_query("update ngo set favourites=$ngo where ngo_id=$id");
			echo $ngo;
			break;
		}
	}
?>