<?php 
  $page = basename($_SERVER['REQUEST_URI']);

  $pages = array(
      'index.php' => '<i class="icon-home"></i> Dashboard',
      'dogs.php' => '<i class="icon-list"></i> Dogs',
      'litters.php' => '<i class="icon-inbox"></i> Litters',
      'alerts.php' => '<i class="icon-bell-alt"></i> Alerts',
  );
?>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="brand" href="index.php">Kennel Master</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <?php 
            foreach ($pages as $filename => $title) {
              if ($page === $filename) { echo '<li class="active">'; } else { echo '<li>'; }
              echo '<a href="' . $filename . '">' . $title . '</a></li>';         
            }
          ?>
          <!-- <li><a href="#"><i class="icon-sitemap"></i> Pedrigees</a></li> -->
        </ul>
        <ul class="nav pull-right">
          <?php if($page === 'account.php') { echo '<li class="active">'; } else { echo '<li>'; } ?>
          <?php 
            $username = $_SESSION['username'];
            echo '<a href="account.php"><i class="icon-user"></i> ' . $username . '</a></li>';
            echo '<li><a href="logout.php"><i class="icon-signout"></i> Sign out</a></li>';           
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>