<?php
include_once '../helpers/init.php';


//This sends the grievance to University level
if (isset($_POST['LevelUni'])) {
  $CASE_ID = $_POST['caseId'];
  // echo "CASE ID: ".$CASE_ID;

  $stmt = $conn->prepare("SELECT * FROM grievancec WHERE id=:id");
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $result = $stmt->fetch();
  // echo "<br>NAME: ".$result['grievancetype'];
  $principalleveltime= $result['submittime'];
  $submittime =date("Y-m-d H:i:s");
  // echo "Date: ".$olddate;
  $Status = 'Check email to know Status';
  $level = 'University';
  $stmt = $conn ->prepare("UPDATE grievancec SET submittime = :submittime,status=:status,principalleveltime=:principalleveltime,level=:level WHERE id=:id");
  $stmt->bindParam(':submittime', $submittime);
  $stmt->bindParam(':status', $Status);
  $stmt->bindParam(':level', $level);
  $stmt->bindParam(':principalleveltime', $principalleveltime);

  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $_SESSION["message"] = "Grievance Send to University Level.";
  $_SESSION["msg_type"] = "success";

  header('Location:https://goo.gl/forms/6R2rFmsaphcRYIrg2');
}

//This sends the grievance to AICTE level
if (isset($_POST['LevelAICTE'])) {
  $CASE_ID = $_POST['caseId'];
  // echo "CASE ID: ".$CASE_ID;

  $stmt = $conn->prepare("SELECT * FROM grievancec WHERE id=:id");
  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $result = $stmt->fetch();
  // echo "<br>NAME: ".$result['grievancetype'];
  $universityleveltime= $result['submittime'];
  $submittime =date("Y-m-d H:i:s");
  // echo "Date: ".$olddate;
  $Status = 'Check email to know Status';
  $level = 'AICTE';
  $stmt = $conn ->prepare("UPDATE grievancec SET submittime = :submittime,status=:status,universityleveltime=:universityleveltime,level=:level WHERE id=:id");
  $stmt->bindParam(':submittime', $submittime);
  $stmt->bindParam(':status', $Status);
  $stmt->bindParam(':level', $level);
  $stmt->bindParam(':universityleveltime', $universityleveltime);

  $stmt->bindParam(':id', $CASE_ID);
  $stmt->execute();
  $_SESSION["message"] = "Grievance Send to AICTE Level.";
  $_SESSION["msg_type"] = "success";

  header('Location:https://www.aicte-india.org/grievance');
}

 ?>
