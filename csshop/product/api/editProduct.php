<?php include "../../connect.php" ?>
<?php
$stmt = $pdo->prepare("UPDATE product SET pname=?, pdetail=?, price=? WHERE pid=?");
$stmt->bindParam(1, $_POST["pname"]);
$stmt->bindParam(2, $_POST["pdetail"]);
$stmt->bindParam(3, $_POST["price"]);
$stmt->bindParam(4, $_POST["pid"]);
$targetDir = '../img/';
$pid = $_POST["pid"];
$oldImage = $targetDir . $pid . '.jpg';

if (!empty($_FILES['image']['name'])) {
    // Delete the old image if it exists
    if (file_exists($oldImage)) {
        unlink($oldImage , $targetDir);
    }
    
    $targetFile = $targetDir . $pid . '.' . 'jpg';

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        header("location:../../mpage.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
        print_r($_FILES);
    }
}

if ($stmt->execute())
    header("location:../../mpage.php");
?>