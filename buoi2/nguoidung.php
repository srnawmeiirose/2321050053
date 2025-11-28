<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thông tin người dùng</h1>
    <tr border = 1>
        <th>Tên đăng nhập</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Vai trò</th>
        <th>Ngày sinh</th>
    </tr>
    <?php
    include("connect.php");
    $sql = "SELECT nd.*, vt.ten_vai_tro FROM 'nguoi_dung nd join vai_tro vt on nd.vai_tro_id = vt.id";
    $result = mysqli_query($conn, $sql );
    while($row = sqli_fetch_array($result)){
        <tr> 
    <td><?php echo $row["ten_dang_nhap"] ?></td>
    <td><?php echo $row["ho_ten"] ?></td>
    <td><?php echo $row["email"] ?></td>
    <td><?php echo $row["sdt"] ?></td>
    <td><?php echo $row["vai_tro_id"] ?></td>
    <td><?php echo $row["ngay_sinh"] ?></td> 
    <td>
    <button>Sửa</button>
    <a class = "xoa"href="#">Xóa</a>
    </td>
    </tr>

    }

    ?>
    
</body>
</html>