<?php
    if(is_array($dm)){
        extract($dm);
    }
    var_dump($dm);
?>
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
                            <h1 class="woocommerce-products-header__title page-title">Thêm danh mục</h1>
                        </header>
                    </section>
                    <section class="add-categories">
                        <form action="index.php?act=updatedm" method="POST">
                            <input type="text" name="ten_loai" id="add-category" value="<?php echo $ten_loai ?>">
                            <input type="hidden" name="ma_loai" value="<?php if(isset($ma_loai)&&($ma_loai>0)) echo $ma_loai ?>">
                            <input type="submit" name="update" id="" value="Sửa">                         
                        </form>
                    </section>
                    <br>
                    <section>
                        <?php
                            if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
                        ?>
                    </section>
                    <br>
                    <section>
                        <a href="index.php?act=qldm"><button type="button">Danh sách danh mục</button></a>
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
                                <li style="border-bottom: 5px solid rgb(168, 168, 255);"><a href="index.php?act=qldm">Quản lý danh mục</a></li>
                            </ul>
                            <ul>
                                <li><a href="index.php?act=qlsp">Quản lý sản phẩm</a></li>
                            </ul>
                            <ul>
                                <li><a href="index.php?act=qltk">Quản lý tài khoản</a></li>
                            </ul>
                            <ul>
                                <li><a href="index.php?act=qlbl">Quản lý bình luận</a></li>
                            </ul>
                            <ul>
                                <li><a href="">Quản lý voucher</a></li>
                            </ul>
                            <ul>
                                <li><a href="">Quản lý đơn hàng</a></li>
                            </ul>
                            <ul>
                                <li><a href="">Thống kê</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>