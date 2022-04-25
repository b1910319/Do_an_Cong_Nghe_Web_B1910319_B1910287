<div class="row header_color sticky-top navbar navbar-expand-lg">
    <div class="col-2">
        <a href="index.php">
            <img src="img/logo/logoweb.png" style="width: 35%;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <?php
    $logincheck = Session::get('login_nguoidung');
    $login_ten = Session::get('login_ten');
    $login_ma = Session::get('login_ma');
    if ($logincheck == false) {
    ?>
        <div class="col-2 mt-4" id="mynavbar">
            <a href="dangNhap.php">
                <button type="button" style="width: 90%;" class="btn btn-light chucnang"> <i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
            </a>
        </div>
        <div class="col-2 mt-4">
            <a href="dangKy.php">
                <button type="button" style="width: 90%;" class="btn btn-light chucnang"> <i class="fas fa-pen-square"></i> Đăng ký</button>
            </a>
        </div>
        <div class="col-2 mt-4">
            <a href="gioHang.php">
                <button type="button" style="width: 90%;" class="btn btn-light chucnang"> <i class="fas fa-shopping-cart"></i> Giỏ hàng</button>
            </a>
        </div>
    <?php
    } else {
    ?>
        <div class="col-2 mt-4">
            <?php
            if (isset($_GET['ma_nguoidung'])) {
                Session::destroy();
            }
            ?>
            <a href="?ma_nguoidung=<?php echo $login_ma ?>">
                <button type="button" style="width: 90%;" class="btn btn-light chucnang"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</button>
            </a>
        </div>
        <div class="col-2 mt-4">
            <a href="thongTinNguoiDung.php">
                <button type="button" style="width: 90%;" class="btn btn-light chucnang"> <i class="fas fa-solid fa-user"></i> <?php echo $login_ten ?></button>
            </a>
        </div>
        <div class="col-2 mt-4">
            <a href="gioHang.php">
                <button type="button" style="width: 90%;" class="btn btn-light chucnang"> <i class="fas fa-shopping-cart"></i> Giỏ hàng</button>
            </a>
        </div>
    <?php
    }
    ?>
    
    <div class="col-4 mt-3">
        <nav class="navbar">
            <div class="" style="width: 50%;">
                <form class="d-flex" method="GET" action="timKiemTraSua.php">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="tukhoa">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </nav>
    </div>
</div>