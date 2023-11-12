<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

// Số mục trên mỗi trang
$items_per_page = 15;
// Lấy số trang từ tham số truy vấn, mặc định là trang 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// Tính toán vị trí bắt đầu và kết thúc của các mục trên trang hiện tại
$start = (int)(($page - 1) * $items_per_page);
$sapxep=isset($_GET['sapxep']) ? (int)$_GET['sapxep'] : "";
$LocGia=isset($_GET['LocGia']) ? $_GET['LocGia'] : "";
$LocThuongHieu=isset($_GET['LocThuongHieu']) ? $_GET['LocThuongHieu'] : "";

$sqlsapxep="";
if($sapxep==1){
    $sqlsapxep="ORDER BY tbl_dongho.GiaBan ASC";
}if($sapxep== 2){ 
    $sqlsapxep="ORDER BY tbl_dongho.GiaBan DESC";
}if($sapxep== 3){ 
    $sqlsapxep="ORDER BY tbl_dongho.GiamGia DESC";
}if($sapxep== 4){ 
    $sqlsapxep="join tbl_giohang where tbl_dongho.IdDongHo=tbl_giohang.IdDongHo order by tbl_giohang.SoLuongMua desc";
}  
$sqlLocThuongHieu= "";
if($LocThuongHieu!=""&&$LocGia==""){ 
    $sqlLocThuongHieu="where tbl_dongho.ThuongHieu='$LocThuongHieu'";
}else if($LocThuongHieu!=""&&$LocGia!=""){ 
    $sqlLocThuongHieu="and tbl_dongho.ThuongHieu='$LocThuongHieu'";
}

$sqlLocGiaBan= "";
if($LocGia==1){
    $sqlLocGiaBan= "where tbl_dongho.GiaBan BETWEEN 0 AND 3000000";
}else if($LocGia== 2){  
    $sqlLocGiaBan= "where tbl_dongho.GiaBan BETWEEN 3000000 AND 6000000";
}else if($LocGia== 3){  
    $sqlLocGiaBan= "where tbl_dongho.GiaBan BETWEEN 6000000 AND 12000000";
} else if($LocGia== 4){  
    $sqlLocGiaBan= "where tbl_dongho.GiaBan BETWEEN 12000000 AND 35000000";
} 
$sql="SELECT *from tbl_dongho ".$sqlLocGiaBan." ".$sqlLocThuongHieu." ".$sqlsapxep." LIMIT $start, $items_per_page;";
$result = $conect->query($sql); 
$datax = $result->fetch_all(MYSQLI_ASSOC);
$total_items = mysqli_num_rows($conect->query("SELECT *from tbl_dongho;"));
$data=array(
    'listdata'=>$datax,
    'total_items' => $total_items,
    'items_per_page' => $items_per_page,
    'current_page' => $page,
    'status'=>true,
);
header('Content-Type: application/json');
echo json_encode($data);
