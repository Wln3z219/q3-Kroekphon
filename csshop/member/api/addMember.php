<?php include "../../connect.php"; ?>

<?php

    $isAdmin = 0;

    $stmt = $pdo->prepare("INSERT INTO member (username, password, name, mobile, email, address , isAdmin) VALUES (?, ?, ?, ?, ?, ? , ?)");
    $stmt->bindParam(1, $_POST['username']);
    $stmt->bindParam(2, $_POST['password']);
    $stmt->bindParam(3, $_POST['name']);
    $stmt->bindParam(4, $_POST['mobile']);
    $stmt->bindParam(5, $_POST['email']);
    $stmt->bindParam(6, $_POST['address']);
    $stmt->bindParam(7, $isAdmin);
    $stmt->execute();
    
    $stmt = $pdo->prepare("SELECT username FROM member WHERE username = ?");
    $stmt->bindParam(1, $_POST['username']);
    $stmt->execute();
    $row = $stmt->fetch();
    $username = $row['username'];
    
    $targetDir = '../img/';
    
    $targetFile = $targetDir . $username . '.jpg';

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        header("location:../../mpage.php");
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
        print_r($_FILES);
    }
?>