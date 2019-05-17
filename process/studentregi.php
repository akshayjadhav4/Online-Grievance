<?php

include_once '../helpers/init.php';

//Student Registration
    if (isset($_POST['register'])){
      $name = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING);
      $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
      $phone = filter_var($_POST['phoneNumber'], FILTER_SANITIZE_STRING);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $year = filter_var($_POST['year'], FILTER_VALIDATE_INT);
      $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
      $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
      $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
      $status = 0;
      $stmt = $conn->query("SELECT * FROM student WHERE email='$email'");
      $stmt->execute();
      $num_rows = $stmt->fetchColumn();
      // echo "department : ".$department;

      if ($num_rows>0) {
            // code...
            $_SESSION["message"] = "This Email already exists.";
            $_SESSION["msg_type"] = "danger";
            header('Location:../views/studentregi.php');

          } else {
            // code...
            // TO REGISTER Member
            if (count($errors) == 0) {
              // code...
              $hashed_password = password_hash($password, PASSWORD_DEFAULT);
              // prepare sql and bind parameters
               $stmt = $conn ->prepare("INSERT INTO student (fullname, age, phonenumber, email ,year,department,gender, password ,status)
               VALUES (:fullname, :age, :phonenumber, :email ,:year,:department,:gender, :password ,:status)");
               $stmt->bindParam(':fullname', $name);
               $stmt->bindParam(':age', $age);
               $stmt->bindParam(':phonenumber', $phone);
               $stmt->bindParam(':email', $email);
               $stmt->bindParam(':year', $year);
               $stmt->bindParam(':department', $department);
               $stmt->bindParam(':gender', $gender);
               $stmt->bindParam(':password', $hashed_password);
               $stmt->bindParam(':status', $status);

               $stmt->execute();
               $_SESSION["message"] = "Account is created.";
               $_SESSION["msg_type"] = "success";

            }
            header('Location:../views/studentregi.php');

          }

    }


//Account verification by admin
    if (isset($_POST['verified'])){
      $status=1;
      $id = $_POST['id'];
      $stmt = $conn ->prepare("UPDATE student SET status = :status WHERE id=:id");
      $stmt->bindParam(':status', $status);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $_SESSION["message"] = "Account Verified.";
      $_SESSION["msg_type"] = "success";
      header('Location:../views/verifystudent.php');
    }






$conn = null;
 ?>
