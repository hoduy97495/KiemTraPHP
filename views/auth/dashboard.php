<?php
include_once "../../controllers/AuthController.php";

// Nếu chưa đăng nhập, chuyển về login
if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$user = getCurrentUser();
include_once "../partials/header.php"; // Gọi header
?>

<h2>🎓 Chào mừng, <?= $user['HoTen'] ?>!</h2>
<p>MSSV: <?= $user['MaSV'] ?></p>
<p>Giới tính: <?= $user['GioiTinh'] ?></p>
<p>Ngày sinh: <?= $user['NgaySinh'] ?></p>

<a href="logout.php">🔴 Đăng Xuất</a>

<?php include_once "../partials/footer.php"; // Gọi footer ?>
