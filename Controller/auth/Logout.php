<?php
		unset($_SESSION['Username']); 
		unset($_SESSION['LoaiTaiKhoan']);
		unset($_SESSION['IdUsers']); 
		unset($_SESSION['TenDayDu']);
		echo '<script>window.location.href="http://localhost:3000/main.php?controller=TrangChuController";</script>';