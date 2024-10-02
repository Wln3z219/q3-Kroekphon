<form action="./product/api/addProduct.php" method="post" enctype="multipart/form-data">
    ชื่อสินค้า : <input type="text" name="pname"><br>
    รายละเอียดสินค้า  : <br>
    <textarea name="pdetail" rows="3" cols="40"></textarea><br>
    ราคา: <input type="number" name="price"><br>
    Select image to upload:
    <input type="file" name="image" id="image"><br>
    <input type="submit" name="submit" value="เพิ่มสินค้า">
</form>
