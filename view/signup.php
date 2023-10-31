<?php
    $one = []; // Initialize an empty array to avoid errors when there's no data
    if(isset($one[0]['name'])) {
        $name = $one[0]['name'];
    } else {
        $name = ''; // Default value if there's no data
    }
?>

<style>
form {
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 500px;
    margin-left: 400px;
    margin-top: 20px;
    margin-bottom: 20px;
}

h1 {
    color: red;
    text-align: center;
}

label {
    font-weight: 600;
    display: block;
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


<form action="index.php?act=adddk" method="post" onsubmit="return check();">
    <h1>Đăng Ký Trở Thành Thành Viên Của OWENSMART</h1>
    <label>Tên User</label>
    <input class="input-signup" type="text" name="name" id="name" value=""><br>
    <label>Password</label>
    <input class="input-signup" type="password" name="password" id="password" value=""><br>
    <label>Số Điện Thoại</label>
    <input class="input-signup" type="text" name="phone" id="phone" value=""><br>
    <label>Email</label>
    <input class="input-signup" type="text" name="email" id="email" value=""><br>
    <label>Địa Chỉ</label>
    <input class="input-signup" type="text" name="address" id="address" value=""><br>
    <input class="input-signup" type="hidden" name="id_loaiuser" id="" value="2"><br>


    <input class="input-signup" type="hidden" name="id" value="<?=$one[0]['id'] ?>">
    <input class="input-signup" type="submit" name="themmoi" value="Đăng ký">
</form>
<script>
function check() {
    var name = document.getElementById("name");
    var pass = document.getElementById("password");
    var sdt = document.getElementById("phone");
    var email = document.getElementById("email");

    // Check if any field is empty
    if (name.value === "" || pass.value === "" || sdt.value === "" || email.value === "") {
        alert("Vui lòng điền đầy đủ thông tin!");
        return false;
    }

    // Check if the phone number is numeric and 10 digits
    if (isNaN(sdt.value) || sdt.value.length !== 10) {
        alert("Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.");
        sdt.focus();
        return false;
    }

    // Check if the email is in a valid format
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email.value)) {
        alert("Email không hợp lệ. Vui lòng nhập đúng định dạng.");
        email.focus();
        return false;
    }

    // Check if the password has at least 6 characters
    if (pass.value.length < 6) {
        alert("Mật khẩu phải có ít nhất 6 ký tự.");
        pass.focus();
        return false;
    }

    return true;
}
</script>