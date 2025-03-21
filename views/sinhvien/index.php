<?php
include_once "../../controllers/SinhVienController.php";
$sinhVienList = getAllSinhVien();

// Gọi header
include_once "../partials/header.php";
?>

<h2>Danh sách Sinh Viên</h2>
<a href="create.php">➕ Thêm Sinh Viên</a>

<table>
    <tr>
        <th>Mã SV</th>
        <th>Họ Tên</th>
        <th>Giới Tính</th>
        <th>Ngày Sinh</th>
        <th>Hình</th>
        <th>Ngành Học</th>
        <th>Hành Động</th>
    </tr>
    <?php while ($row = $sinhVienList->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['MaSV'] ?></td>
            <td><?= $row['HoTen'] ?></td>
            <td><?= $row['GioiTinh'] ?></td>
            <td><?= $row['NgaySinh'] ?></td>
            <td><img src="<?= $row['Hinh'] ?>" width="50"></td>
            <td><?= $row['MaNganh'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['MaSV'] ?>">✏️ Sửa</a>
                <a href="delete.php?id=<?= $row['MaSV'] ?>" style="background-color: red;">🗑️ Xóa</a>
                <a href="detail.php?id=<?= $row['MaSV'] ?>">🔍 Xem</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include_once "../partials/footer.php"; ?>
