<?php 
  $page = basename($_SERVER['REQUEST_URI']);

  $pages = array(
      'index.php' => 'Dashboard',
      'dogs.php' => 'Dogs',
      'litters.php' => 'Litters',
      'alerts.php' => 'Alerts',
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