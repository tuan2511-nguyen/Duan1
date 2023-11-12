<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="../../index.html">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>Admin
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="section-product-categories">
                        <header class="section-header">
                            <h1 class="woocommerce-products-header__title page-title">Quản lý danh mục</h1>
                        </header>
                    </section>
                    <section class="table-bordered">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Hoạt động</th>
                                <th>Chức năng</th>
                            </tr>
                            <?php foreach($listdm as $dm){
                                extract($dm);
                                $editdm = "index.php?act=editdm&ma_loai=".$ma_loai;
                                $xoadm = "index.php?act=xoadm&ma_loai=".$ma_loai;
                                echo '<tr>
                                    <td>'.$ma_loai.'</td>
                                    <td>'.$ten_loai.'</td>
                                    <td>'.$hoat_dong_loai.'</td>
                                    <td><a href="'.$xoadm.'"><button type="button">Xóa</button></a> |
                                        <a href="'.$editdm.'"><button type="button">Sửa</button></a>
                                    </td>
                                </tr>';
                                }
                            ?>
                        </table>
                    </section>
                    <br>
                    <section>
                        <a href="index.php?act=adddm"><button type="button">Thêm danh mục</button></a>
                    </section>
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                <div id="techmarket_product_categories_widget-2" class="widget woocommerce widget_product_categories techmarket_widget_product_categories">
                    <ul class="product-categories category-single">
                        <li class="product_cat">
                            <ul>
                                <li style="border-bottom: 5px solid rgb(168, 168, 255);"><a href="../danhmuc/list-category.html">Quản lý danh mục</a></li>
                            </ul>
                            <ul>
                                <li><a href="../sanpham/list-product.html">Quản lý sản phẩm</a></li>
                            </ul>
                            <ul>
                                <li><a href="">Quản lý tài khoản</a></li>
                            </ul>
                            <ul>
                                <li><a href="">Quản lý bình luận</a></li>
                            </ul>
                            <ul>
                                <li><a href="">Quản lý voucher</a></li>
                            </ul>
                            <ul>
                                <li class="cat-item current-cat"><a href="">Quản lý đơn hàng</a></li>
                            </ul>
                            <ul>
                                <li class="cat-item current-cat"><a href="">Thống kê</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>