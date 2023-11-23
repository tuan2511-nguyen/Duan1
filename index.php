<?php
session_start();
ini_set('display_errors', 1);
include "Model/pdo.php";
include "Model/sanpham.php";
include "Model/taikhoan.php";
include "view/header.php";
include 'functions.php';

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "danhmuc":
            if (isset($_POST['kw']) && $_POST['kw'] !== "") {
                $kw = $_POST['kw'];
            } else {
                $kw = "";
            }

            $selectedCategories = isset($_POST['danh_muc']) ? $_POST['danh_muc'] : [];
            $selectedColors = isset($_POST['colors']) ? $_POST['colors'] : [];
            $selectedBrands = isset($_POST['brands']) ? $_POST['brands'] : [];
            $selectedPriceRanges = isset($_POST['price_range']) ? $_POST['price_range'] : [];

            $whereConditions = [];

            // Thêm điều kiện cho danh mục
            $categoryCondition = addCategoryCondition($selectedCategories);
            if ($categoryCondition !== "") {
                $whereConditions[] = $categoryCondition;
            }

            // Thêm điều kiện cho màu sắc
            $colorCondition = addColorCondition($selectedColors);
            if ($colorCondition !== "") {
                $whereConditions[] = $colorCondition;
            }

            // Thêm điều kiện cho thương hiệu
            $brandCondition = addBrandCondition($selectedBrands);
            if ($brandCondition !== "") {
                $whereConditions[] = $brandCondition;
            }

            // Thêm điều kiện cho khoảng giá
            $priceCondition = addPriceCondition($selectedPriceRanges);
            if ($priceCondition !== "") {
                $whereConditions[] = $priceCondition;
            }

            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 9;
            $total_records = get_total_products($kw, $whereConditions); // Truyền điều kiện tìm kiếm vào get_total_products
            $total_records = intval($total_records);
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;

            // Tải sản phẩm với điều kiện tìm kiếm
            $dssp = load_sp($start, $limit, $kw, $whereConditions);
            $danhmuc = load_dm();
            $colors = load_colors();
            $brands = load_brands();
            include "view/sanpham/danhsachsp.php";
            break;

        case 'ct_sanpham':
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $product_id = $_GET['id_sp'];
                $ctsp = load_spct($product_id);
                $load_color = load_color($product_id);
                $load_size = load_size($product_id);
                $load_random = load_random();
            }
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
                            'message' => 'Số lượng không thể lớn hơn số lượng trong cơ sở dữ liệu',
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
            include "view/sanpham/product-detail.php";
            break;
        case 'dangky':
            
            if (isset($_POST['btn_register']) && ($_POST['btn_register'])) {
                $username = $_POST['username'];
                $pass = $_POST['password'];
                $email = $_POST['email'];
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $address = $_POST['address'];
            
                // Kiểm tra xem tất cả các trường có trống không
                if (empty($username) || empty($pass) || empty($email) || empty($hoten) || empty($sdt) || empty($address)) {
                    $thongbao = "<div class='notification'>Tất cả các trường đều phải được điền.</div>";
                } else {
                    // Thực hiện các kiểm tra khác ở đây, ví dụ như kiểm tra định dạng email
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $thongbao = "<div class='notification'>Email không hợp lệ.</div>";
                    } else {
                        // Nếu tất cả các kiểm tra đều thành công, thì tiếp tục đăng ký
                        insert_taikhoan($username, $pass, $email, $hoten, $sdt, $address);
                        $thongbao = "<div class='notification'>Đăng ký thành công. Vui lòng đăng nhập</div>";
                    }
                }
            }
            
            
            include "view/taikhoan/account.php";
            break;
        case 'dangnhap':
            if (isset($_POST['btn_login']) && ($_POST['btn_login'])) {
                $user = $_POST['username'];
                $pass = $_POST['password'];
            
                // Kiểm tra xem tên người dùng và mật khẩu có trống không
                if (empty($user) || empty($pass)) {
                    $thongbao = "Tên người dùng và mật khẩu không được để trống.";
                } else {
                    $checkUser = check_user($user, $pass);
                    if (is_array($checkUser)) {
                        $_SESSION['username'] = $checkUser;
                        echo '<script>window.location.href = "index.php";</script>';
                    } else {
                        $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký.";
                    }
                }
            }
            
            include "view/taikhoan/account.php";
            break;
        case 'binhluan':
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $product_id = $_GET['id_sp'];
                $ctsp = load_spct($product_id);
            }
            include "view/binhluan/binhluan.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
