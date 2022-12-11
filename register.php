<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_POST['g-recaptcha-response'])){
    $now = time();
    if($now >= $_POST['g-recaptcha-response']){
      unset($_POST['g-recaptcha-response']);
    }
  }

?>
<?php include 'includes/header.php'; ?>
<body class="register-page">
  <img src="images/circle2.png" alt="" class="imgll">
  <img src="images/circle.png" alt="" class="img1">
    <div class="register-box">
    <img src="images/register.png" alt="">
        <div class="wrap">
          <div class="register-box-body">
            <h1>Level up your style.</h1>
            <p class="login-box-msg">Find your favorite sneakers brand <br /> in its cheaper price here!</p>
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

            <form action="register-controller.php" method="POST">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
                  <img src="images/person.png" alt="">
                </div>
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
                  <img src="images/person.png" alt="">
                </div>
                <div class="form-group has-feedback">
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                  <img src="images/email.png" alt="">
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="password" placeholder="Password" id="pass" required>
                  <img src="images/eye.png" id="eye-open" class="dis" alt="">
                  <img src="images/eye-open.png" id="eye" class="def" alt="">
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="password" placeholder="Confirm Password" id="pass1" required>
                  <img src="images/eye.png" id="eye-open1" class="dis1" alt="">
                  <img src="images/eye-open.png" id="eye1" class="def1" alt="">
                </div>
                <?php
                  if(!isset($_POST['g-recaptcha-response'])){
                    echo '
                      <div class="form-group .re" style="width:100%; display:flex; align-items: center;
                      justify-content: center;">
                        <div class="g-recaptcha" data-sitekey="6LfOk1QjAAAAAFVP0OxfdNUnmCW3YqBA5df-aCQi"></div>
                      </div>
                    ';
                  }
                ?>
                <button type="submit" class="btn1" name='register'>REGISTER AN ACCOUNT</button>
            </form>
            <br>
            <p class="d">
              Already have an account? <a href="login.php" class="t">Login here</a><br/>
              <a href="index.php" class="a">Go back to Home</a>  
            </p>
          </div>
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

  $('#eye1').on('click', function() {
    $("#pass1").prop('type', 'text');
    $('.dis1').css('display', 'block');
    $('.def1').css('display', 'none');
  })

  $('#eye-open1').on('click', function() {
    $("#pass1").prop('type', 'password');
    $('.dis1').css('display', 'none');
    $('.def1').css('display', 'block');
  })
</script>
</body>
</html>