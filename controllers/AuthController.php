<?php
include_once __DIR__ . '/../config/db.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Xử lý đăng nhập
function login($mssv) {
    global $conn;
    $sql = "SELECT * FROM SinhVien WHERE MaSV = '$mssv'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['mssv'] = $mssv;
        return true; // Đăng nhập thành công
    }
    return false; // MSSV không tồn tại
}

// Kiểm tra đã đăng nhập chưa
function isLoggedIn() {
    return isset($_SESSION['mssv']);
}

// Lấy thông tin sinh viên đang đăng nhập
function getCurrentUser() {
    global $conn;
    if (!isLoggedIn()) return null;

    $mssv = $_SESSION['mssv'];
    $sql = "SELECT * FROM SinhVien WHERE MaSV = '$mssv'";
    $result = $conn->query($sql);
    
    return $result->fetch_assoc();
}

// Xử lý đăng xuất
function logout() {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
