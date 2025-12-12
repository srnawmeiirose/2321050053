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
    $tenQuocGia = $_GET['tenQuocGia'];
    $id = $_GET['id'];
    ?>
    <div class="container">
      <h1>Cập nhật quốc gia</h1>
      <div>
        <form action="index.php?page_layout=capnhatquocgia&id=<?php echo $id?>" method="post">
     
          <div class="box">
            <p>Tên quốc gia</p>
            <input name="ten-quoc-gia" type="text" placeholder="Tên quốc gia" value="<?php echo $tenQuocGia?>"/>
          </div>
          <div class="box">
            <input type="submit" value="Cập nhật" />
          </div>
        </form>
      </div>
    </div>
    <?php
    include 'connect.php';

    if(!empty($_POST['ten-quoc-gia'])) {
        $id = $_GET['id'];
        $ten_quoc_gia = $_POST['ten-quoc-gia'];

        $sql = "UPDATE quoc_gia SET ten_quoc_gia='$ten_quoc_gia' WHERE id= '$id'";
        mysqli_query($conn, $sql);
        header('location: index.php?page_layout=quocgia'); 
       }else{
        echo '<p class="warning">Vui lòng nhập đầy đủ thông tin</p>';
       }
    ?>
  </body>
</html>
