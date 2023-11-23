<?php
    function insert_sanpham($tensp,$giasp,$giakm,$mota,$hinh,$iddm){
        $sql="insert into sanpham(ten_sp,gia_goc,gia_khuyenmai,mota,img,id_dm) values('$tensp','$giasp','$giakm','$mota','$hinh','$iddm')";
        pdo_execute($sql);
    }
    function insert_bienthesanpham($mausac,$size,$soluong,$id_sp){
        $sql="insert into ct_sanpham(mausac,size,soluong,id_sp) values('$mausac','$size','$soluong','$id_sp')";
        pdo_execute($sql);
    }
    function delete_sanpham($id_sp){
        $sql="delete from sanpham where id_sp=".$id_sp;
        pdo_execute($sql);
    }
    function loadall_sanpham($iddm=0){
        $sql="select * from sanpham where 1";
        if($iddm>0){
            $sql.=" and id_dm ='".$iddm."'";
        }
        $sql.=" order by id_dm asc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadone_sanpham($id_sp){
        $sql="select * from sanpham where id_sp=".$id_sp;
        $sanpham=pdo_query_one($sql);
        return $sanpham;
    }
    function update_sanpham($id_sp,$iddm,$tensp,$giasp,$giakm,$mota,$hinh){
        if($hinh!="")
            $sql="update sanpham set id_dm='".$iddm."',ten_sp='".$tensp."',gia_goc='".$giasp."',gia_khuyenmai='".$giakm."',mota='".$mota."',img='".$hinh."' where id_sp=".$id_sp;
        else
            $sql="update sanpham set id_dm='".$iddm."',ten_sp='".$tensp."',gia_goc='".$giasp."',gia_khuyenmai='".$giakm."',mota='".$mota."' where id_sp=".$id_sp;
        pdo_execute($sql);
    }
    function loadall_sanpham_home(){
        $sql="select * from sanpham where 1 order by id_sp desc limit 0,8";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
?>