<?php

class Logout {
	public function __construct()
	{
		unset($_SESSION['Username']); // xóa session user đã tạo khi đăng nhập
		unset($_SESSION['IdRole']); // xóa session user đã tạo khi đăng nhập
		unset($_SESSION['IdUsers']); // xóa session user đã tạo khi đăng nhập
		echo '<script>window.location.href="http://localhost:3000/main.php?controller=TrangChuController";</script>'; // chuyển hướng về trang chủ
	}
}
$logout = new Logout();