<?php $this->FogetQuestion() ?>
<div class="login" style="margin-top: 40px;">
    <img class="site-icon " src="http://localhost:3000/UpLoad/Public/Login.jpg"  width="580px">
    <form action="" method="post" class="form-login" style="width: 30%;">
        <div class="card" style="margin-left:0 ;margin-bottom: 0;">
            <div class="card-header" style="background: #f1f3f4;">
                <h3 style="color: #826c6c;">Khôi phục tài khoản</h3>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<bold style='color: red;
                    text-align: center;
                    display: block;
                    padding: 9px;'>" . $_SESSION['error'] . "</bold>";
                    $_SESSION['error'] = null;
                } else {
                    echo "<bold style='color: green;
                    text-align: center;
                    display: block;
                    padding: 9px;'>" . $_SESSION['success'] . "</bold>";
                    $_SESSION['success'] = null;
                }
                ?>
                <input type="text" hidden value="<?php if(isset($_GET['user_name'])) {echo $_GET['user_name'];} ?>" name="userName">
                <h3 class="message-done text-center">
                  <?php
                   if (isset($_GET['success'])) {
                          echo urldecode($_GET['success']);
                      }
                  ?>
                 </h3>
                <div class="form-group p-1">
                    <label for="" class="form-label">Lựa chọn khôi phục:</label>
                    <select name="" id="cbLuaChon" class="form-control" style="margin-top: 8px;" onchange="regesterEvent()">
                        <option value="">-- Lựa chọn khôi phục --</option>
                        <option value="Khôi phục qua câu hỏi">Khôi phục qua câu hỏi</option>
                        <option value="Khôi phục qua mã pin">Khôi phục qua mã pin</option>
                    </select>
                </div>
                <div class="form-group p-1 show-mapin">
                    <label for="" class="form-label">Mã Pin:</label>
                    <input type="number" min="0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" class="form-control" name="ma_pin" placeholder="Nhập mã pin.." />
                </div>
                <div class="form-group p-1 show-cautraloi">
                    <label for="" class="form-label">Câu hỏi bảo mật:</label>
                    <select name="cau_hoi" id="" class="form-control" style="margin-top: 8px;">
                        <option value="">-- Lựa chọn câu hỏi --</option>
                        <option value="abc">Tên của người yêu cũ là gì? </option>
                        <option value="xyz">Lý do chia tay người yêu cũ là gì?</option>
                    </select>
                </div>
                <div class="form-group p-1 show-cautraloi">
                    <label for="" class="form-label">Câu trả lời:</label>
                    <input type="text" class="form-control" name="cau_tra_loi" placeholder="Nhập câu trả lời...">
                </div>
                <div class="form-group p-1">
                    <button class="btn btn-primary" style="display: flex;">Gửi yêu cầu</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function reset() {
        $(".show-email").hide();
        $(".show-mapin").hide();
        $(".show-cautraloi").hide();
    };

    function regesterEvent() {
        var cbLuaChon = $("#cbLuaChon").val();
        reset();
        if (cbLuaChon == "Khôi phục qua Email") {
            $(".show-email").show();
        } else if (cbLuaChon == "Khôi phục qua câu hỏi") {
            $(".show-cautraloi").show();
        } else if (cbLuaChon == "Khôi phục qua mã pin") {
            $(".show-mapin").show();
        }

    };
    reset();
</script>
<style>
     .message-done {
        color: #00b894;
        font-size: 14px;
        text-align: center;
        margin-bottom: 0;
        padding: 5px;

    }
</style>