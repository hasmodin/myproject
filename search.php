<?php
//echo phpinfo();
//include connection file

include "connection.php";
if(isset($_POST['search'])){
	$searchStr = $_POST['firstname'];
	$query = "SELECT * FROM demo WHERE `firstname` like '".$searchStr."%'"; // runs after search action (query2)
}else{
	$query = "SELECT * from demo;"; // runs on first load (query1)
}

$result = mysqli_query($conn, $query);

$userData = array(); // new array to store user data
while($row = mysqli_fetch_assoc($result)){ //fetches user data from (query1)
	$fatherNameResult = mysqli_query($conn, "SELECT firstname, secondname, fatherid from demo where id={$row['fatherid']}"); // query to fetch father name
	$fatherArr = mysqli_fetch_assoc($fatherNameResult); //fetches fathername associative array
	$row['fathername'] = $fatherArr['firstname']." ".$fatherArr['secondname']; //store fullname by concatinating firstname and lastname into new array key called 'fathername'
	$userData[] = $row; // store row array into userData array.
}

?>



<html>

	<head>
		<title>search page</title>
		<link rel="stylesheet" href="style.css">
		<script>

		function getUserDetails(userid){
			var userid = parseInt(userid);
			if (userid.length == 0) { 
				//document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var users = JSON.parse( this.responseText );
						console.log(users);
						var tableData = "";
						
						for ( var i = 0; i < users.length; i++ ) {
							var user = users[i];
							tableData += "<tr>";				
							tableData += "<td>"+user.id+"</td>";
							tableData += "<td>"+user.fatherid+"</td>";
							tableData += "<td>"+user.firstname+"</td>";
							tableData += "<td>"+user.secondname+"</td>";
							tableData += "</tr>";	
						}
						document.getElementById('usertable').classList.remove('hide')
						document.getElementById("userdetail").innerHTML = tableData;
					}
				};
				xmlhttp.open("GET", "getuserdetails.php?userid=" + userid, true);
				xmlhttp.send();
			}
		}
		function retrieveUsers() {
			var fatherid = document.getElementById("inputFatherStr").value;
			if (fatherid.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var users = JSON.parse( this.responseText );
						console.log(users);
						var tableData = "";
						for ( var i = 0; i < users.length; i++ ) {
							var user = users[i];
							tableData += "<tr>";				
							tableData += "<td>"+user.id+"</td>";
							tableData += "<td>"+user.firstname+"</td>";
							tableData += "<td>"+user.secondname+"</td>";
							tableData += "<td>"+user.fatherid+"</td>";
							tableData += "<td>"+user.fathername+"</td>";
							tableData += "<td><button onclick=getUserDetails("+user.id+")>View</button>";
							tableData += "</tr>";	
						}
						document.getElementById("tablebody").innerHTML = tableData;
					}
				};
				xmlhttp.open("GET", "getusers.php?fatherstr=" + fatherid, true);
				xmlhttp.send();
			}
		}

		</script>
		<style>
		.hide{
			display: none !important;
		}
		table{
			border-collapse:collapse;
			width:50%;
		}
		th, td{
			text-align: left;
			padding :8px;
			}
 tr:nth-child(even){background-color: #f2f2f2}
			th {
				background-color: #0c5bd6;
				color:white;
			}
		
		</style>
	</head>
	<body>
	<center>
	<form action = "search.php" method = "POST">
	First Name: <input type="text" name="firstname" />
                     </br><br />
       <input type="submit" name="search" value="Search" />
 </form>

 <input type="text" name="inputFatherStr" id="inputFatherStr" placeholder="Type Father Name" onkeyup="retrieveUsers()"/>

<br/><br/>

 <table width="50%" cellpading="5" cellspace="5" border="1" >
 <thead>
 	<tr>
	 <?php if(isset($_POST['search'])){ ?>
 		<th>id</th>
 		<th>fullname</th>
 		<th>fatherid</th>
 		<th>fathername</th>
 		<th>description</th>
 		<th>Action</th>
	 <?php }else{ ?>
		<th>id</th>
 		<th>fatherid</th>
 		<th>firstname</th>
 		<th>secondname</th>
 		<th>description</th>
 		<th>Action</th>
	 <?php } ?>
 	</tr>
	 </thead>
	 <tbody id="tablebody">
 	<?php 
	 
	 if(isset($_POST['search'])){
		foreach($userData as $user){ 
		?>
		<tr>
			<td><?php echo $user['id']; ?></td>

			<td><?php echo $user['firstname']." ". $user['secondname'];?></td>
			<td><?php echo $user['fatherid']; ?>
			<td><?php echo $user['fathername']; ?></td>
			<td><?php echo $user['description']; ?></td>
			<td><button onclick=getUserDetails("<?php echo $user['id'];?>") id="">View</button></td>
		</tr>
		<?php 
		}
	 }else{
		foreach($userData as $user){ 
		?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['fatherid']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['secondname']; ?></td>
			<td><?php echo $user['description']; ?></td>
			<td><button onclick=getUserDetails("<?php echo $user['id'];?>") id="">View</button></td>
		</tr>
		<?php 
		} 
	 }

 	?>
	 </tbody>
 </table >
 <br/><br/>
 <table class="hide" id="usertable">
 	<thead>
		<th>id</th>
 		<th>fatherid</th>
 		<th>firstname</th>
 		<th>secondname</th>
 	</thead>
 	<tbody id="userdetail">

 	</tbody>
 </table>
</center>
</body>
</html>

