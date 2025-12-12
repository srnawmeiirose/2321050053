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
    <div class="container">
      <h1>Thêm thể loại</h1>
      <div>
        <form action="index.php?page_layout=themtheloai" method="post">
          <!-- <div class="box">
            <p>ID thể loại</p>
            <input name="id-the-loai" type="number" placeholder="Id thể loại"/>
          </div> -->
          <div class="box">
            <p>Tên thể loại</p>
            <input name="ten-the-loai" type="text" placeholder="Tên thể loại"/>
          </div>
          <div class="box">
            <input type="submit" value="Thêm mới" />
          </div>
        </form>
      </div>
    </div>
    <?php
    include 'connect.php';

    if(!empty($_POST['ten-the-loai'])) {

        // $id_the_loai = $_POST['id-the-loai'];
        $ten_the_loai = $_POST['ten-the-loai'];

        $sql = "INSERT INTO the_loai (ten_the_loai)
                VALUES ('$ten_the_loai')";
        mysqli_query($conn, $sql);
        header('location: index.php?page_layout=theloai'); 
       }else{
        echo '<p class="warning">Vui lòng nhập đầy đủ thông tin</p>';
       }
    ?>
  </body>
</html>
