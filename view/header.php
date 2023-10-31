<?php
if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0))
{
    extract($_SESSION['s_user']);
    $html_account='<a  class="menucon" href="index.php?act=myaccount"><i class="fa-solid fa-user"></i> '.$name.' </a>      
    <a  class="menucon" href="index.php?act=logout"><i class="fa-solid fa-right-from-bracket"></i> Thoát </a>';
}else{
    $html_account='<a  class="menucon" href="index.php?act=dangky"><i class="fa-solid fa-user"></i> Đăng ký </a>      
    <a  class="menucon" href="index.php?act=dangnhap"><i class="fa-solid fa-user"></i> Đăng nhập </a>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
</head>

<body>
    <div id="container">
        <header>


            <div class="banner"> <img src="./view/img/logtren.png" alt=""></div>
            <div class="menu">
                <a href="index.php"><img src="./img/logoOwen.png" width="150px" alt=""> </a>
                <a class="menucon" href=""><i class="fa-solid fa-bars"></i> Danh mục</a>
                <a class="menucon" href=""><i class="fa-solid fa-location-dot"></i> Máy Cũ</a>
                <a class="menucon" href=""><i class="fa-solid fa-phone-volume"></i> Liên hệ</a>
                <input type="text" placeholder="Bạn muốn tìm gì ?">
                <a class="menucon" href=""><i class="fa-solid fa-location-dot"></i> Cửa hàng</a>
                <a class="menucon" href="index.php?act=giohang"><i class="fa-solid fa-cart-plus"></i> Giỏ Hàng</a>

                <!-- <a class="menucon" href="index.php?act=dangky"><i class="fa-solid fa-user"></i> Đăng Ký</a>
                <a class="menucon" href="index.php?act=dangnhap"><i class="fa-solid fa-user"></i> Đăng nhập</a> -->

                <?=$html_account;?>

            </div>
        </header>
        <!-- menu bên trái  -->
        <div class="end-header">
            <div class="menu-left">
                <ul>
                    <li><a href=""><i class="fa-solid fa-mobile-screen"></i> Điện thoại, Tablet</a></li>
                    <li><a href=""><i class="fa-solid fa-laptop"></i> Laptop</a></li>
                    <li><a href=""><i class="fa-solid fa-headphones-simple"></i> Âm thanh</a></li>
                    <li><a href=""><i class="fa-solid fa-house-signal"></i> Nhà Thông Minh</a></li>
                    <li><a href=""><i class="fa-regular fa-keyboard"></i> Phụ Kiện</a></li>
                    <li><a href=""><i class="fa-solid fa-desktop"></i> PC, Màn Hình</a></li>
                    <li><a href=""><i class="fa-solid fa-tv"></i> Tivi</a></li>
                    <li><a href=""><i class="fa-solid fa-mobile-screen-button"></i> Thu cũ đổi mới</a></li>
                    <li><a href=""><i class="fa-solid fa-laptop-code"></i> Hàng cũ</a></li>
                    <li><a href=""><i class="fa-solid fa-bullhorn"></i> Kuyến Mãi</a></li>
                    <li><a href=""><i class="fa-solid fa-comment-dots"></i> Tin Công Nghệ</a></li>
                </ul>
            </div>
            <!-- banner giữa  -->

            <div class="banner-center">

                <div class="banner-center">
                    <img style="width: 620px;height:300px;" src="./img/slide1.png" class="bt" alt="">


                </div>
                <script>
                var slider = document.querySelector(".bt");
                var arr = [
                    "./uploaded/slide_show1.webp",
                    "./uploaded/slide_show2.webp",
                    "./uploaded/slide_show3.webp",
                    "./uploaded/slide_show4.webp"

                ];
                var idx = 0;

                function next() {
                    idx++;
                    if (idx >= arr.length)
                        idx = 0;
                    slider.src = arr[idx];
                }

                setInterval("next()", 1000);
                </script>
            </div>
            <!-- bannner right  -->
            <div class="banner-right" style="margin: 10px;">

                <img src="./img/banner-right1.webp" width="280px" height="100px" alt="">
                <img src="./img/banner-right2.webp" width="280px" height="100px" alt="">
                <img src="./img/banner-right3.webp" width="280px" height="100px" alt="">
            </div>
            <!-- div banner  -->
        </div>
        <img src="img/banner-next2.webp" height="70px" width="100%" alt="">
        <!-- <img src="./view/img/banner3.png" width="" height="10px" alt=""> -->

        <!-- main  -->


    </div>


</body>

</html>