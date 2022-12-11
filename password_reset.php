<?php include 'includes/session.php'; ?>
<?php
  if(!isset($_GET['code']) OR !isset($_GET['user'])){
    // header('location: index.php');
    // exit(); 
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">

<img src="images/circle2.png" alt="" class="imgll">
  <img src="images/circle.png" alt="" class="img1">
<div class="login-box">
<img src="images/login.png" alt="">
    <div class="wrap">
  	<div class="login-box-body">
    	<h1 class="login-box-msg">Please, enter a <br/>new
password below.</h1>
<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='error'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='success'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    
    ?>
    	<form action="password_new.php?code=<?php echo $_GET['code']; ?>&user=<?php echo $_GET['user']; ?>" method="POST">
      		<div class="form-group has-feedback">
        		<input type="password" class="form-control" name="password" placeholder="New password" required>
        		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Re-type password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>

          <button type="submit" class="btn1" name="login">create new password</button>

    	</form>
  	</div>
    </div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>