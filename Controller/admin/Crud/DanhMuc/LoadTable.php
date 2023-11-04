<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

// Số mục trên mỗi trang
$items_per_page = 10;

// Lấy số trang từ tham số truy vấn, mặc định là trang 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$cbPhanLoai = isset($_GET['cbPhanLoai']) ? $_GET['cbPhanLoai'] : "";

// Tính toán vị trí bắt đầu và kết thúc của các mục trên trang hiện tại
$start = (int)(($page - 1) * $items_per_page);

// Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
$sql = "SELECT * FROM tbl_danhmuchethong  Where tbl_danhmuchethong.PhanLoai = '$cbPhanLoai' LIMIT $start, $items_per_page ;";
$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);

// Tính tổng số mục trong cơ sở dữ liệu
$total_items = mysqli_num_rows($conect->query("SELECT * FROM tbl_danhmuchethong Where tbl_danhmuchethong.PhanLoai = '$cbPhanLoai';"));

$data = array(
    'datax' => $datax,
    'total_items' => $total_items,
    'items_per_page' => $items_per_page,
    'current_page' => $page,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
?>