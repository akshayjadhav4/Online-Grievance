<?php

include_once '../helpers/init.php';

//Add the committeemembers
    if (isset($_POST['AddMember'])){
      $name = filter_var($_POST['committeeMemberName'], FILTER_SANITIZE_STRING);
      $departmentname = filter_var($_POST['departmentName'],FILTER_SANITIZE_STRING);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $position = filter_var($_POST['position'],FILTER_SANITIZE_STRING);
      $password = $_POST['Password'];

      $stmt = $conn->query("SELECT * FROM committeemembers WHERE name='$name'");
      $stmt->execute();
      $num_rows = $stmt->fetchColumn();

      if ($num_rows>0) {
            // code...
            $_SESSION["message"] = "This Username already exists.";
            $_SESSION["msg_type"] = "danger";
            header('Location:../views/AddCommitteeMembers.php');

          } else {
            // code...
            // TO REGISTER Member
            if (count($errors) == 0) {
              // code...
              $hashed_password = password_hash($password, PASSWORD_DEFAULT);
              // prepare sql and bind parameters
               $stmt = $conn ->prepare("INSERT INTO committeemembers (name, departmentname , email , position , password)
               VALUES (:name,:departmentname,:email,:position,:password)");
               $stmt->bindParam(':name', $name);
               $stmt->bindParam(':departmentname', $departmentname);
               $stmt->bindParam(':email', $email);
               $stmt->bindParam(':position', $position);
               $stmt->bindParam(':password', $hashed_password);
               $stmt->execute();
               $_SESSION["message"] = "Account is created.";
               $_SESSION["msg_type"] = "success";

            }
            header('Location:../views/AddCommitteeMembers.php');

          }

    }


$conn = null;
 ?>



                                                                                                                              <!-- CREATED BY AKSHAY JADHAV -->
