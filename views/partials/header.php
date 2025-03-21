<?php
    include_once "../../controllers/AuthController.php"; // Load AuthController
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Đăng Ký Học Phần</title>
    <link rel="stylesheet" href="../../assets/styles.css">
</head>
<body>

<header>
    <div class="top-bar">
        <div class="container">
            <div class="logo">
                <img src="../../assets/logohutech.png" alt="Logo" />
            </div>
            <nav>
                <ul>
                    <li><a href="../../index.php" class="active">Trang chủ</a></li>
                    <li><a href="../../views/sinhvien/index.php">Sinh viên</a></li>
                    <li><a href="../../views/hocphan/index.php">Học phần</a></li>
                    <li><a href="../../views/dangky/cart.php">Đăng ký học phần</a></li>
                    
                    <?php if (isLoggedIn()): ?>
                        <li><a href="../../views/auth/dashboard.php">👤 <?= getCurrentUser()['HoTen'] ?></a></li>
                        <li><a href="../../views/auth/logout.php">🔴 Đăng xuất</a></li>
                    <?php else: ?>
                        <li><a href="../../views/auth/login.php">🔐 Đăng nhập</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="language">
                <img src="../../assets/VN.png" alt="VN" />
                <span>VN</span>
                <div class="dropdown">
                    <a href="#">🇬🇧 EN</a>
                    <a href="#">🇨🇳 CN</a>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="container">
