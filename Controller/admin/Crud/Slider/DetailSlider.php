<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
       // Trả về dữ liệu dưới dạng JSON
   //lấy dữ liệu từ data bên file js truyền vào
   $IdSlider = $_GET['IdSlider'];
   
    $sql = "SELECT * FROM slider WHERE IdSlider = $IdSlider";
    $result = $conect->query($sql);
    $record = $result->fetch_assoc();
    
    $record = array(
        'record' => $record,
        'status' => true,
    );
     // Trả về dữ liệu dưới dạng JSON
     header('Content-Type: application/json');
     echo json_encode( $record);

}
$db->closeDatabase();
