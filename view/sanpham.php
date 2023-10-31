<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

form {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    padding: 20px;
    width: 500px;
}

h1 {
    color: #ff5733;
}

label {
    font-weight: 600;
}

input[type="text"],
input[type="file"],
select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    font-weight: 600;
    padding: 10px;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

table {
    background-color: #fff;
    border: 1px solid #ccc;
    border-collapse: collapse;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    width: 100%;
}

th,
td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

th {
    background-color: white;
    color: black;
    font-weight: 600;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e0e0e0;
}
</style>

<form action="index.php?act=adspadd" method="POST" enctype="multipart/form-data" onsubmit="return check();">
    <h1>QUẢN LÝ SẢN PHẨM</h1>
    <label for="name">Tên sản phẩm <input type="text" name="name" id="name"></label><br>
    <label for="image">Hình ảnh <input type="file" name="image" id="image"></label><br>
    <label for="price">Giá<input type="text" name="price" id="price"></label><br>
    <label for="giacu">Giá cũ<input type="text" name="giacu" id="giacu"></label><br>
    <label for="iddm">Danh mục <select name="iddm" id="iddm">
            <option value="0">Chọn danh mục</option>
            <?php
            if(isset($kq)){
                foreach($kq as $dm){
                    echo '<option value="'.$dm['id'].'">'.$dm['tendm'].'</option>';
                }
            } 
        ?>
        </select></label><br>
    <input type="submit" name="themmoi" value="Thêm mới">
</form>
<table border="1" style="color: black; width: 1100px;">
    <tr>
        <th>STT</th>
        <th>TÊN</th>
        <th>ẢNH</th>
        <th>GIÁ</th>
        <th>GIÁ CŨ</th>
        <th>TÊN DANH MỤC</th>
        <th>HÀNH ĐỘNG</th>
    </tr>
    <?php   
    if (isset($dssp) && count($dssp) > 0) {
        $i = 1;
        foreach ($dssp as $sp) {
            echo '
            <tr>
                <th>' . $i . '</th>
                <th>' . $sp['name'] . '</th>
                <th><img width="80px" height="100px" src="'.$sp['image'].'" alt=""></th>
                <th>'. number_format($sp['price'], 0, ',', '.') .' VNĐ</th>
                <th>'. number_format($sp['giacu'], 0, ',', '.') .' VNĐ</th>
                <th>' . $sp['tendm'] . '</th>
                <th><a href="index.php?act=updatesp&id=' . $sp['id'] . '">sửa</a> | <a href="index.php?act=delsp&id=' . $sp['id'] . '">Xóa</a></th>
            </tr>';
            $i++;
        }
    }
    ?>
</table>
<script>
function check() {
    var name = document.getElementById("name");
    var image = document.getElementById("image");
    var price = document.getElementById("price");
    var giacu = document.getElementById("giacu");
    var iddm = document.getElementById("iddm");

    // Create an array of input fields and their corresponding labels
    var fields = [{
            input: name,
            label: "Tên sản phẩm"
        },
        {
            input: image,
            label: "Hình ảnh"
        },
        {
            input: price,
            label: "Giá"
        },
        {
            input: giacu,
            label: "Giá cũ"
        },
        {
            input: iddm,
            label: "Danh mục"
        }
    ];

    // Check if any field is empty
    for (var i = 0; i < fields.length; i++) {
        var field = fields[i].input;
        if (field.value.trim() === "") {
            alert(fields[i].label + " không được để trống!");
            field.focus();
            return false;
        }
    }

    // Check if the selected category is "Chọn danh mục"
    if (iddm.value === "0") {
        alert("Vui lòng chọn một danh mục!");
        iddm.focus();
        return false;
    }

    // Check if the price is a valid number
    if (isNaN(price.value)) {
        alert("Giá phải là một con số!");
        price.focus();
        return false;
    }

    return true;
}
</script>