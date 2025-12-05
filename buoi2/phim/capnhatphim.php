<?php
include 'connect.php';
$id = $_GET['id'];
    $sql = "select * from phim where id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $phim = mysqli_fetch_assoc($result);

    if(!empty($_POST['ten-phim']) && 
       !empty($_POST['dao-dien']) &&
       !empty($_POST['nam-phat-hanh']) &&
       !empty($_POST['poster']) &&
       !empty($_POST['quoc-gia']) &&
       !empty($_POST['so-tap']) &&
       !empty($_POST['trailer']) &&
       !empty($_POST['mo-ta'])) {

        $tenPhim = $_POST['ten-phim'];
        $daoDien = $_POST['dao-dien'];
        $namPhatHanh = $_POST['nam-phat-hanh'];
        $poster = $_POST['poster'];
        $quocGia = $_POST['quoc-gia'];
        $soTap = $_POST['so-tap'];
        $trailer = $_POST['trailer'];
        $moTa = $_POST['mo-ta'];

        $sql =  "UPDATE phim
                SET ten_phim='$tenPhim',
                    dao_dien_id='$daoDien',
                    nam_phat_hanh='$namPhatHanh',
                    poster='$poster',
                    quoc_gia_id='$quocGia',
                    so_tap='$soTap',
                    trailer='$trailer',
                    mo_ta='$moTa'
                WHERE id = '$id';";
        mysqli_query($conn, $sql);
        header('location: index.php?page_layout=phim'); 
       }else{
        echo '<p class="warning">Vui lòng nhập đầy đủ thông tin</p>';
       }

        $sqlDaoDien = "SELECT id, ten_dang_nhap FROM nguoi_dung ORDER BY ten_dang_nhap";
        $dsDaoDien = mysqli_query($conn, $sqlDaoDien);

        $sqlQuocGia = "SELECT id, ten_quoc_gia FROM quoc_gia ORDER BY ten_quoc_gia";
        $dsQuocGia = mysqli_query($conn, $sqlQuocGia);
    ?>
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
      <h1>Cập nhật phim phim</h1>
      <div>
        <form action="index.php?page_layout=capnhatphim&id=<?php echo $id ?>" method="post">
          <div class="box">
            <p>Ten phim</p>
            <input name="ten-phim" type="text" placeholder="Tên phim" value="<?php echo $phim['ten_phim'] ?>"/>
          </div>
          <div class="box">
            <p>Đạo diễn</p>
            <select name="dao-dien">
              <option value="">Dao dien</option>
              <?php while($row = mysqli_fetch_assoc($dsDaoDien)) : ?>
                <option value="<?= $row['id'] ?>" <?php echo $phim['dao_dien_id'] == $row['id'] ? "selected" : "" ?> ><?= $row['ten_dang_nhap'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="box">
            <p>Nam phat hanh</p>
            <input name="nam-phat-hanh" type="number" placeholder="Năm phát hành" value="<?php echo $phim['nam_phat_hanh'] ?>"/>
          </div>
          <div class="box">
            <p>Poster</p>
            <input name="poster" type="text" placeholder="Poster" value="<?php echo $phim['poster'] ?>"/>
          </div>
          <div class="box">
            <p>Quốc gia</p>
            <select name="quoc-gia">
              <option value="">Quoc gia</option>
              <?php while($row = mysqli_fetch_assoc($dsQuocGia)) : ?>
                <option value="<?= $row['id'] ?>" <?php echo $phim['quoc_gia_id'] == $row['id'] ? "selected" : "" ?> ><?= $row['ten_quoc_gia'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="box">
            <p>So tap</p>
            <input name="so-tap" type="number" placeholder="Số tập" value="<?php echo $phim['so_tap'] ?>"/>
          </div>
          <div class="box">
            <p>Trailer</p>
            <input name="trailer" type="text" placeholder="Trailer" value="<?php echo $phim['trailer'] ?>"/>
          </div>
          <div class="box">
            <p>Mo ta</p>
            <input name="mo-ta" type="text" placeholder="Mô tả" value="<?php echo $phim['mo_ta'] ?>"/>
          </div>
          <div class="box">
            <input type="submit" value="Cập nhật" />
          </div>
        </form>
      </div>
    </div>
    
  </body>
</html>
