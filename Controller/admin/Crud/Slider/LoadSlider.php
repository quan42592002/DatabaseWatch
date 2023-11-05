<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

// Số mục trên mỗi trang
$items_per_page = 3;
// $phan_loai_slider= $_POST['PhanLoaiSlider'];
// Lấy số trang từ tham số truy vấn, mặc định là trang 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$phan_loai_slider = isset($_GET['phan_loai_slider']) ? $_GET['phan_loai_slider'] : "";

// Tính toán vị trí bắt đầu và kết thúc của các mục trên trang hiện tại
$start = (int)(($page - 1) * $items_per_page);


//truy vấn sql
if($phan_loai_slider!="" ){ 
    $sql="SELECT * from slider where NameSlider='$phan_loai_slider' LIMIT $start, $items_per_page;";
    $result = $conect->query($sql);
    $datax = $result->fetch_all(MYSQLI_ASSOC);
    $total_items = mysqli_num_rows($conect->query("SELECT * FROM slider where NameSlider='$phan_loai_slider';"));
}else{
    $sql="SELECT * from slider LIMIT $start, $items_per_page;";
    $result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);
$total_items = mysqli_num_rows($conect->query("SELECT * FROM slider;"));
}




$data=array(
    'listSlider'=>$datax,
    'total_items' => $total_items,
    'items_per_page' => $items_per_page,
    'current_page' => $page,
    'status'=>true,
);
header('Content-Type: application/json');
echo json_encode($data);


?>