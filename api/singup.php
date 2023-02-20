<?php 
include "../database/index.php";


if ( isset($_POST["susername"]) && isset($_POST["spassword"]) && isset($_POST["semail"])) {
    $susername = $_POST['susername'];
    $semail = $_POST['semail'];
    $spassword =  $_POST['spassword'];

  
  $query = 'INSERT INTO user (susername, semail, spassword ) VALUES (:susername, :semail, :spassword)';
    $res = $conn->prepare($query);
       $res->execute(['susername'=> $susername, 'semail' => $semail, 'spassword' => $spassword]);
          if ($res->rowCount() > 0) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data.";
    }
}



?>