<?php 
include "../connect.php"; 
session_start();
?>

<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];

        if (isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1) {
            $stmt = $pdo->prepare("
                SELECT orders.username, COUNT(orders.ord_id) AS order_count
                FROM orders 
                JOIN item ON item.ord_id = orders.ord_id
                GROUP BY orders.username
            ");
            $stmt->execute();

            echo "<h2>จำนวน Order ของผู้ใช้แต่ละคน</h2>";
            while ($row = $stmt->fetch()) {
                echo "ผู้ใช้: " . ($row['username']) . " - จำนวน Order: " . ($row['order_count']) . "<br>";
            }
        } else {
            $stmt = $pdo->prepare("
                SELECT orders.ord_id , orders.ord_date , product.pname , product.price , item.quantity
                FROM orders 
                JOIN item ON item.ord_id = orders.ord_id
                JOIN product ON item.pid = product.pid
                WHERE orders.username = ?
            ");
            $stmt->execute([$username]);
            echo "<h2>รายการ Order ของคุณ</h2>";
            while ($row = $stmt->fetch()) {
                echo "Order ID: " . ($row['ord_id']) . "<br>";
                echo "วันที่สั่งซื้อ: " . ($row['ord_date']) . "<br>";
                echo "สินค้า: " . ($row['pname']) . "<br>";
                echo "จำนวน: " . ($row['quantity']) . "<br>";
                echo "ราคา: " . ($row['price']) * ($row['quantity']) . "<hr>";
            }
        }
    } else {
        echo "คุณยังไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน.";
    }
    ?>
</body>
</html>
