<?php
    include "header.php";
    include "../Model/pdo.php";
    include "../Model/danhmuc.php";


    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act){
            //Danh mục
            case 'adddm' :
                if(isset($_POST['add']) && ($_POST['add']) ){
                    $name = $_POST['ten_loai'];
                    insert_danhmuc($name);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add-category.php";
                break;
            case 'qldm':
                $listdm = loadall_danhmuc();
                include "danhmuc/list-category.php";
                break;
            case 'xoadm' :
                if(isset($_GET['ma_loai']) && ($_GET['ma_loai']>0)){
                    delete_danhmuc($_GET['ma_loai']);
                }
                $listdm = loadall_danhmuc();
                include "danhmuc/list-category.php";
                break;
            case 'editdm' :
                if(isset($_GET['ma_loai']) && ($_GET['ma_loai'])) {
                    $dm = loadone_danhmuc($_GET['ma_loai']);
                }
                include "danhmuc/update-categry.php";
                break;
            case 'updatedm' :
                if(isset($_POST['update']) && ($_POST['update']) ){
                    $ten_loai = $_POST['ten_loai'];
                    $ma_loai = $_POST['ma_loai'];
                    update_danhmuc($ma_loai, $ten_loai);
                    $thongbao = "Sửa thành công";
                }
                $listdm = loadall_danhmuc();
                include "danhmuc/list-category.php";
                break;
            //Hết Danh mục
            default:
                include "home.php";
                break;
        }
        
    }else{
        include "home.php";
    }
    include "footer.php";
?>