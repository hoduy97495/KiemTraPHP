<?php
include_once "../../controllers/HocPhanController.php";
include_once "../partials/header.php"; // Gọi header

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Xử lý xóa từng học phần khỏi giỏ
if (isset($_GET['remove'])) {
    $_SESSION['cart'] = array_diff($cart, [$_GET['remove']]);
    header("Location: cart.php");
    exit();
}

// Xóa toàn bộ giỏ
if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

// Lấy thông tin học phần từ controller
$hocPhanData = !empty($cart) ? getHocPhanByIds($cart) : [];

$totalTinChi = 0;
$totalHocPhan = 0;
?>

<h2>Học phần đã chọn</h2>

<?php if (!empty($cart) && $hocPhanData): ?>
    <table>
        <tr>
            <th>Mã HP</th>
            <th>Tên HP</th>
            <th>Tín chỉ</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $hocPhanData->fetch_assoc()) { 
            $totalTinChi += $row['SoTinChi'];
            $totalHocPhan++;
        ?>
            <tr>
                <td><?= $row['MaHP'] ?></td>
                <td><?= $row['TenHP'] ?></td>
                <td><?= $row['SoTinChi'] ?></td>
                <td>
                    <a href="cart.php?remove=<?= $row['MaHP'] ?>" style="background:red;">❌ Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <p><strong>📊 Tổng số học phần:</strong> <?= $totalHocPhan ?></p>
    <p><strong>🧮 Tổng số tín chỉ:</strong> <?= $totalTinChi ?> tín chỉ</p>

    <br>
    <a href="cart.php?clear=1">🧹 Xóa tất cả</a>
    <a href="save.php">💾 Lưu đăng ký</a>
<?php else: ?>
    <p>Chưa chọn học phần nào.</p>
<?php endif; ?>

<br>
<a href="../hocphan/index.php">🔙 Quay lại chọn học phần</a>

<?php include_once "../partials/footer.php"; ?>
