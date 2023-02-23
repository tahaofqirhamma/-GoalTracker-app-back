<?php 
include "../database/index.php";
  echo "1" . $_POST["taskname"] ;
  echo "1" . $_POST["taskdesc"] ;
  echo "1" . $_POST["taskdate"] ;
  echo "1" . $_POST["taskstate"] ;


if ( isset($_POST["taskname"]) && isset($_POST["taskdesc"]) && isset($_POST["taskdate"]) && $_POST['taskstate']) {
    $taskname = $_POST['taskname'];
    $taskdate = $_POST['taskdate'];
    $taskdesc =  $_POST['taskdesc'];
    $taskstate =  $_POST['taskstate'];

  $taskowner = 8;

  
  $query = 'INSERT INTO task (tname, tstate ,tdescription , tdate, task_owner) VALUES (:taskname, :taskstate, :taskdesc, :taskdate,:task_owner )';
    $res = $conn->prepare($query);
       $res->execute(['taskname'=> $taskname, 'taskdate' => $taskdate, 'taskdesc' => $taskdesc,'taskstate' => $taskstate, 'task_owner' => $taskowner]);
          if ($res->rowCount() > 0) {
        echo "Data inserted successfully $taskowner";
    } else {
        echo "Error inserting data.";
    }
}