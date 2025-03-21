<?php
include_once "../../controllers/SinhVienController.php";
include_once "../partials/header.php"; // Gọi header

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sinhVien = getSinhVienById($id);
}
?>

<h2>Thông Tin Chi Tiết Sinh Viên</h2>
<div style="width: 50%; margin: auto; background: white; padding: 20px; border-radius: 10px;">
    <p><strong>Mã SV:</strong> <?= $sinhVien['MaSV'] ?></p>
    <p><strong>Họ Tên:</strong> <?= $sinhVien['HoTen'] ?></p>
    <p><strong>Giới Tính:</strong> <?= $sinhVien['GioiTinh'] ?></p>
    <p><strong>Ngày Sinh:</strong> <?= $sinhVien['NgaySinh'] ?></p>
    <p><strong>Hình:</strong><br><img src="<?= $sinhVien['Hinh'] ?>" width="150"></p>
    <p><strong>Ngành Học:</strong> <?= $sinhVien['MaNganh'] ?></p>
</div>

<br>
<a href="index.php">🔙 Quay lại danh sách</a>

<?php include_once "../partials/footer.php"; // Gọi footer ?>
