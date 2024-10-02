<?php include "../connect.php" ?>

<html>
<head>
    <meta charset="utf-8">

</head>
<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM product");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        ?>
        รหัสสินค้า : <?= $row["pid"] ?><br>
        ชื่อสินค้า : <?= $row["pname"] ?><br>
        รายละเอียดสินค้า : <?= $row["pdetail"] ?><br>
        ราคา : <?= $row["price"] ?> บาท<br>
        <a href="#" onclick="updateArticle('./product/editProductForm.php?pid=<?=$row['pid']?>'); return false;" style="color: red">แก้ไข</a>
        <a href="#" onclick="test('<?=$row['pid']?>')" style="color: red">ลบ</a>
        <hr>
        <?php
    }
    ?>
    
</body>
</html>
