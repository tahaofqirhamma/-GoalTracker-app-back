  <?php

  include "../database/index.php";

  if (isset($_POST["taskname"]) && isset($_POST["taskdesc"]) && isset($_POST["taskdate"]) && $_POST['taskstate'] && isset($_POST['userID'])) {
    $taskname = $_POST['taskname'];
    $taskdate = $_POST['taskdate'];
    $taskdesc =  $_POST['taskdesc'];
    $taskstate =  $_POST['taskstate'];
    $userID = $_POST['userID'];
    echo $userID;


    $query = 'INSERT INTO task (tname, tstate ,tdescription , tdate, task_owner) VALUES (:taskname, :taskstate, :taskdesc, :taskdate,:task_owner)';
    $res = $conn->prepare($query);
    $res->execute(['taskname' => $taskname, 'taskdate' => $taskdate, 'taskdesc' => $taskdesc, 'taskstate' => $taskstate, 'task_owner' => $userID]);
    if ($res->rowCount() > 0) {
      echo "data ";
    } else {
      echo "Error inserting data.";
    }
  }
