<?php
include __DIR__ . '../../../Modal/Database.php';
class FogetQuestionController {
	public function __construct()
	{
		require('View/Admin/FogetQuestion.php');
	}
	public function FogetQuestion(){
		$db = new Database();
        $db->connect();
        $conn = $db->conn;
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$userName = $_POST['userName'];
			$ma_pin = filter_input(INPUT_POST, 'ma_pin', FILTER_SANITIZE_NUMBER_INT);
			$cau_tra_loi =  htmlspecialchars($_POST['cau_tra_loi']);
			$cau_hoi =  filter_input(INPUT_POST, 'cau_hoi', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			$sql = "SELECT * FROM tbl_user WHERE Username = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $userName);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_'; 
			$password = '';
			for ($i = 0; $i < 6; $i++) {
				$password .= $characters[rand(0, strlen($characters) - 1)];
			}
			if(!empty($ma_pin) ){
				if($ma_pin == $row['MaPin']){
					$message = "Khôi phục mật khẩu thành công, mật khẩu của bạn là $password";
					$hashed_password = password_hash($password, PASSWORD_DEFAULT);
					$sqll = "UPDATE tbl_user SET  tbl_user.Password = ? WHERE Username = ?";
					$stmt = $conn->prepare($sqll);
					$stmt->bind_param(
						"ss",
						$hashed_password,
						$userName
					);
					$stmt->execute();
					echo '<script>window.location.href="?controller=FogetQuestionController&&user_name='.$userName. '&&success='.$message. ' ";</script>';
				}
				else{
					$message = "Mã pin sai";
					echo '<script>window.location.href="?controller=FogetQuestionController&&user_name='.$userName. '&&success='.$message. ' ";</script>';
				}
			}
			if(!empty($cau_hoi) && !empty($cau_tra_loi) ){
				if($cau_hoi == $row['CauHoiBaoMat'] && $cau_tra_loi == $row['CauTraLoi']  ){
					$message = "Khôi phục mật khẩu thành công, mật khẩu của bạn là $password";
					$hashed_password = password_hash($password, PASSWORD_DEFAULT);
					$sqll = "UPDATE tbl_user SET  tbl_user.Password = ? WHERE Username = ?";
					$stmt = $conn->prepare($sqll);
					$stmt->bind_param(
						"ss",
						$hashed_password,
						$userName
					);
					$stmt->execute();
					echo '<script>window.location.href="?controller=FogetQuestionController&&user_name='.$userName. '&&success='.$message. ' ";</script>';
				}
				else{
					$message = "Câu trả lời sai";
					echo '<script>window.location.href="?controller=FogetQuestionController&&user_name='.$userName. '&&success='.$message. ' ";</script>';
				}
			}
		}
		$db->closeDatabase();
	}

	
}