<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Solaris Hospital
    </title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
      <div class="container" style="padding-top: 10px;">
        <nav class="navbar  navbar-static-top">
          <a class="navbar-brand" href="patient_info.php">🌅 Solaris Hospital</a>
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a href="https://goo.gl/maps/4kEytmhGTYU2" target="_blank"> Address: National Institute of Technology ,Trichy - 620015</a>
              </li>
              <li class="nav-item">
                <a class="" href="tel:+919877586888">Ambulance Number: +91 9877586888</a>
              </li>
              <?php
                if (isset($_SESSION['username'])) {
                    echo '<li class="nav-item" style="align-items: right;"> <a class="nav-link" href="logout.php">Logout</a>
                  </li>';
                }
              ?>
            </ul>
        </nav>
        </div>