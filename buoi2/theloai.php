<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="bang.css">
</head>
<body>
    <h1>Thể loại</h1>
    <table border = 1>
      <tr>
        <th>Số thứ tự</th>
        <th>Thể loại</th>
        <th>Chức năng</th>
      </tr>
      <?php 
      include ("connect.php");
      $sql = "SELECT * FROM the_loai";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){

      
      ?>
      <tr>
        <td><?php echo $row["id"]?></td>
        <td><?php echo $row["ten_the_loai"]?></td>
        <td>
            <button>Sửa</button>
            <a class = "xoa" href="xoatheloai.php?id=<?php echo $row["id"]?>">Xóa</a>
        </td>
      </tr>
      <?php } ?>
    </table>
</body>
</html>