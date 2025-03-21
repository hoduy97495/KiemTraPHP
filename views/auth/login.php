<?php
include_once "../../controllers/AuthController.php";
include_once "../partials/header.php"; // Gọi header

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mssv = $_POST['mssv'];

    if (login($mssv)) {
        header("Location: dashboard.php"); // Chuyển hướng sau khi đăng nhập thành công
        exit();
    } else {
        $error = "Mã số sinh viên không tồn tại!";
    }
}
?>

<h2>🔐 Đăng Nhập</h2>

<form method="POST">
    <label>Nhập MSSV:</label>
    <input type="text" name="mssv" required>
    <button type="submit">➡️ Đăng Nhập</button>
</form>

<?php if (isset($error)) : ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<?php include_once "../partials/footer.php"; // Gọi footer ?>
