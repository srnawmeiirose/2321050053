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
    </style>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    include 'connect.php'; 
    $id = $_GET['id'];
    $sql = "select * from nguoi_dung where id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $nguoiDung = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
      <h1>Cập nhật người dùng</h1>
      <div>
        <form action="index.php?page_layout=capnhatnguoidung&id=<?php echo $id ?>" method="post">
          <div class="box">
            <p>Ten dang nhap</p>
            <input name="ten-dang-nhap" type="text" placeholder="Tên đăng nhập" value="<?php echo $nguoiDung['ten_dang_nhap'] ?>"/>
          </div>
          <div class="box">
            <p>Mat khau</p>
            <input name="password" type="password" placeholder="Mật khẩu" value="<?php echo $nguoiDung['mat_khau'] ?>"/>
          </div>
          <div class="box">
            <p>Ho ten</p>
            <input name="hoten" type="text" placeholder="Họ tên" value="<?php echo $nguoiDung['ho_ten'] ?>" />
          </div>
          <div class="box">
            <p>Email</p>
            <input name="email" type="email" placeholder="Email" value="<?php echo $nguoiDung['email'] ?>" />
          </div>
          <div class="box">
            <p>So dien thoai</p>
            <input name="so-dien-thoai" type="text" placeholder="Số điện thoại" value="<?php echo $nguoiDung['sdt'] ?>" />
          </div>
          <div class="box">
            <p>Ngay sinh</p>
            <input name="ngay-sinh" type="date" placeholder="Ngày sinh" value="<?php echo $nguoiDung['ngay_sinh'] ?>" />
          </div>
          <div class="box">
            <p>Vai tro</p>
            <select name="vai-tro">
              <option value="1" <?php echo $nguoiDung['vai_tro_id'] == 1 ? "selected" : "" ?> >admin</option>
              <option value="2" <?php echo $nguoiDung['vai_tro_id'] == 2 ? "selected" : "" ?> >dao dien</option>
              <option value="3" <?php echo $nguoiDung['vai_tro_id'] == 3 ? "selected" : "" ?> >dien vien</option>
              <option value="4" <?php echo $nguoiDung['vai_tro_id'] == 4 ? "selected" : "" ?> >nguoi dung</option>
            </select>
          </div>
          <div class="box">
            <input type="submit" value="Cập nhật" />
          </div>
        </form>
      </div>
    </div>
    <?php
    if(!empty($_POST['ten-dang-nhap']) && 
       !empty($_POST['password']) &&
       !empty($_POST['hoten']) &&
       !empty($_POST['email']) &&
       !empty($_POST['so-dien-thoai']) &&
       !empty($_POST['ngay-sinh']) &&
       !empty($_POST['vai-tro'])) {
        $tenDangNhap = $_POST['ten-dang-nhap'];
        $password = $_POST['password'];
        $hoTen = $_POST['hoten'];
        $email = $_POST['email'];
        $soDienThoai = $_POST['so-dien-thoai'];
        $ngaySinh = $_POST['ngay-sinh'];
        $vaiTro = $_POST['vai-tro'];

        $sql = "UPDATE nguoi_dung 
        SET ten_dang_nhap = '$tenDangNhap',
            mat_khau = '$password',
            ho_ten = '$hoTen',
            email = '$email',
            sdt = '$soDienThoai',
            vai_tro_id = '$vaiTro',
            ngay_sinh = '$ngaySinh'
        WHERE id = '$id';";
        mysqli_query($conn, $sql);
        header('location: index.php?page_layout=nguoidung'); 
       }else{
        echo '<p class="warning">Vui lòng nhập đầy đủ thông tin</p>';
       }
    ?>
  </body>
</html>
