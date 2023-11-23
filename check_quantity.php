<?php
include "Model/pdo.php";
include "Model/sanpham.php";

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_POST['color']) && isset($_POST['size']) && isset($_POST['product_id'])) {
        $color_id = $_POST['color'];
        $size_id = $_POST['size'];
        $product_id = $_POST['product_id'];
        $quantity = load_sl_sp($product_id, $color_id, $size_id);

        // Kiểm tra số lượng
        if ($_POST['quantity'] > $quantity) {
            // Trả về một đối tượng JSON chứa thông báo lỗi và số lượng
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Số lượng không thể lớn hơn số lượng trong kho',
                'quantity' => $quantity
            ));
        } else {
            // Trả về một đối tượng JSON chứa thông báo thành công và số lượng
            echo json_encode(array(
                'status' => 'success',
                'message' => 'Số lượng hợp lệ',
                'quantity' => $_POST['quantity']
            ));
        }
    }
}
