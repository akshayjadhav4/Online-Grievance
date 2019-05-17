<?php
include_once '../helpers/init.php';

//Make Grievance Read
if (isset($_POST['makeread'])) {
  $CASE_ID = $_POST['case_id'];
  $readstatus = 'read';
  $stmt = $conn ->prepare("UPDATE grievancec SET readstatus = :readstatus WHERE id=:id");
  $stmt->bindParam(':readstatus', $readstatus);
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  header('Location:../views/committeemembersdashboard.php');

  // echo "ID: ".$CASE_ID;
}

//Action on grievancec by committeemembers

if (isset($_POST['responce'])) {
  // code...
  $CASE_ID = $_POST['case_id'];
  $status = filter_var($_POST['grievanceStatus'], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  $stmt = $conn ->prepare("UPDATE grievancec SET status = :status, message =:message WHERE id=:id");
  $stmt->bindParam(':status', $status);
  $stmt->bindParam(':message', $message);
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  header('Location:../views/committeemembersdashboard.php');

}

 ?>
