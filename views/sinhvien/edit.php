<?php
include_once "../../controllers/SinhVienController.php";
include_once "../partials/header.php"; // Gọi header

$id = $_GET['id'];
$sinhVien = getSinhVienById($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = $_POST['HoTen'];
    $gioiTinh = $_POST['GioiTinh'];
    $ngaySinh = $_POST['NgaySinh'];
    $maNganh = $_POST['MaNganh'];
    $hinhPath = $sinhVien['Hinh'];

    if (!empty($_FILES["Hinh"]["name"])) {
        $targetDir = "../../uploads/";
        $fileName = basename($_FILES["Hinh"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFile)) {
            $hinhPath = "/KiemTraPHP/uploads/" . $fileName;
        }
    }

    if (updateSinhVien($id, $hoTen, $gioiTinh, $ngaySinh, $hinhPath, $maNganh)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Cập nhật thất bại!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <h2>Cập Nhật Sinh Viên</h2>

    <label>Họ Tên:</label>
    <input type="text" name="HoTen" value="<?= $sinhVien['HoTen'] ?>" required>

    <label>Giới Tính:</label>
    <input type="text" name="GioiTinh" value="<?= $sinhVien['GioiTinh'] ?>" required>

    <label>Ngày Sinh:</label>
    <input type="date" name="NgaySinh" value="<?= $sinhVien['NgaySinh'] ?>" required>

    <label>Hình hiện tại:</label><br>
    <img src="<?= $sinhVien['Hinh'] ?>" width="100"><br><br>

    <label>Chọn hình mới (nếu muốn thay):</label>
    <input type="file" name="Hinh"><br>

    <label>Ngành Học:</label>
    <input type="text" name="MaNganh" value="<?= $sinhVien['MaNganh'] ?>" required>

    <button type="submit">✔️ Cập Nhật</button>
</form>

<a href="index.php">🔙 Quay lại danh sách</a>

<?php include_once "../partials/footer.php"; // Gọi footer ?>
