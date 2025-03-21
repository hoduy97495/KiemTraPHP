<?php
include_once "../../controllers/SinhVienController.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteSinhVien($id)) {
        header("Location: index.php"); // Quay lại danh sách sau khi xóa
        exit();
    } else {
        echo "Xóa thất bại!";
    }
}
?>
