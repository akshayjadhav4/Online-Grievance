<?php
include_once '../helpers/init.php';

//Register the Grievance
if (isset($_POST['submit'])) {
  $USER_ID = $_POST['USER_ID'];
  $name = filter_var($_POST['studentName'], FILTER_SANITIZE_STRING);
  $studentRollNo = filter_var($_POST['studentRollNo'], FILTER_SANITIZE_STRING);
  $department = filter_var($_POST['studentDepartment'], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST['studentContactNo'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['studentEmailID'], FILTER_SANITIZE_EMAIL);
  $grievanceType = filter_var($_POST['grievanceType'], FILTER_SANITIZE_STRING);
  $grievance = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
  $status = 'Not Process Yet';
  $level = 'Committee';
  $readstatus = 'notread';
  $principalread = 'not';
  // echo "NAME: ".$USER_ID;
  $folder ="../uploads/";

$image = $_FILES['image']['name'];

$path = $folder . $image ;

$target_file=$folder.basename($_FILES["image"]["name"]);


 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


$allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name'];

$ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) )

{

 $_SESSION["message"] = "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
 $_SESSION["msg_type"] = "danger";

 header('Location:../views/registergrievance.php');
}

else{


  move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);

  $stmt = $conn ->prepare("INSERT INTO grievancec (user_id, name, rollno, department, contactno, email ,grievancetype,image,description ,status,level,readstatus,principalread)
  VALUES (:user_id, :name, :rollno, :department ,:contactno,:email,:grievancetype,:image, :description ,:status,:level,:readstatus,:principalread)");
  $stmt->bindParam(':user_id', $USER_ID);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':rollno', $studentRollNo);
  $stmt->bindParam(':department', $department);
  $stmt->bindParam(':contactno', $phone);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':grievancetype', $grievanceType);
  $stmt->bindParam(':image',$image);
  $stmt->bindParam(':description', $grievance);
  $stmt->bindParam(':status', $status);
  $stmt->bindParam(':level', $level);
  $stmt->bindParam(':readstatus', $readstatus);
  $stmt->bindParam(':principalread', $principalread);

  $stmt->execute();
  $_SESSION["message"] = "Grievance Registerd.";
  $_SESSION["msg_type"] = "success";

  header('Location:../views/registergrievance.php');

}

}

//DELETE THE GRIEVANCE
if (isset($_POST['deleteGrievance'])) {
  // code...
  $delete_id = $_POST['CASE_ID'];
  $stmt = $conn ->prepare("DELETE FROM grievancec WHERE id = :id");
  $stmt->bindParam(':id', $delete_id);
  $stmt->execute();

  //REDIRECT THE USER
  header("Location:../views/studentdashboard.php");
}

 ?>
