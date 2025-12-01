<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bang.css">
</head>
<body>
    <h1>Quản lý thông tin phim</h1>
    <table border = 1>
      <tr>
        <th>Tên phim</th>
        <th>Đạo diễn</th>
        <th>Năm phát hành</th>
        <th>Poster</th>
        <th>Quốc gia</th>
        <th>Số tập</th>
        <th>Trailer</th>
        <th>Mô tả</th>
        <th>Chức năng</th>
      </tr>
      <?php 
      include ("connect.php");
      $sql = "SELECT p.*, nd.ho_ten AS ten_dao_dien, qg.ten_quoc_gia FROM phim p JOIN nguoi_dung nd ON p.dao_dien_id = nd.id JOIN quoc_gia qg ON p.quoc_gia_id = qg.id;";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){

      
      ?>
      <tr>
        <td><?php echo $row["ten_phim"]?></td>
        <td><?php echo $row["ten_dao_dien"]?></td>
        <td><?php echo $row["nam_phat_hanh"]?></td>
        <td><?php echo $row["poster"]?></td>
        <td><?php echo $row["ten_quoc_gia"]?></td>
        <td><?php echo $row["so_tap"]?></td>
        <td><?php echo $row["trailer"]?></td>
        <td><?php echo $row["mo_ta"]?></td>
        <td class="sua-xoa">
    <a class="sua" href="#">Sửa</a>
    <a class="xoa" href="xoaphim.php?id=<?php echo $row['id']?>">Xóa</a>
        </td>
      </tr>
      <?php } ?>
    </table>
</body>
</html>