<!DOCTYPE html>
<html>
<head>
    <title>Hóa Đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            width: 80%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
        }
        .invoice-details {
            text-align: right;
        }
        .invoice table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice th, .invoice td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .invoice th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>HÓA ĐƠN</h1>
        </div>
        <div class="invoice-details">
            <p>Ngày: <?php echo date("d/m/Y"); ?></p>
        </div>
        <h2>Thông tin khách hàng:</h2>
        <p>Tên khách hàng: John Doe</p>
        <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ</p>

        <h2>Chi tiết hóa đơn:</h2>
        <table>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá (VNĐ)</th>
                <th>Tổng (VNĐ)</th>
            </tr>
            <tr>
                <td>Sản phẩm A</td>
                <td>2</td>
                <td>100,000</td>
                <td>200,000</td>
            </tr>
            <tr>
                <td>Sản phẩm B</td>
                <td>1</td>
                <td>50,000</td>
                <td>50,000</td>
            </tr>
        </table>
        <p>Tổng cộng: 250,000 VNĐ</p>

        <h2>Phương thức thanh toán:</h2>
        <p>Thanh toán bằng tiền mặt khi nhận hàng.</p>
    </div>
</body>
</html>