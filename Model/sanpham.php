<?php
function buildSelect()
{
    return "SELECT sp.*, c.color_name";
}

function buildFrom() {
    return "FROM san_pham AS sp
            LEFT JOIN colors AS c ON sp.product_id = c.product_id";
}


function buildWhere($kw, $whereConditions)
{
    if ($kw !== "") {
        $whereConditions[] = "sp.name LIKE '%" . $kw . "%'";
    }

    if (!empty($whereConditions)) {
        return "WHERE " . implode(' AND ', $whereConditions);
    }
    return "";
}

function buildLimit($start, $limit)
{
    return "LIMIT $start, $limit";
}

function load_sp($start, $limit, $kw = "", $whereConditions = [])
{
    // Sử dụng các hàm trên để xây dựng truy vấn SQL
    $sql = buildSelect() . ' ' .
        buildFrom() . ' ' .
        buildWhere($kw, $whereConditions) . ' ' .
        buildLimit($start, $limit);
    $listsp = pdo_query($sql);
    return $listsp;
}


function get_total_products()
{
    $sql = "SELECT COUNT(*) as total FROM san_pham";
    return pdo_query_value($sql);
}

function load_dm()
{
    $sql = "SELECT * FROM danh_muc";
    $listdm = pdo_query($sql);
    return $listdm;
}
function getCountForCategory($category_id)
{
    $sql = "SELECT COUNT(*) as count FROM san_pham WHERE category_id = $category_id";
    $countdm = pdo_query_value($sql);
    return $countdm;
}
function load_colors()
{
    $sql = "SELECT * FROM colors";
    $listdm = pdo_query($sql);
    return $listdm;
}
function load_brands()
{
    $sql = "SELECT * FROM brands";
    $listdm = pdo_query($sql);
    return $listdm;
}
function load_price()
{
    $sql = "SELECT * FROM ";
    $listdm = pdo_query($sql);
    return $listdm;
}

//chi tiết sản phẩm
function load_spct($product_id)
{
    $sql = "SELECT * FROM san_pham WHERE product_id = $product_id";
    return pdo_query_one($sql);
}


function load_size($product_id){
    $sql = "SELECT * FROM sizes WHERE product_id = $product_id";
    return pdo_query($sql);
}
function load_color($product_id){
    $sql = "SELECT * FROM colors WHERE product_id = $product_id";
    return pdo_query($sql);
}

//load sản phẩm ngẫu nhiên

function load_random(){
    $sql = "SELECT * FROM san_pham ORDER BY RAND() LIMIT 5";
    return pdo_query($sql);
}
//load số lượng sản phẩm
function load_sl_sp($product_id, $color_id, $size_id){
    $sql = "SELECT so_luong FROM so_luong_sp WHERE product_id = $product_id AND color_id = $color_id AND size_id = $size_id";
    return pdo_query($sql);
}