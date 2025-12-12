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
      <h1>Thêm quốc gia</h1>
      <div>
        <form action="index.php?page_layout=themquocgia" method="post">
          <!-- <div class="box">
            <p>ID quốc gia</p>
            <input name="id-quoc-gia" type="number" placeholder="Id quốc gia"/>
          </div> -->
          <div class="box">
            <p>Tên quốc gia</p>
            <input name="ten-quoc-gia" type="text" placeholder="Tên quốc gia"/>
          </div>
          <div class="box">
            <input type="submit" value="Thêm mới" />
          </div>
        </form>
      </div>
    </div>
    <?php
    include 'connect.php';

    if(!empty($_POST['ten-quoc-gia'])) {

        // $id_quoc_gia = $_POST['id-quoc-gia'];
        $ten_quoc_gia = $_POST['ten-quoc-gia'];

        $sql = "INSERT INTO quoc_gia ( ten_quoc_gia)
                VALUES ('$ten_quoc_gia')";
        mysqli_query($conn, $sql);
        header('location: index.php?page_layout=quocgia'); 
       }else{
        echo '<p class="warning">Vui lòng nhập đầy đủ thông tin</p>';
       }
    ?>
  </body>
</html>
