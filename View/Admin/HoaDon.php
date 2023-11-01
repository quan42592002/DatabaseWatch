<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Hóa đơn nhập</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue;padding: 20px; ">
            <select name="" id="" class="form-control" style="width: 30%;">
                <option value="">--Chọn phân loại --</option>
                <option value="">1. Xem hóa đơn theo tháng</option>
                <option value="">2. Xem hóa đơn theo ngày</option>
            </select>
        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">
                <div class="invoice">
                    <div class="header">
                        <h1>Phiếu nhập</h1>
                    </div>
                    <div class="invoice-details">
                        <p>Ngày tạo: <?php echo date("d/m/Y"); ?></p>
                    </div>
                    <h2>Thông tin hóa đơn:</h2>
                    <p>Người nhập: </p>
                    <p>Số hiệu: </p>

                    <h2>Chi tiết hóa đơn:</h2>
                    <table>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên Sản phẩm</th>
                            <th>Số lượng nhập</th>
                            <th>Giá nhập</th>
                            <th>Giá Bán</th>
                        </tr>
                        <tbody id="tbl_HoaDon">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>

                    </table>
                    <p>Tổng tiền : 250,000 VNĐ</p>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/HoaDon.js"></script>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .invoice {
        width: 100%;
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

    .invoice th,
    .invoice td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    .invoice th {
        background-color: #f2f2f2;
    }
</style>