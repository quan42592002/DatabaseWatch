<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

// Số mục trên mỗi trang
$items_per_page = 10;

// Lấy số trang từ tham số truy vấn, mặc định là trang 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// Tính toán vị trí bắt đầu và kết thúc của các mục trên trang hiện tại
$start = (int)(($page - 1) * $items_per_page);

//lấy dữ liệu từ form
$search_ten = isset($_GET['search_ten']) ? $_GET['search_ten']: "";
$search_thuonghieu = isset($_GET['search_thuonghieu']) ? $_GET['search_thuonghieu']: "";
$search_loaiday = isset($_GET['search_loaiday']) ? $_GET['search_loaiday']: "";
$search_kieudang= isset($_GET['search_kieudang']) ? $_GET['search_kieudang']: "";
$order_soLuong = isset($_GET['order_soLuong']) ? $_GET['order_soLuong']: "";

$sql_order_soLuong="";
if($order_soLuong=="1"){
    $sql_order_soLuong= "ORDER BY tbl_dongho.SoLuong ASC";
}else if($order_soLuong=="2"){
    $sql_order_soLuong= "ORDER BY tbl_dongho.SoLuong DESC";
}
// $sql_search_ten = "tbl_dongho.TenDongHo like '%$search_ten%'";
// $sql_search_thuonghieu = "";
// $sql_search_loaiday = "";
// $sql_search_kieudang="";
// if($search_ten!=""){
//     $sql_search_ten = "";
// }



//Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
if($search_ten==""&& $search_thuonghieu==""&&$search_loaiday==""&&$search_kieudang==""){
$sql = "SELECT * FROM tbl_dongho ".$sql_order_soLuong."  LIMIT $start, $items_per_page" ;
}
 
else if($search_ten!=""&& $search_thuonghieu =="" && $search_loaiday=="" && $search_kieudang==""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.TenDongHo like '%$search_ten%' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
} 
 else if($search_ten==""&& $search_thuonghieu !="" && $search_loaiday=="" && $search_kieudang==""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.ThuongHieu = '$search_thuonghieu' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
} 
 else if($search_ten==""&& $search_thuonghieu =="" && $search_loaiday!="" && $search_kieudang==""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.LoaiDay = '$search_loaiday' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
} 
 else if($search_ten==""&& $search_thuonghieu =="" && $search_loaiday=="" && $search_kieudang!=""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.KieuDang = '$search_kieudang' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten!=""&& $search_thuonghieu !="" && $search_loaiday=="" && $search_kieudang==""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.TenDongHo like '%$search_ten%' and tbl_dongho.ThuongHieu = '$search_thuonghieu' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten!=""&& $search_thuonghieu =="" && $search_loaiday!="" && $search_kieudang==""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.TenDongHo like '%$search_ten%' and tbl_dongho.LoaiDay = '$search_loaiday' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten!=""&& $search_thuonghieu =="" && $search_loaiday=="" && $search_kieudang!=""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.TenDongHo like '%$search_ten%' and tbl_dongho.KieuDang = '$search_kieudang' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten!=""&& $search_thuonghieu !="" && $search_loaiday=="" && $search_kieudang!=""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.TenDongHo like '%$search_ten%' and tbl_dongho.ThuongHieu='$search_thuonghieu' and tbl_dongho.KieuDang = '$search_kieudang' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten!=""&& $search_thuonghieu =="" && $search_loaiday!="" && $search_kieudang!=""){
    $sql = "SELECT * FROM tbl_dongho where tbl_dongho.TenDongHo like '%$search_ten%' and tbl_dongho.LoaiDay='$search_loaiday' and tbl_dongho.KieuDang = '$search_kieudang' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten==""&& $search_thuonghieu !="" && $search_loaiday!="" && $search_kieudang==""){
    $sql = "SELECT * FROM tbl_dongho where  tbl_dongho.ThuongHieu = '$search_thuonghieu' and tbl_dongho.LoaiDay='$search_loaiday' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten==""&& $search_thuonghieu !="" && $search_loaiday=="" && $search_kieudang!=""){
    $sql = "SELECT * FROM tbl_dongho where  tbl_dongho.ThuongHieu = '$search_thuonghieu' and tbl_dongho.KieuDang='$search_kieudang' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten==""&& $search_thuonghieu !="" && $search_loaiday!="" && $search_kieudang!=""){
    $sql = "SELECT * FROM tbl_dongho where  tbl_dongho.ThuongHieu = '$search_thuonghieu' and tbl_dongho.LoaiDay='$search_loaiday' and tbl_dongho.KieuDang='$search_kieudang' ".$sql_order_soLuong." LIMIT $start, $items_per_page" ;
}
else if($search_ten!="" && $search_thuonghieu!="" && $search_loaiday!="" && $search_kieudang!=""){
    // $sql = "SELECT * FROM tbl_dongho where tbl_dongho.TenDongHo like '%$search_ten%' or tbl_dongho.ThuongHieu = '$search_thuonghieu' or  tbl_dongho.LoaiDay = '$search_loaiday' or tbl_dongho.KieuDang = '$search_kieudang' LIMIT $start, $items_per_page"; 
     $sql = "SELECT * FROM tbl_dongho where tbl_dongho.TenDongHo like '%$search_ten%' and tbl_dongho.ThuongHieu = '$search_thuonghieu' and  tbl_dongho.LoaiDay = '$search_loaiday' and tbl_dongho.KieuDang = '$search_kieudang' ".$sql_order_soLuong." LIMIT $start, $items_per_page"; 

}


$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);

// Tính tổng số mục trong cơ sở dữ liệu
$total_items = mysqli_num_rows($conect->query("SELECT * FROM tbl_dongho;"));

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
