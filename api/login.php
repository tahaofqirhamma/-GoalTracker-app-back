
<?php
include "../database/index.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $Lemail = $_POST['email'];
    $Lpassword = $_POST['password'];

    $query = "SELECT semail, spassword, susername, id FROM user WHERE semail = :lemail AND spassword = :lpassword";
    $res = $conn->prepare($query);
    $res->execute(['lemail' => $Lemail, 'lpassword' => $Lpassword]);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if ($res->rowCount() > 0) {
        $token = bin2hex(random_bytes(32));
        echo json_encode(['message' => 'Login successful', 'token' => $token, 'username' => $row['susername'], 'isLoged' => true, 'id' => $row['id']]);
    } else {
        echo json_encode(['message' => 'User not found', 'isLoged' => false]);
    }
}

?>