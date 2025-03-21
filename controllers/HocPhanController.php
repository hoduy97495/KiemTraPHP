<?php
include_once __DIR__ . '/../config/db.php';

function getAllHocPhan() {
    global $conn;
    $sql = "SELECT * FROM HocPhan";
    return $conn->query($sql);
}

function getHocPhanByIds($ids) {
    global $conn;
    $in = "'" . implode("','", $ids) . "'";
    $sql = "SELECT * FROM HocPhan WHERE MaHP IN ($in)";
    return $conn->query($sql);
}
