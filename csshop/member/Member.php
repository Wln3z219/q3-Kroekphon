<?php include "../connect.php" ?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div style="display:flex">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        ?>
        <?php while ($row = $stmt->fetch()): ?>
            <div style="padding: 15px; text-align: center">
                <a href="#" onclick="updateArticle('./member/Memberdetail.php?username=<?= $row['username'] ?>'); return false;">
                    <img src='./member/img/<?= $row["username"] ?>.jpg' width='100'>
                </a><br>
                <?= $row["name"] ?><br><?= $row["email"] ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>