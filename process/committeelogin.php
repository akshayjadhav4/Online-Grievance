<?php
include_once '../helpers/init.php';

//committeelogin
if (isset($_POST['login'])) {
      $username = filter_var($_POST['committeeMemberName'], FILTER_SANITIZE_STRING);
      $password_1 = $_POST['password'];
      //First hash the password
      $query = "SELECT * FROM committeemembers WHERE name = :name";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':name', $username);
            $stmt->execute();
            $data = $stmt->fetch();
          $user = $data['name'];
          $ID = $data['id'];
          $password = $data['password'];
          // echo " :".$user;
          if (password_verify($password_1,$password)) {
            // code...
           // echo "<br>yes<br>";
            $_SESSION['is_login']= true;
            $_SESSION['USERNAMEC'] = $user;
            $_SESSION['USER_ID'] = $ID;
            header('Location:../views/committeemembersdashboard.php');
         } else {
            // code...
           // echo "<br>no<br>";
            $_SESSION["message"] = "Wrong username or password.";
            $_SESSION["msg_type"] = "danger";
            header('Location:../views/committeelogin.php');


         }
         // echo "string : ".var_dump(password_verify($password_1,$password));
    }
//logout
    if (isset($_POST['logout'])){
      session_destroy();
      header('Location:../views/committeelogin.php');
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
      header('Location:../views/committeesettings.php');

    }else {
      // code...
      $hashed_password = password_hash($confirmPassword, PASSWORD_DEFAULT);

      $stmt = $conn ->prepare("UPDATE committeemembers SET password = :confirmPassword WHERE id=$USER_ID");
      $stmt->bindParam(':confirmPassword', $hashed_password);
      $stmt->execute();
      $_SESSION["message"] = "Password Changed.";
      $_SESSION["msg_type"] = "success";
      header('Location:../views/committeesettings.php');
    }


    }

    if (isset($_POST['remove'])){
      $delete_id = $_POST['id'];
      $stmt = $conn ->prepare("DELETE FROM principal WHERE id = :id");
      $stmt->bindParam(':id', $delete_id);
      $stmt->execute();

      //REDIRECT THE USER
      header("Location:../views/principalaccount.php");
    }
 ?>
