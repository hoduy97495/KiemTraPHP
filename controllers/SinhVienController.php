<?php
include_once __DIR__ . '/../config/db.php';


// Danh sách sinh viên
function getAllSinhVien() {
    global $conn;
    $sql = "SELECT * FROM SinhVien";
    $result = $conn->query($sql);
    return $result;
}

// Lấy thông tin sinh viên theo ID
function getSinhVienById($id) {
    global $conn;
    $sql = "SELECT * FROM SinhVien WHERE MaSV='$id'";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

// Thêm sinh viên mới
function addSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
    global $conn;
    $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
            VALUES ('$maSV', '$hoTen', '$gioiTinh', '$ngaySinh', '$hinh', '$maNganh')";
    return $conn->query($sql);
}

// Cập nhật sinh viên
function updateSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
    global $conn;
    $sql = "UPDATE SinhVien SET HoTen='$hoTen', GioiTinh='$gioiTinh', NgaySinh='$ngaySinh', Hinh='$hinh', MaNganh='$maNganh' 
            WHERE MaSV='$maSV'";
    return $conn->query($sql);
}

// Xóa sinh viên
function deleteSinhVien($id) {
    global $conn;
    $sql = "DELETE FROM SinhVien WHERE MaSV='$id'";
    return $conn->query($sql);
}
?>
