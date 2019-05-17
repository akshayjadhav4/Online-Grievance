<?php include_once '../helpers/init.php';
if (isset($_SESSION['USERNAME'])){
       header('Location:committeemembersdashboard.php');
     }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../assests/css/style.css">

    <style media="screen">
    body{
      background: #000;
    }
    </style>
    <title>Grievance Redressal</title>
  </head>
  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Grievance Redressal</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="adminlogin.php">Admin</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="committeelogin.php">Committee Member</a>
                  <a class="dropdown-item" href="principallogin.php">Principal</a>
                  <a class="dropdown-item" href="studentlogin.php">Student</a>
                </div>
              </li>
              <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
            </ul>
        </div>

      </nav>
          <?php
          if(isset($_SESSION["message"]))
                { ?>
                    <div class="alert alert-<?=$_SESSION['msg_type']; ?>" role="alert">
                      <?php echo $_SESSION['message']; ?>
                    </div>
                  <?php  unset($_SESSION["message"]);
                }
           ?>
      <div class="row justify-content-center">
      <div class="col-lg-6 col-sm-12">
        <div class="card panel">
          <div class="card-header text-center">
            <h1>LOG IN</h1>
            <h6 class="text-muted">Principal</h6>
          </div>
          <div class="card-body">
            <form action="../process/principallogin.php" method="post" autocomplete="off">
              <div class="form-group">
                <label for="">User Name</label>
                <input class="form-control" type="text" name="PrincipalName" required  placeholder="Enter a User Name">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input class="form-control" type="password" name="password" required placeholder="Enter a Password">
              </div>
              <button class="btn btn-dark"type="submit" name="login">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
