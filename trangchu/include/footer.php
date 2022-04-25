<footer class="text-center text-lg-start bg-light text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
        </div>
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
    </section>
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>HOT & COLD
                    </h6>
                    <p> Uống nước nhớ nguồn, uống trà sữa nhớ quán em </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Sản phẩm
                    </h6>
                    <?php
                    $show_danhmuc = $danhMuc->show_danhmuc();
                    if (isset($show_danhmuc)) {
                        while ($resultDM = $show_danhmuc->fetch_assoc()) {
                    ?>
                            <p>
                                <a href="traSuaTheoDanhMuc.php?ma_danhmuc=<?php echo $resultDM['ma_danhmuc'] ?>" class="text-reset"><?php echo $resultDM['ten_danhmuc'] ?></a>
                            </p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Chức năng
                    </h6>
                    <p>
                        <a href="dangKy.php" class="text-reset">Đăng ký</a>
                    </p>
                    <p>
                        <a href="dangNhap.php" class="text-reset">Đăng nhập</a>
                    </p>
                    <p>
                        <a href="gioHang.php" class="text-reset">Giỏ hàng</a>
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Liên hệ
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Cần Thơ</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        info@example.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-4" style="background-color: #d9c4fc;"></div>
</footer>