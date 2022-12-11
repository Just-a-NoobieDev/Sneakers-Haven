<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">

    <img src="images/circle2.png" alt="" class="imgll">
  <img src="images/circle.png" alt="" class="img1">
<div class="login-box">
<img src="images/login.png" alt="">
    <div class="wrap">
  	<div class="login-box-body">
      <h1>Reset Password</h1>
    	<p class="login-box-msg">Please enter your email address<br /> to request a password reset</p>
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
    	<form action="reset.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
        		<img src="images/email.png" alt="">
      		</div>

          <button type="submit" class="btn1" name="reset">reset password</button>
    	</form>
      <br>
      <p class="d">

        <a href="login.php">I rememberd my password</a><br>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
      </p>
  	</div>
    </div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>