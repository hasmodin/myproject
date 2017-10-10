<?php 
include "connection.php";
if(isset($_POST['submit'])){
	$fatherid = $_POST['fatherid'];
	$firstname = $_POST['firstname'];
	$secondname = $_POST['secondname'];
	$description = $_POST['description'];

	$query = "INSERT INTO `demo`(fatherid, firstname, secondname, description) VALUES ('{$fatherid}', '{$firstname}', '{$secondname}', '{$description}')";
	 if(!mysqli_query($conn, $query)){
	 	echo "insertion failed";
	 }else{
	 	echo "insert successful";
	 }

}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My New Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- css files -->
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <!-- js files -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<style>
.border{
	border:1px solid red;
}
	</style>
</head>
<body>
  <?php include_once("header2.php"); ?>
	<div class="col-md-12">
		<!--sidebar-->
		<div class="col-md-2 border">
    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.
  </div>

       
       <div class="col-md-7 border">
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
      <div class="form-group">
      <label for="inputfatherid" class="col-md-2 control-label">Father ID</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputfatherid" name="fatherid" placeholder="father id">
      </div>
    </div>
 <div class="form-group">
      <label for="inputfirstname" class="col-lg-2 control-label">First Name</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputfirstname" name="firstname" placeholder="first name">
      </div>
    </div>
 <div class="form-group">
      <label for="inputsecondname" class="col-lg-2 control-label">Second Name</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputsecondname" name= "secondname" placeholder="second name">
      </div>
    </div>
	<div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-6">
        <textarea class="form-control" rows="3" name="description" id="textArea"></textarea>
        <span class="help-block"></span>
      </div>
    </div>
	              <div class="form-group">
      <div class="col-lg-6 col-lg-offset-2">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>

       <div class="col-md-2 border">
       Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.

     </div>
</form>
</div>
</body>
</html>
	
