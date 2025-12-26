<?php
include 'connect.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tenSP     = $_POST['ten-sp'] ?? '';
    $loaiSP    = (int)($_POST['loai-sp'] ?? 0);
    $giaBan    = (float)($_POST['gia'] ?? 0);
    $moTa      = $_POST['mo-ta'] ?? '';
    $trangThai = $_POST['tthai'] ?? 'con_hang';
    $soLuong   = (int)($_POST['so-luong'] ?? 0);

    $hinhAnh = '';

    if (!empty($_FILES['fileToUpload']['name'])) {

        $uploadDir = __DIR__ . '/../sanpham/picture/'; 

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['fileToUpload']['name']);
        $targetFile = $uploadDir . $fileName;
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!getimagesize($_FILES['fileToUpload']['tmp_name'])) {
            $errors[] = "File không phải ảnh";
        }

        if ($_FILES['fileToUpload']['size'] > 2000000) {
            $errors[] = "Ảnh tối đa 2MB";
        }

        if (!in_array($ext, ['jpg','jpeg','png','gif'])) {
            $errors[] = "Sai định dạng ảnh";
        }

        if (empty($errors)) {
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile);
           $hinhAnh = $fileName; 

        }
    }

    if (empty($errors)) {

        mysqli_query($conn, "
            INSERT INTO san_pham
            (ten_san_pham, gia, mo_ta, hinh_anh, loai_san_pham_id, trang_thai)
            VALUES
            ('$tenSP', $giaBan, '$moTa', '$hinhAnh', $loaiSP, '$trangThai')
        ");

        $idSP = mysqli_insert_id($conn);

        mysqli_query($conn, "
            INSERT INTO ton_kho (san_pham_id, so_luong)
            VALUES ($idSP, $soLuong)
        ");

        header('Location: index.php?page_layout=quanlysanpham');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Thêm sản phẩm</title>
<style>
body {
    background: #000;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}
.container-them {
    width: 50%;
    margin: 40px auto;
    padding: 30px;
    background: #3a3a3a;
    border-radius: 12px;
}
.container-them h1 {
    text-align: center;
    font-size: 28px;
    color: #fff;
    margin-bottom: 25px;
}
.box { margin-bottom: 18px; }
.box p {
    margin: 0 0 6px 0;
    font-size: 15px;
    color: #fff;
}
input[type="text"],
input[type="number"],
select {
    width: 95%;
    padding: 11px 12px;
    border: 1px solid #666;
    border-radius: 6px;
    background: #4a4a4a;
    color: #fff;
}
input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: #e60000;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}
</style>
</head>

<body>

<?php if (!empty($errors)) { ?>
<script>alert("<?= implode('\n', $errors) ?>");</script>
<?php } ?>

<div class="container-them">
<h1>Thêm sản phẩm</h1>

<form method="post" enctype="multipart/form-data">

<div class="box">
<p>Tên sản phẩm</p>
<input name="ten-sp" type="text">
</div>

<div class="box">
<p>Loại sản phẩm</p>
<select name="loai-sp">
<option value="1">Thực phẩm chức năng</option>
<option value="2">Đồ uống</option>
<option value="3">Phụ kiện</option>
<option value="4">Gói tập</option>
<option value="5">Whey - BCAA</option>
</select>
</div>

<div class="box">
<p>Giá</p>
<input name="gia" type="number">
</div>

<div class="box">
<p>Mô tả</p>
<input name="mo-ta" type="text">
</div>

<div class="box">
<p>Hình ảnh</p>
<input type="file" name="fileToUpload">
</div>

<div class="box">
<p>Trạng thái</p>
<select name="tthai">
<option value="con_hang">Còn hàng</option>
<option value="het_hang">Hết hàng</option>
</select>
</div>

<div class="box">
<p>Số lượng</p>
<input name="so-luong" type="number">
</div>

<div class="box">
<input type="submit" value="Thêm mới">
</div>

</form>
</div>
</body>
</html>
