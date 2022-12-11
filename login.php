<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="login-page">
  <img src="images/circle2.png" alt="" class="imgll">
  <img src="images/circle.png" alt="" class="img1">

<div class="login-box">
  	
    <img src="images/login.png" alt="">
    <div class="wrap">
  	<div class="login-box-body">
      <h1>Log in.</h1>
    	<p class="login-box-msg">Welcome to the most affordable<br /> shoe market site online.</p>

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
    	<form action="login-controller.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
            <img src="images/email.png" alt="">
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" id="pass" required>
            <img src="images/eye.png" id="eye-open" class="dis" alt="">
            <img src="images/eye-open.png" id="eye" class="def" alt="">
          </div>
          <a href="password_forgot.php">Forgot Password?</a><br>
          <button type="submit" class="btn1" name="login">Log in to Sneakers Haven</button>
    	</form>
      <br> 
        <p class="d">
          Don’t have an account? <a href="register.php" class="t">Register here</a><br/>
          <a href="index.php" class="a">Go back to Home</a>  
        </p>
         
    </div>
</div>
	
<?php include 'includes/scripts.php' ?>

<script>
  $('#eye').on('click', function() {
    $("#pass").prop('type', 'text');
    $('.dis').css('display', 'block');
    $('.def').css('display', 'none');
  })

  $('#eye-open').on('click', function() {
    $("#pass").prop('type', 'password');
    $('.dis').css('display', 'none');
    $('.def').css('display', 'block');
  })
</script>
</body>
</html>