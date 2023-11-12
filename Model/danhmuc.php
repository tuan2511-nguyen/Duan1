<?php
    function insert_danhmuc($name){
        $sql = "INSERT INTO loaihang(ten_loai) VALUES ('$name')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql = "DELETE FROM loaihang WHERE ma_loai=".$_GET['ma_loai'];
        pdo_execute($sql);
    }

    function loadall_danhmuc(){
        $sql = "SELECT * FROM loaihang ORDER BY ma_loai DESC";
        $listdm = pdo_query($sql);
        return $listdm;
    }
    function loadone_danhmuc($ma_loai){
        $sql = "SELECT * FROM loaihang WHERE ma_loai=".$ma_loai;
        $dm = pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($ma_loai, $ten_loai){
        $sql = "UPDATE `loaihang` SET `ten_loai` = '$ten_loai' WHERE `loaihang`.`ma_loai` = $ma_loai";
        pdo_execute($sql);
    }
?>