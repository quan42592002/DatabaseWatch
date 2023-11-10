<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;




// Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
$sql = "";

$resultUser = $conect->query("SELECT tbl_user.IdUsers , tbl_user.*
FROM tbl_giohang
Join tbl_user ON tbl_giohang.IdUsers = tbl_user.IdUsers
Where tbl_giohang.TrangThai = false
GROUP BY tbl_user.IdUsers
"
);

$lstUser = $resultUser->fetch_all(MYSQLI_ASSOC);

$data = array(
    'lstUser' => $lstUser,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
?>