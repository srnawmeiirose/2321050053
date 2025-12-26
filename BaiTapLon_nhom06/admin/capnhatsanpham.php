<?php
include 'connect.php';

$id = (int)$_GET['id'];

/* ===== LẤY THÔNG TIN SẢN PHẨM ===== */
$sql = "
SELECT 
    sp.id,
    sp.ten_san_pham,
    sp.gia,
    sp.mo_ta,
    sp.hinh_anh,
    sp.loai_san_pham_id,
    sp.trang_thai,
    tk.so_luong
FROM san_pham sp
LEFT JOIN ton_kho tk ON sp.id = tk.san_pham_id
WHERE sp.id = $id
";
$result = mysqli_query($conn, $sql);
$sanPham = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tenSP     = $_POST['ten-sp'];
    $loaiSP    = (int)$_POST['loai-sp'];
    $giaBan    = (float)$_POST['gia'];
    $moTa      = $_POST['mo-ta'];
    $trangThai = $_POST['tthai'];
    $soLuong   = (int)$_POST['so-luong'];

    
    $hinhAnh = $sanPham['hinh_anh'];

   
    $sqlSanPham = "
    UPDATE san_pham
    SET
        ten_san_pham = '$tenSP',
        gia = $giaBan,
        mo_ta = '$moTa',
        hinh_anh = '$hinhAnh',
        loai_san_pham_id = $loaiSP,
        trang_thai = '$trangThai'
    WHERE id = $id
    ";

 
    $sqlTonKho = "
    UPDATE ton_kho
    SET so_luong = $soLuong
    WHERE san_pham_id = $id
    ";

    mysqli_query($conn, $sqlSanPham);
    mysqli_query($conn, $sqlTonKho);

    header('Location: index.php?page_layout=quanlysanpham');
    exit;
}


$sqlLoaiSP = "SELECT id, ten_loai FROM loai_san_pham ORDER BY ten_loai";
$dsLoaiSP = mysqli_query($conn, $sqlLoaiSP);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cập nhật sản phẩm</title>

<style>
body {
    background: #000;
    margin: 0;
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
.box {
    margin-bottom: 18px;
}
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

<div class="container-them">
<h1>Cập nhật sản phẩm</h1>

<form method="post">

<div class="box">
<p>Tên sản phẩm</p>
<input name="ten-sp" type="text" value="<?= $sanPham['ten_san_pham'] ?>">
</div>

<div class="box">
<p>Loại sản phẩm</p>
<select name="loai-sp">
<?php while($row = mysqli_fetch_assoc($dsLoaiSP)) : ?>
<option value="<?= $row['id'] ?>"
<?= $sanPham['loai_san_pham_id'] == $row['id'] ? 'selected' : '' ?>>
<?= $row['ten_loai'] ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="box">
<p>Giá</p>
<input name="gia" type="number" value="<?= $sanPham['gia'] ?>">
</div>

<div class="box">
<p>Mô tả</p>
<input name="mo-ta" type="text" value="<?= $sanPham['mo_ta'] ?>">
</div>

<div class="box">
<p>Hình ảnh hiện tại</p>
<?php if ($sanPham['hinh_anh']) { ?>
<img 
src="../sanpham/picture/<?= $sanPham['hinh_anh'] ?>" 
width="120"
style="border-radius:6px"
>
<?php } ?>
</div>

<div class="box">
<p>Trạng thái</p>
<select name="tthai">
<option value="con_hang" <?= $sanPham['trang_thai']=='con_hang'?'selected':'' ?>>Còn hàng</option>
<option value="het_hang" <?= $sanPham['trang_thai']=='het_hang'?'selected':'' ?>>Hết hàng</option>
</select>
</div>

<div class="box">
<p>Số lượng</p>
<input name="so-luong" type="number" value="<?= $sanPham['so_luong'] ?>">
</div>

<div class="box">
<input type="submit" value="Cập nhật">
</div>

</form>
</div>

</body>
</html>
