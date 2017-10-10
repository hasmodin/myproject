<?php 
session_start();
if(isset($_SESSION['username'])){



if(isset($_GET['page'])){
	include "header.php";
	$page = $_GET['page'];
	switch($page){
		case 'home':
			//header('Location: index.php');
			//echo "home page";
			break;
		case 'addfigure':
			include "person_info.php";
			break;
		case 'search':
			include "search.php";
			break;
		default: 
			exit(header('Location: index.php?page=home'));
			break;
	}

}else{
	//die('sdf');
	exit(header("Location: index.php?page=home"));
	
}
//include "person_info.php";
include "footer.php";
}else{

header("location:login.php");
}
?>