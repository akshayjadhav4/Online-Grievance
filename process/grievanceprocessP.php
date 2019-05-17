<?php
include_once '../helpers/init.php';


//This sends the grievance to principal level
if (isset($_POST['nextLevelP'])) {
  $CASE_ID = $_POST['caseId'];
  // echo "CASE ID: ".$CASE_ID;

  $stmt = $conn->prepare("SELECT * FROM grievancec WHERE id=:id");
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $result = $stmt->fetch();
  // echo "<br>NAME: ".$result['grievancetype'];
  $oldtime= $result['submittime'];
  $submittime =date("Y-m-d H:i:s");
  // echo "Date: ".$olddate;
  $level = 'Principal';
  $stmt = $conn ->prepare("UPDATE grievancec SET submittime = :submittime,oldtime=:oldtime,level=:level WHERE id=:id");
  $stmt->bindParam(':submittime', $submittime);
  $stmt->bindParam(':oldtime', $oldtime);
  $stmt->bindParam(':level', $level);
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $_SESSION["message"] = "Grievance Send to Principal Level.";
  $_SESSION["msg_type"] = "success";

  header('Location:../views/studentdashboard.php');
}
  if (isset($_POST['makereadp'])) {
    // code...
    $CASE_ID = $_POST['case_id'];
    $principalread = 'read';
    $stmt = $conn ->prepare("UPDATE grievancec SET principalread = :principalread WHERE id=:id");
    $stmt->bindParam(':principalread', $principalread);
    $stmt->bindParam(':id', $CASE_ID);
    $stmt->execute();
    header('Location:../views/principaldashboard.php');

  }

  if (isset($_POST['responceP'])) {
    // code...
    $CASE_ID = $_POST['case_id'];
    $status = filter_var($_POST['grievanceStatus'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $stmt = $conn ->prepare("UPDATE grievancec SET status = :status, message =:message WHERE id=:id");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':id', $CASE_ID);
    $stmt->execute();
    header('Location:../views/principaldashboard.php');

  }


 ?>
