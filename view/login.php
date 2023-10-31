<?php
    
    // $one = []; 
    // if(isset($one[0]['name'])) {
    //     $name = $one[0]['name'];
    // } else {
    //     $name = ''; 
    // }
?>
<style>
form {
    border: 1px solid #ccc;
    text-align: center;
    margin: 20px auto;
    width: 300px;
    padding: 20px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

h1 {
    color: red;
}

label {
    display: block;
    text-align: left;
    font-weight: 600;
}

.input-signup {
    margin: 5px 0;
    padding: 10px;
    width: 100%;
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
</style>
<?php
    if(isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")){
    echo $_SESSION['tb_dangnhap'];
    unset ($_SESSION['tb_dangnhap']);
        } 
?>
<form action="index.php?act=login" method="post" onsubmit="return check();">
    <h1>Đăng Nhập</h1>
    <label>Tên đăng nhập</label>
    <input class="input-signup" type="text" name="name" id="name" value=""><br>
    <label>Password</label>
    <input class="input-signup" type="password" name="password" id="password" value=""><br><br>
    <label for=""><a href="">Quên Mật Khẩu?</a> </label><br>

    <label for=""> Ghi nhớ mật khẩu <input type="checkbox" name="" id=""></label>
    <input type="hidden" name="id" value="<?=$one[0]['id'] ?>">
    <input type="submit" name="dangnhap" value=" Đăng nhập ">
</form>

<script>
function check() {
    var name = document.getElementById("name");
    var pass = document.getElementById("password");

    if (name.value === "") {
        alert("Vui lòng không để trống tên đăng nhập!");
        name.focus();
        return false;
    } else if (password.value === "") {
        alert("Vui lòng không để trống mật khẩu!");
        password.focus();
        return false;
    }
    return true;
}
</script>