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
      <h1>Thêm người dùng</h1>
      <div>
        <form action="index.php?page_layout=themnguoidung" method="post">
          <div class="box">
            <p>Ten dang nhap</p>
            <input name="ten-dang-nhap" type="text" placeholder="Tên đăng nhập"/>
          </div>
          <div class="box">
            <p>Mat khau</p>
            <input name="password" type="password" placeholder="Mật khẩu"/>
          </div>
          <div class="box">
            <p>Ho ten</p>
            <input name="hoten" type="text" placeholder="Họ tên"/>
          </div>
          <div class="box">
            <p>Email</p>
            <input name="email" type="email" placeholder="Email"/>
          </div>
          <div class="box">
            <p>So dien thoai</p>
            <input name="so-dien-thoai" type="text" placeholder="Số điện thoại"/>
          </div>
          <div class="box">
            <p>Ngay sinh</p>
            <input name="ngay-sinh" type="date" placeholder="Ngày sinh"/>
          </div>
          <div class="box">
            <p>Vai tro</p>
            <select name="vai-tro">
              <option value="1">admin</option>
              <option value="2">dao dien</option>
              <option value="3">dien vien</option>
              <option value="4">nguoi dung</option>
            </select>
          </div>
          <div class="box">
            <input type="submit" value="Thêm mới" />
          </div>
        </form>
      </div>
    </div>
    <?php
    include 'connect.php';

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

        $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, ho_ten, email, sdt, vai_tro_id, ngay_sinh)
                VALUES ('$tenDangNhap', '$password', '$hoTen', '$email', '$soDienThoai', '$vaiTro', '$ngaySinh')";
        mysqli_query($conn, $sql);
        header('location: index.php?page_layout=nguoidung'); 
       }else{
        echo '<p class="warning">Vui lòng nhập đầy đủ thông tin</p>';
       }
    ?>
  </body>
</html>
