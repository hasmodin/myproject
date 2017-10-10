<?php
	include "connection.php";

	$userid = $_GET['userid'];
	//$query = "SELECT * FROM demo WHERE `id` ={$userid}";

	"select * from demo where fatherId = userId"

	$result = mysqli_query($conn, $query);

	$userData = array();
	while($row = mysqli_fetch_assoc($result)){ //fetches user data from (query1)
        array_push($userData,$row); // store row array into userData array.
    }
    echo json_encode($userData);
?>