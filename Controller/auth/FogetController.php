<?php
include __DIR__ . '../../../Modal/Database.php';
class FogetController {
	public function __construct()
	{
		require('View/Admin/Foget.php');
	}
	public function foget(){
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);;
    if ($username == "") {
        $_SESSION['error'] = "Tài khoản không được để trống";
    } else {
        $db = new Database();
        $db->connect();
        $conect = $db->conn;

        $username = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);;

        $sql = "SELECT tbl_user.IdUsers, tbl_user.Username, tbl_user.Password 
        FROM tbl_user 
        WHERE Username = '$username'";

        $result = $conect->query($sql);

        if ($result->num_rows > 0) {
            echo '<script>window.location.href="?controller=FogetQuestionController&&user_name='.$username. ' ";</script>';
            exit;
        } else {
            $_SESSION['error'] = "Tài khoản không tồn tại";
        }
        $db->closeDatabase();
    }
}
	}
}