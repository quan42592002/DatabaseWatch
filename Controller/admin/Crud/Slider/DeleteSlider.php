<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $IdSlider = $_POST['IdSlidertest'];

    $sql = "DELETE FROM slider Where IdSlider = '$IdSlider';";

   $result = $conect->query($sql);
    
 if( $result==true){
     $data = array(
            'status' => "true",
        );
   
       }else{
        $data = array(
            'status' => "false",
        );
       }
       

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data);

}
$db->closeDatabase();
