<?php

include_once '../helpers/init.php';

//Admin Login
if (isset($_POST['login'])) {
  $adminname = filter_var($_POST['adminname'], FILTER_SANITIZE_STRING);
  $password = $_POST['adminpassword'];
  $query = "SELECT * FROM adminlogin WHERE adminname = :adminname and password = :password";
          $stmt = $conn->prepare($query);
          $stmt->bindParam(':adminname', $adminname);
          $stmt->bindParam(':password', $password);
          $stmt->execute();
          $data = $stmt->fetch();
          $admin = $data['adminname'];

          if ($data['adminname']==$adminname && $data['password']==$password) {
            // code...
            $_SESSION['is_login']= true;
            $_SESSION['ADMINNAME'] = $admin;
            header('Location:../views/admindashboard.php');
          } else {
            // code...
            $_SESSION["message"] = "Wrong username or password.";
            $_SESSION["msg_type"] = "danger";
            header('Location:../views/adminlogin.php');

          }

      }

      if (isset($_POST['changePassword'])) {
        // code...
        $currentPassword =filter_var($_POST['currentPassword'] , FILTER_SANITIZE_STRING);
        $newPassword =filter_var($_POST['newPassword'] , FILTER_SANITIZE_STRING);
        $confirmPassword =filter_var($_POST['confirmPassword'] , FILTER_SANITIZE_STRING);
        if ($newPassword != $confirmPassword)
        {
        $_SESSION["message"] = "The two passwords does not match.";
        $_SESSION["msg_type"] = "danger";
        header('Location:../views/adminsettings.php');

      }else {
        // code...
        $stmt = $conn ->prepare("UPDATE adminlogin SET password = :confirmPassword WHERE adminname='admin'");
        $stmt->bindParam(':confirmPassword', $confirmPassword);
        $stmt->execute();
        $_SESSION["message"] = "Password Changed.";
        $_SESSION["msg_type"] = "success";
        header('Location:../views/adminsettings.php');
      }


      }

      if (isset($_POST['logout'])){
      session_destroy();
      header('Location:../views/adminlogin.php');
    }

    $conn = null;
 ?>
