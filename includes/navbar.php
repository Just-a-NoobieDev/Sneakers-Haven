<header class="main-header">
  <nav class="navbar navbar-static-top nav">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand">Sneakers Haven</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav links">
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php">About Us</a></li>
          <li><a href="collection.php?collection=">Collection</a></li>
          <li>
            <a href="index.php#contact">Contact Us</a>
          </li>
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control searchh" id="navbar-search-input" name="keyword" placeholder="Search for Product">
              <span class="input-group-btn">
                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <div class="navbar-custom-menu ">
        <ul class="nav navbar-nav">
        <li>
          <a href="">
            <img src="images/icons/heart.png" alt="">
          </a>
          </li>
          <li >
            <a href="cart_view.php" >
              <img src="images/icons/cart-client.png" class="cart" alt="">
              <span class="label cart_count" style="background-color: #905634;"></span>
            </a>
          </li>
          
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/icons/person.png';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu pro">
                    <li class="user-header">
                      <div class="head">
                        <img src="'.$image.'" class="img-circle" alt="User Image">

                        <p>
                          '.$user['firstname'].' '.$user['lastname'].' 
                        </p>
                      </div>
                      <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                    </li>
                    <li class="user-footer">
                      <div>
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div>
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php' class='df'><img src='images/icons/person.png' /><span>Login</span></a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>