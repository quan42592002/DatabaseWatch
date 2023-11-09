<?php

// include __DIR__ . '../../../../../Modal/Database.php';

// $db = new Database;
// $db->connect();
// $conect = $db->conn;

   
    $id = base64_decode($_GET['id']);
    $sql = "DELETE FROM tbl_user Where IdUsers = '$id';";
    $conn->query($sql);
    $db->closeDatabase();
    echo "<script>window.location.href = 'http://localhost:3000/main.php?controller=TaiKhoanController&&success=" .urlencode('Xoá tài khoản thành công'). "';</script>";
    
exit();
