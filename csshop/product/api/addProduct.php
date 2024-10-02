<?php include "../../connect.php" ?>

<?php
    $stmt = $pdo->prepare("INSERT INTO product (pname, pdetail, price) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $_POST['pname']);
    $stmt->bindParam(2, $_POST['pdetail']);
    $stmt->bindParam(3, $_POST['price']);
    $stmt->execute();
    
    $stmt = $pdo->prepare("SELECT pid FROM product WHERE pname = ?");
    $stmt->bindParam(1, $_POST['pname']);
    $stmt->execute();
    $row = $stmt->fetch();
    $pid = $row['pid'];
    
    $targetDir = '../img/';
    
    $targetFile = $targetDir . $pid . '.' . 'jpg';

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        header("location:../../mpage.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
        print_r($_FILES);
    }
?>