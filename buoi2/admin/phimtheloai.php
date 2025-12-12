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
      <h1>Quan ly the loai</h1>
    </div>
    <table border = 1>
      <tr>
        <th>ID</th>
        <th>ID phim</th>
        <th>Tên phim</th>
        <th>ID the loai</th>
        <th>Ten the loai</th>
        <!-- <th>Chức năng</th> -->
      </tr>
      <?php 
      include ("connect.php");
      $sql ="SELECT ptl.id, ptl.phim_id, p.ten_phim, ptl.the_loai_id, tl.ten_the_loai FROM phim_the_loai ptl JOIN phim p ON ptl.phim_id = p.id JOIN the_loai tl ON ptl.the_loai_id = tl.id";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){

      ?>
      <tr>
        <td><?php echo $row["id"]?></td>
        <td><?php echo $row["phim_id"]?></td>
        <td><?php echo $row["ten_phim"]?></td>
        <td><?php echo $row["the_loai_id"]?></td>
        <td><?php echo $row["ten_the_loai"]?></td>
        <!-- <td class="sua-xoa">
          <a class="sua" href="index.php?page_layout=capnhatphim&id=<?php echo $row['id']?>">Cập nhật</a>
          <a class="xoa" href="xoaphim.php?id=<?php echo $row['id']?>">Xóa</a>
        </td> -->
      </tr>
      <?php } ?>
    </table>
</body>
</html>