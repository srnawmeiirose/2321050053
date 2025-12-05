<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      main {
        width: 50%;
        margin: auto;
      }
      select{
        padding: 5px 0;
      }
    </style>
     <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php 
    $tenTheLoai = $_GET['tentheloai'];
    $id = $_GET['id'];
    ?>
    <div class="container">
      <h1>Cập nhật thể loại</h1>
      <div>
        <form action="index.php?page_layout=capnhattheloai&id=<?php echo $id?>" method="post">
     
          <div class="box">
            <p>Tên thể loại</p>
            <input name="ten-the-loai" type="text" placeholder="Tên thể loại" value="<?php echo $tenTheLoai ?>"/>
          </div>
          <div class="box">
            <input type="submit" value="Cập nhật" />
          </div>
        </form>
      </div>
    </div>
    <?php
    include 'connect.php';

    if(!empty($_POST['ten-the-loai'])) {
        $id = $_GET['id'];
        $ten_the_loai = $_POST['ten-the-loai'];

        $sql = "UPDATE the_loai SET ten_the_loai='$ten_the_loai' WHERE id= '$id'";
        mysqli_query($conn, $sql);
        header('location: index.php?page_layout=theloai'); 
       }else{
        echo '<p class="warning">Vui lòng nhập đầy đủ thông tin</p>';
       }
    ?>
  </body>
</html>
