<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashBord.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashbord</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/users/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="dashBord.php" class="d-block"><?php echo $_SESSION['full_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dashBord.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php
          if ($_SESSION['role'] == 1) {?>
             <!-- category start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th-list"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="manageCategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage category</p>
                </a>
              </li>
            </ul>
          </li> 
        <!-- category end -->
             <?php

           } 
          ?>
          

         <!-- post menu start -->
         <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file-o"></i>
              <p>
                All Post
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="post.php?do=manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Post</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="post.php?do=add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Post</p>
                </a>
              </li>
            </ul>
          </li>  -->
        <!-- post menu end -->

        <!-- All comments start -->
        <!-- <li class="nav-item has-treeview">
            <a href="comments.php" class="nav-link">
              <i class="nav-icon fa fa-comments"></i>
              <p>
                All Comments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="comments.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Comments</p>
                </a>
              </li>
            </ul>
          </li>  -->
        <!-- All comments end -->

        <!-- user start -->
        <?php
        if ($_SESSION['role'] == 1) {
          ?>
         <li class="nav-item has-treeview">
          <a href="users.php?do=allUsers" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Users Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="users.php?do=manage" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage users</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="users.php?do=add" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add new user</p>
              </a>
            </li>
          </ul>
        </li> 
           
           <?php
         } 
         ?>
          
        <!-- user end -->
        <!-- plat form sitting -->
        <!-- <li class="nav-item has-treeview">
            <a href="users.php?do=allUsers" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Platform Sitting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users.php?do=manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Change</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users.php?do=add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Password cheange</p>
                </a>
              </li>
            </ul>
            
          </li>  -->
          <?php 
          if ($_SESSION['role'] == 2) {?>
            <!-- <li class="nav-item has-treeview">
            <a href="users.php?do=allUsers" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                My Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="myProfile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Profile</p>
                </a>
              </li>
            </ul>
            
            
          </li>  -->
          <?php
          }
           ?>
          
        <!-- log Out start -->
        <!-- <li class="nav-item has-treeview">
            <a href="logOut.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Log Out
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
          </li>  -->
        <!-- log out end -->


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
