<?php include "../connect.php"; ?>

<html>
<head>
    <meta charset="utf-8">
</head>
<?php

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<div style="display:flex">
    <div>
        <img src='./member/img/<?= $row["username"] ?>.jpg' width='200'>
    </div>
    <div style="padding: 15px">
        <h2><?= $row["name"] ?></h2>
        อีเมลล์ : <?= $row["email"] ?><br>
        เบอร์ <?= $row["mobile"] ?><br><br>
        ที่อยู่ <?= $row["address"]?>
    </div>
</div>
</body>

</html>