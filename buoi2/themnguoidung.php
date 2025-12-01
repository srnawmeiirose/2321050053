<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background: #f3f4f6;
}

form {
    width: 350px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

form div {
    margin-bottom: 15px;
}

p {
    margin-bottom: 5px;
    font-weight: bold;
    color: #444;
}

input, select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 6px;
}

input:focus, select:focus {
    border-color: #007bff;
    outline: none;
}

input[type="submit"] {
    background: #007bff;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.25s;
}

input[type="submit"]:hover {
    background: #0056b3;
}

/* Hiệu ứng hover nhẹ cho toàn form */
form:hover {
    transform: translateY(-1px);
    transition: 0.3s;
}

    </style>
</head>
<body>
    <form action="index.php?page_layout=themnguoidung" method="post">
        <h1>Thêm người dùng</h1>
        <div>
            <p>Tên đăng nhập</p>
            <input type="text" name="ten-dang-nhap" placeholder="Tên đăng nhập">
        </div>
         <div>
            <p>Mật khẩu</p>
            <input type="password" name="password" placeholder="Mật khẩu">
        </div>
        <div>
            <p>Họ tên</p>
            <input type="text" name ="ho-ten" placeholder="họ tên">
        </div>
        <div>
            <p>Email</p>
            <input type="email" name="email" placeholder="VD: abc123@gmail.com">
        </div>
         <div>
            <p>SĐT</p>
            <input type="text" name="so-dien-thoai" placeholder="VD:0966030056">
        </div>
        <div>
            <p>Vai trò</p>
            <select name="vaitro" >
                <option value="1">admin</option>
                <option value="2">đạo diễn</option>
                <option value="3">diễn viên</option>
                <option value="4">người dùng</option>
              
            </select>
        </div>
        <div>
            <p>Ngày sinh</p>
            <input type="date" name="ngay-sinh">
        </div>
        <div>
            <p>Submit</p>
            <input type="submit" value="submit">
        </div>
      
    </form>
<?php 

if (
    !empty($_POST['ten-dang-nhap']) &&
    !empty($_POST['password']) &&
    !empty($_POST['ho-ten']) &&
    !empty($_POST['email']) &&
    !empty($_POST['so-dien-thoai']) &&
    !empty($_POST['vaitro']) &&
    !empty($_POST['ngay-sinh'])
) {

    $ten_dang_nhap = $_POST['ten-dang-nhap'];
    $mat_khau      = $_POST['password'];
    $ho_ten        = $_POST['ho-ten'];
    $email         = $_POST['email'];
    $sdt           = $_POST['so-dien-thoai'];
    $vai_tro       = $_POST['vaitro'];
    $ngay_sinh     = $_POST['ngay-sinh'];

    $sql = "INSERT INTO nguoi_dung(ten_dang_nhap, mat_khau, ho_ten, email, sdt, ngay_sinh, vai_tro) 
            VALUES ('$ten_dang_nhap', '$mat_khau', '$ho_ten', '$email', '$sdt', '$ngay_sinh', '$vai_tro')";

    // mysqli_query($conn, $sql);
    // mysqli_close($conn);

    header('location: index.php?page_layout=nguoidung');
    // echo $sql;
    exit;

} 
else {
    echo '<p class="warning">Vui lòng nhập thông tin đầy đủ</p>';
}

?>

</body>
</html>