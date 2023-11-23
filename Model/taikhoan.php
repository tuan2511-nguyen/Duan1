<?php
    function insert_taikhoan($username,$pass,$email,$hoten,$sdt,$address){
        $sql = "INSERT INTO users(username,password,email,ho_ten,sdt,address) VALUES ('$username','$pass','$email','$hoten','$sdt','$address')";
        pdo_execute($sql);
    }
    function check_user($user,$pass){
        $sql = "SELECT * FROM users WHERE username='".$user."'AND password='".$pass."'";
        $kq = pdo_query_one($sql);
        return $kq;
    }
?>