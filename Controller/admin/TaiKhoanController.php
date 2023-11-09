<?php
include __DIR__ . '../../../Modal/Database.php';
$db = new Database;
$db->connect();
$conn = $db->conn;

if(isset($_GET["action"])){
	$action = $_GET["action"];
	if($action == "ThemTaiKhoan"){
		// header("Location: http://localhost:3000/View/Admin/TaiKhoan/ThemTaiKhoan.php");
		
		require('View/Admin/TaiKhoan/ThemTaiKhoan.php');
        exit; // Dừng việc thực hiện mã sau đây
	}
	if($action == "SuaTaiKhoan"){
		// require_once('Controller/Admin/Crud/TaiKhoan/SuaTaiKhoan.php');
		if(isset($_GET['id'])){
			$id = base64_decode($_GET['id']);
			$sql = "SELECT * FROM tbl_user WHERE IdUsers = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$item_user = $result->fetch_assoc();
			if (!empty($item_user)) {
				$data = [
					'item_user' => $item_user,
				];
			} 
		}
		require('View/Admin/TaiKhoan/SuaTaiKhoan.php');
        exit; 
	}
	if($action == "XoaTaiKhoan"){
		require('Controller/Admin/Crud/TaiKhoan/XoaTaiKhoan.php');
        exit; 
	}
}



class TaiKhoanController {
	public function __construct()
	{
		global $conn;
		$sql = "SELECT * FROM tbl_user";
		if ($conn != null) {
			try {
				$statement = $conn->query($sql);
				$listUser = $statement->fetch_all(MYSQLI_ASSOC);
				
				if ($listUser != null) {
					$data = [
						'listUser' => $listUser,
					];
				}
				// Yêu cầu tệp view và truyền mảng $data vào đó
				require('View/Admin/TaiKhoan/DanhSachTaiKhoan.php');
			} catch (PDOException $e) {
				echo "Cannot query data. Error: " . $e->getMessage();
			}
		} else {
			echo "error";
		}

	}

}


