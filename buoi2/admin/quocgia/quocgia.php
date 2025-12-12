<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="bang.css">
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center;">
      <h1>Thông tin quốc gia</h1>
    <a class="them" href="index.php?page_layout=themquocgia">Thêm quốc gia</a>
    </div>
     <table border = 1>
      <tr>
        <th>ID</th>
        <th>Tên quốc gia</th>
        <th>Chức năng</th>
      </tr>
      <?php 
      include ("connect.php");
      $sql = "SELECT * FROM quoc_gia";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
        <td><?php echo $row["id"]?></td>
        <td><?php echo $row["ten_quoc_gia"]?></td>
        <td class="sua-xoa">
    <a class="sua" href="index.php?page_layout=capnhatquocgia&id=<?php echo $row['id']?>&tenQuocGia=<?php echo $row['ten_quoc_gia']?>">Cập nhật</a>
    <a class="xoa" href="xoaquocgia.php?id=<?php echo $row['id']?>">Xóa</a>
        </td>
      </tr>
      <?php } ?>
    </table>
</body>
</html>