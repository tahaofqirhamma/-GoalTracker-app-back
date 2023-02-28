<?php

include "../database/index.php";


$query = "SELECT * FROM task WHERE task_owner = :test";
$res = $conn->prepare($query);
$res->execute(['test' => 14]);
$rows = $res->fetchAll();
if ($res->rowCount() > 0) {
    foreach ($rows as $row) {
        $task = array('tn' => $row['tname'], 'tdesc' => $row['tdescription'], 'td' => $row['tdate'], 'ts' => $row['tstate'], 'tnum' => $row['num_task']);
        $tasks[] = $task;
    }
    echo json_encode($tasks);
} else {
    echo json_encode(['message' => 'no tasks found']);
}
