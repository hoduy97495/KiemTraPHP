<?php
include_once "../../controllers/HocPhanController.php";
include_once "../partials/header.php"; // Gọi header


// Lấy danh sách học phần
$result = getAllHocPhan();

// Xử lý thêm học phần vào session (giỏ hàng)
if (isset($_GET['add'])) {
    $maHP = $_GET['add'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!in_array($maHP, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $maHP;
    }

    header("Location: index.php");
    exit();
}
?>

<h2>Danh sách Học Phần</h2>
<table>
    <tr>
        <th>Mã HP</th>
        <th>Tên HP</th>
        <th>Tín chỉ</th>
        <th>Hành động</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['MaHP'] ?></td>
            <td><?= $row['TenHP'] ?></td>
            <td><?= $row['SoTinChi'] ?></td>
            <td>
                <a href="index.php?add=<?= $row['MaHP'] ?>">🛒 Đăng ký</a>
            </td>
        </tr>
    <?php } ?>
</table>

<a href="../dangky/cart.php">🧾 Xem học phần đã chọn</a>

<?php include_once "../partials/footer.php"; // Gọi footer ?>
