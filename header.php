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

  </head>
  <body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php if(isset($_SESSION['username'])) { ?>
      <ul class="nav navbar-nav">
        <li <?php if(strpos($_SERVER['REQUEST_URI'], "home") !== false){  ?> class="active" <?php } ?>><a href="?page=home">Home <span class="sr-only">(current)</span></a></li>
        <li  <?php if(strpos($_SERVER['REQUEST_URI'], "addfigure") !== false){  ?> class="active" <?php } ?>><a href="?page=addfigure">Add Figure</a></li>
        <li  <?php if(strpos($_SERVER['REQUEST_URI'], "search") !== false){  ?> class="active" <?php } ?>><a href="?page=search">Search</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Logout</a></li>
      </ul>
      <?php } ?>
    </div>
  </div>
</nav>



