<header class="default-header">
  <nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #FFF;">
    <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="images/nitc-logo.jpg" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
          <ul class="navbar-nav" >
          <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME']; ?>">Home</a></li>
          <li><a href="http://messregistration.com/meet-the-team.html">Contact Us</a></li>
          <?php
          session_start();
          if($_SESSION['LoggedIn']==true)
          {
            // echo '<li><a href="http://student.messregistration.com/Main/ChangePassword.php">Change Password</a></li>';
            echo '<li><a href="http://student.messregistration.com/Logout/logout.php">LOGOUT</a></li>';
          }
          ?>                 
          </ul>
        </div>            
    </div>
  </nav>
</header>
