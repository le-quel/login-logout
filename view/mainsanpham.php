<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/style.css">
    <style>
    a {
        color: black;

    }

    h1 {
        text-align: center;
    }
    </style>
</head>

<body>
    <h1>Danh sách sản phẩm</h1>
    <div class="docker">
        <?php
        foreach ($dssp as $value) {
            extract($value);
           $linkdetail="index.php?pg=productdetail&idproduct=".$id;
           echo ' 
           <div class="fullsp">
           <div class="sanpham">  
            <img src="./img/'.$image.'"  alt="">
            <a class="sanpham-image" href="'.$linkdetail.'"><img src="'.$image.'" width="200px" alt=""></a> 
           <a href="'.$linkdetail.'"><h3>'.$name.'</h3></a>
           <strong>'. number_format($price, 0 , ',' , '.') .' <sup>đ</sup></strong><del>'.number_format($giacu, 0 , ',' , '.') .'</del> 
           <span>⭐⭐⭐⭐⭐</span>
           <div class="button-km"><p> Tặng thêm dịch vụ bảo hành vip 12 tháng 1 đổi 1</p></div>   
           <form action="./modules/addtocart.php" method="post">
           <input type="hidden" name="id" value="'.$id.'">
            <input type="hidden" name="img" value="'.$image.'" >
            <input type="hidden" name="tensp" value="'.$name.' ">
            <input type="hidden" name="gia" value="'.$price.'">
            <input class="submit" type="submit" value="Đặt hàng" name="dathang">
            </form>
            </div>
        
    </div>';
        }
    ?>

    </div>

</body>

</html>