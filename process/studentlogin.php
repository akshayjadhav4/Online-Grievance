<?php
include_once '../helpers/init.php';

//studentlogin
if (isset($_POST['login'])) {
      $email = filter_var($_POST['StudentEmail'], FILTER_SANITIZE_STRING);
      $password_1 = $_POST['password'];
      //First hash the password
      $query = "SELECT * FROM student WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $data = $stmt->fetch();
          $user = $data['fullname'];
          $ID = $data['id'];
          $status = $data['status'];
          $password = $data['password'];
          // echo " :".$user;
          if ((password_verify($password_1,$password))&&($status==1)) {
            // code...
           // echo "<br>yes<br>";
            $_SESSION['is_login']= true;
            $_SESSION['USERNAMES'] = $user;
            $_SESSION['USER_ID'] = $ID;
            header('Location:../views/studentdashboard.php');
         } else {
            // code...
           // echo "<br>no<br>";
            $_SESSION["message"] = "Wrong username or password.";
            $_SESSION["msg_type"] = "danger";
            header('Location:../views/studentlogin.php');


         }
         // echo "string : ".var_dump(password_verify($password_1,$password));
    }
//logout
    if (isset($_POST['logout'])){
      session_destroy();
      header('Location:../views/studentlogin.php');
    }

    //changePassword
    if (isset($_POST['changePassword'])) {
      // code...
      $currentPassword =filter_var($_POST['currentPassword'] , FILTER_SANITIZE_STRING);
      $newPassword =filter_var($_POST['newPassword'] , FILTER_SANITIZE_STRING);
      $confirmPassword =filter_var($_POST['confirmPassword'] , FILTER_SANITIZE_STRING);
      $USER_ID = $_POST['USER_ID'];
      if ($newPassword != $confirmPassword)
      {
      $_SESSION["message"] = "The two passwords does not match.";
      $_SESSION["msg_type"] = "danger";
      header('Location:../views/studentsettings.php');

    }else {
      // code...
      $hashed_password = password_hash($confirmPassword, PASSWORD_DEFAULT);

      $stmt = $conn ->prepare("UPDATE student SET password = :confirmPassword WHERE id=$USER_ID");
      $stmt->bindParam(':confirmPassword', $hashed_password);
      $stmt->execute();
      $_SESSION["message"] = "Password Changed.";
      $_SESSION["msg_type"] = "success";
      header('Location:../views/studentsettings.php');
    }


    }



 ?>
                                                                                                                              <!-- CREATED BY AKSHAY JADHAV -->
