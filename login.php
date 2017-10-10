<?php 
session_start();
unset($_SESSION['username']);
//session_destroy();
if(isset($_SESSION['username'])){
	exit(header("locaiton: index.php"));
}
if(isset($_POST['login'])){
	include  "connection.php";
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM login WHERE username = '{$username}' and password = '{$password}'";
	
	$result = mysqli_query($conn, $sql);

    //$row = mysqli_fetch_array($result);
    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0){
	
		$_SESSION['username'] = "user";
	        exit(header("Location:index.php"));
	    }
   else
    {
    	 $_SESSION['errors'] = "Username or password invalid!!";
    }
}
?>


	

<?php include "header.php"; ?>

<style>
	.border {
		border: 1px solid red;
	}
</style>


<div class="col-md-12">
	<!-- side bar-->
	<div class="col-md-2 border style=background-color:red">
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum

	</div>
	<div class="col-md-7 border"><div class="jumbotron col-md-12">
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
<?php  if(isset($_SESSION['errors'])){ ?>
            <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
         <?php echo $_SESSION['errors']; ?>
        </div>
             
          <?php 
            unset($_SESSION['errors']);
          }
          ?>

 <div class="form-group">
      <label for="inputUsername" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-5">
        <input type="text" class="form-control"  name="username" id="inputUsername" placeholder="Username">
      </div>
    </div>

     <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-5">
        <input type="password" class="form-control"  name="password" id="inputPassword" placeholder="Username">
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
    </div>
		           </form>
</div>
 </div>
	<div class="col-md-2 border">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

	</div>
	</div>






</body>
</html>
<?php 
include "footer.php";
?>