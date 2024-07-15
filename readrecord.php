<?php
	
	include 'connect.php';
	
	if (!$connection) {
	    die('Could not connect: ' . mysqli_connect_error());
}
	
	$query = 'SELECT * from  tbluser';
        $resultset = mysqli_query($connection, $query);
	
	//$querybsit = 'SELECT count(*) as total from  tblstudent where program = "BSIT"';
	//$resultset1 = mysqli_query($connection, $querybsit);
	//$count = mysqli_fetch_assoc($resultset1);	
		
	
?>