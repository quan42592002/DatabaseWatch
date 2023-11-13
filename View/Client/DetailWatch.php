<input type="hidden" id="IdDongHo" value="<?php
                                            echo  $_GET['IdDongHo'];
                                            ?>">
<input type="hidden" id="UsersId" value="<?php
                                            if (isset($_SESSION['LoaiTaiKhoan'])) {
                                                echo $_SESSION['IdUsers'];
                                            }
                                            ?>">
<!-- body-product -->
<div class="body-product" style="margin-top: 35px;">
    <!--body-product-left -->
    <div class="body-product-left">
        <!-- product-item -->
        <div class="product-item">
            <!-- image-item -->
            <div onload="onload()" class="image-product-item">
                <div class="img-slide">
                    <div class="">
                        <div class="img-show">
                            <img id="urlFlieAnh" src="" alt="">
                        </div>
                        <ul class="sub-img-show flashsale-main" id="lstAnhSanPham">

                        </ul>

                    </div>
                    <div class="img-slide2">
                        <div class="img-show">
                            <img id="slide-show" src="Image_dalis/galaxy-s7-edge-1black.jpg" alt="">
                        </div>
                        <ul class="sub-img-show">
                            <li><img style="border: none;" id="img1" onclick="change_img('img5')" src="http://localhost:3000/UpLoad/DongHo/1699618077_1-KHUNG-SP-6676612-1785849039.webp" alt=""></li>
                            <li><img style="border: none;" id="img2" onclick="change_img('img6')" src="http://localhost:3000/UpLoad/DongHo/1699618077_1-KHUNG-SP-6676612-1785849039.webp" alt=""></li>
                            <li><img style="border: none;" id="img3" onclick="change_img('img7')" src="http://localhost:3000/UpLoad/DongHo/1699618077_1-KHUNG-SP-6676612-1785849039.webp" alt=""></li>


                        </ul>
                    </div>
                </div>
            </div>
            <!-- END image-item -->
            <!-- sub-item -->
            <div class="sub-item">
                <div class="name-item" id="TenDongHoMain"> </div>
                <!-- status brand -->
                <ul class="status-brand">
                    <li>Số lượng: &nbsp; <h style="font-weight: bold;" id="SoLuong">Còn hàng</h>
                    </li>
                    <li>Thương hiệu: &nbsp; <h style="font-weight: bold;" id="ThuongHieu"></h>
                    </li>
                </ul>
                <!--end status brand -->
                <div style="display: flex;">
                    <h4>Giá bán:<h2 id="GiaBan" style="margin-top: 12px;
    margin-left: 15px;"></h2>
                    </h4>
                </div>
                <div style="display: flex; color: gray;">
                    <h4 style="margin-top: 5px;">Giá Giảm:<h2 id="GiaGiam" style="text-decoration: line-through;margin-top: 0px;
    margin-left: 15px;"></h2>
                    </h4>
                </div>
                <!-- quantity -->
                <div class="quantity">
                    <div id="btnThemGio">
                    </div>
                    <div class="" style="margin-left: 10px;"><a class="btn btn-primary" href="">MUA NGAY</a> </div>
                </div>
                <!--End quantity -->
            </div>

            <!-- END sub-item -->
        </div>
        <!--END-product-item -->

        <div class="describe">
            <ul>
                <li style="border-bottom:4px solid red;" id="s-b1">Mô tả sản phẩm</li>
                <li id="s-b2">Giới thiệu</li>
            </ul>
        </div>



    </div>
    <!-- END body-product-left -->


    <!-- body-product-right -->
    <div class="body-product-right">
        <div class="profile-item">
            <ul>
                <li>Chất liệu: Da bò thật</li>
                <li>Độ dầy: 0.6 ~ 0.8mm</li>
                <li>Trọng lượng : 14g</li>
                <li>Công nghệ: Cắt, khắc bằng Laser cho độ chính xác tuyệt đối trên sản phẩm</li>
                <li>May thủ công hoàn toàn với những đôi bàn tay khéo léo, mỗi đường kim mũi chỉ thể hiện sự
                    tâm huyết của người nghệ sĩ trên tác phẩm của mình, mang đến trải nghiệm tốt nhất cho
                    người dùng</li>
                <li>Sản xuất: Việt Nam.</li>
            </ul>
        </div>
    </div>
    <!-- END body-product-right -->
</div>

<!-- end-body-product -->

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
<div class="similar-product">
    <div class="title-similar-product">SẢN PHẨM CÙNG LOẠI</div>
    <div class="item-similar-product">
        <div class="high-class">
            <div class="high-class-main" id="lstDuLieu" style="    position: absolute;
    top: 0px;
    left: 119px;">
                <!-- 1 -->

            </div>
        </div>
    </div>
    <!--  -->
</div>
<script id="data-anh-san-pham" type="x-tmpl-mustache">
    <li><img style="border: none;" src="{{ UrlFile }}" alt=""></li>
    </script>
<script id="data-dong-ho-main" type="x-tmpl-mustache">
    <div class="flashsale-product">
      <div class="flashsale-product-main">
        <div class="img-fls-product"><a href=""><img src="{{Url_anh}}" alt=""></a> </div>
        <div class="name-fls-product">
          <a href="javascript:myEventHome.DetailChiTiet({{IdDongHo}})" style="color:black"><h3>{{TenDongHo}}</h3></a>
        </div>
        <div class="price-fls-product">
          <ul>
            <li> <a style="color:rgb(237,28,36);font-weight: bold;font-size: 16px;" href="">{{GiaBan}}</a></li>
            <li style="display: flex;"><a style="color:rgb(164,164,164);font-size: 14px;text-decoration-line:line-through">{{GiaGiam}}</a>
              <div class="fls-discount">-{{GiamGia}}%</div>
            </li>
          </ul>
        </div>
        <div class="fls-rating">
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-half"></i>
          <i class="bi bi-star"></i>
          <i style="font-size: 14px;font-style: normal;">9</i>
          <a href="javascript:myEventHome.AddShopping({{IdDongHo}} , {{ SoLuong }})">
            <button type="button" title="Thêm vào giỏ hàng" class="action primary buynow"><span>
                Thêm vào giỏ hàng
              </span></button>
          </a>
        </div>
      </div>
    </div>
</script>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.luxury').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 2
    });
    $('.flashsale-main').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 500,
    });
    $('.high-class-main').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 51100,
    });
  });
</script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css
" rel="stylesheet">
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js
"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/css/product.css">
<script src="http://localhost:3000/Assets/user/js/mutasche.min.js"></script>
<script src="http://localhost:3000/Assets/user/js/DetailWatch.js"></script>