<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . "/../lib/Session.php";
Session::init();



spl_autoload_register(function ($classes) {

  include 'classes/' . $classes . ".php";

});


$users = new Users();

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>PHP CRUD User Management</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/style.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


  <?php


  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    // <strong>Success !</strong> You are Logged Out Successfully !</div>');
    Session::destroy();
  }



  ?>


  <div class="container">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
      <a class="navbar-brand" href="index.php"><img src="ophtalmologie.png" >Ophtalmologie CHU </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">



          <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('roleid') == '1') { ?>
              <li class="nav-item">

              </li>
              <li class="nav-item">

                <a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>patient lists </span></a>
              </li>

            <?php } ?>
 



            <li class=" nav-item ">
                <a href=" #" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style>User</a>
              <div class="dropdown-menu dropdown-menu-end" style="background:gray;">

                <a class="nav-link" href="index1.php"><i class="fas fa-users mr-2"></i>User lists </span></a>

                <?php

                $path = $_SERVER['SCRIPT_FILENAME'];
                $current = basename($path, '.php');
                if ($current == 'profile') {
                  // echo "active ";
                }
                ?>
                <a class="nav-link" href="profile.php?id=<?php echo Session::get("id"); ?>"><i
                    class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>




                <div class="dropdown-divider"></div>
                <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
              </div>
            </li>



          <?php } else { ?>




            <li class="nav-item
                            <?php

                            $path = $_SERVER['SCRIPT_FILENAME'];
                            $current = basename($path, '.php');
                            if ($current == 'login') {
                              echo " active ";
                            }

                            ?>">
              <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
            </li>

          <?php } ?>








        </ul>

      </div>
    </nav>