<?php
	$controller = $_GET['controller'];
if ($controller == "LoginController" || $controller == "FogetController" 
|| $controller == "RegisterController"|| $controller == "DetailAccountController" ||  $controller == "FogetQuestionController" || $controller == "Logout") {
	require('Controller/auth/' . $controller . '.php'); 
}else{
	require('Controller/user/' . $controller . '.php'); 
}
	$controller = ucfirst($controller); /*chuyển đổi chữ cái đầu tiên của chuỗi thành chữ hoa */
	$request = new $controller; /*khởi tạo một class controller tương ứng với biến $controller*/
?>