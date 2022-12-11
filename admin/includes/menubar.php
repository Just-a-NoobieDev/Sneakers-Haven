<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel" style="height: 370px;">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/noimage.jpg'; ?>" class="img-circle" alt="User Image" width="240px" height="240px">
      <div class="info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard" style="color: #FFBE4F; margin-right: 10px;"></i> <span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money" style="color: #FFBE4F; margin-right: 10px;"></i> <span>Sales</span></a></li>
      <li class="header">MANAGE</li>
      <li><a href="users.php"><i class="fa fa-users" style="color: #FFBE4F; margin-right: 10px;"></i> <span>Users</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode" style="color: #FFBE4F; margin-right: 10px;"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products.php"><i class="fa fa-circle-o"></i> Product List</a></li>
          <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>