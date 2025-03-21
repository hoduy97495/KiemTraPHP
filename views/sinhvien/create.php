<?php
include_once "../../controllers/SinhVienController.php";
include_once "../partials/header.php"; // Gọi header

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSV = $_POST['MaSV'];
    $hoTen = $_POST['HoTen'];
    $gioiTinh = $_POST['GioiTinh'];
    $ngaySinh = $_POST['NgaySinh'];
    $maNganh = $_POST['MaNganh'];

    // Xử lý upload hình
    $hinhPath = "";
    if (!empty($_FILES["Hinh"]["name"])) {
        $targetDir = "../../uploads/";
        $fileName = basename($_FILES["Hinh"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFile)) {
            $hinhPath = "/KiemTraPHP/uploads/" . $fileName;
        }
    }

    if (addSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinhPath, $maNganh)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi khi thêm sinh viên!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <h2>Thêm Sinh Viên</h2>

    <label>Mã SV:</label>
    <input type="text" name="MaSV" required><br>

    <label>Họ Tên:</label>
    <input type="text" name="HoTen" required><br>

    <label>Giới Tính:</label>
    <input type="text" name="GioiTinh" required><br>

    <label>Ngày Sinh:</label>
    <input type="date" name="NgaySinh" required><br>

    <label>Chọn hình:</label>
    <input type="file" name="Hinh" required><br>

    <label>Ngành Học:</label>
    <input type="text" name="MaNganh" required><br>

    <button type="submit">✔️ Thêm</button>
</form>

<a href="index.php">🔙 Quay lại danh sách</a>

<?php include_once "../partials/footer.php"; // Gọi footer ?>
