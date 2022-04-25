<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("include/link.php");
    ?>
    <title>Hot & Cold</title>
</head>

<body>
    <div class="container-fulid">
        <?php
        include("include/header.php");
        ?>
        <div class="container">
            <div class="trasua mt-3">
                <div class="row mb-5">
                    <div class="col-3">
                        <?php
                        $show_danhmuc = $danhMuc->show_danhmuc();
                        if (isset($show_danhmuc)) {
                            while ($resultDM = $show_danhmuc->fetch_assoc()) {
                            ?>
                                <div class="row mt-2">
                                    <div class="col">
                                        <a href="traSuaTheoDanhMuc.php?ma_danhmuc=<?php echo $resultDM['ma_danhmuc'] ?>">
                                            <button type="button" style="width: 100%;" class="btn btn-light danhmuc">
                                                <i class="fas fa-glass-martini"></i>
                                                <?php echo $resultDM['ten_danhmuc'] ?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-9">
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['themvaogio'])){
                                $inset_giohang = $gioHang->insert_giohang($_POST);
                            }
                        ?>
                        <?php
                            $logincheck = Session::get('login_nguoidung');
                            $login_ten = Session::get('login_ten');
                            $login_ma = Session::get('login_ma');
                            if (isset($_GET['ma_trasua']) && $_GET['ma_trasua'] != NULL){
                                $ma_trasua = $_GET['ma_trasua'];
                                $show_trasua_ma = $traSua->show_trasua_ma($ma_trasua);
                                if(isset($show_trasua_ma)){
                                    $resultTS_M = $show_trasua_ma->fetch_assoc();
                                    ?>
                                        <form action="" method="post">
                                            <div class="row">
                                                <input type="hidden" name="ma_nguoidung" value="<?php echo $login_ma ?>">
                                                <input type="hidden" name="ma_trasua" value="<?php echo $resultTS_M['ma_trasua'] ?>">
                                                <div class="col-6">
                                                    <img src="../admin/uploads/<?php echo $resultTS_M['hinhanh_trasua'] ?>" alt="" style="width: 80%;">
                                                </div>
                                                <div class="col-6">
                                                    <h2 class="mb-3 pt-2 pb-2" style="color: #390657; font-weight: bold; text-align: center; border-bottom: 2px solid gray; border-top: 2px solid gray;"><?php echo $resultTS_M['ten_trasua'] ?></h2>
                                                    <p style="color: gray;">Mã sản phẩm: <?php echo $resultTS_M['ma_trasua'] ?></p>
                                                    <h3 style="color: #007d38; font-weight: bold;"><i class="fas fa-solid fa-money-bill"></i> <?php echo  number_format($resultTS_M['gia_trasua'], 0, ',', '.') . ' <sup>đ</sup>'   ?></h3>
                                                    <p><?php echo $resultTS_M['tomtat_trasua'] ?></p>
                                                    <button type="button" class="btn btn-dark mb-4" style="width: 100%; font-weight: bold;">Chọn phần trăm đá</button>
                                                    <div class="row">
                                                        <?php
                                                            $show_da = $da->show_da();
                                                            if (isset($show_da)){
                                                                while($resultD = $show_da->fetch_assoc()){
                                                                    ?>
                                                                        <div class="form-check col-6">
                                                                            <input class="form-check-input" type="radio" name="ma_phantramda" id="flexRadioDefault1" value="<?php echo $resultD['ma_phantramda'] ?>">
                                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                                <?php echo $resultD['phantram_da'] ?>
                                                                            </label>
                                                                        </div>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                        
                                                        
                                                    </div>
                                                    <button type="button" class="btn btn-dark mb-4" style="width: 100%; font-weight: bold">Chọn phần trăm đường</button>
                                                    <div class="row">
                                                    <?php
                                                            $show_duong = $duong->show_duong();
                                                            if (isset($show_duong)){
                                                                while($resultDuong = $show_duong->fetch_assoc()){
                                                                    ?>
                                                                        <div class="form-check col-6">
                                                                            <input class="form-check-input" type="radio" name="ma_phantramduong" id="flexRadioDefault1" value="<?php echo $resultDuong['ma_phantramduong'] ?>">
                                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                                <?php echo $resultDuong['phantram_duong'] ?>
                                                                            </label>
                                                                        </div>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                    <button type="button" class="btn btn-dark mb-4" style="width: 100%; font-weight: bold">Số lượng</button>
                                                    <div class="row">
                                                        <div class=" col-6">
                                                            <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" min="0" max="10" name="soluong_dat" value="1">
                                                        </div>
                                                        <?php
                                                            if ($login_ma != 0){
                                                                ?>
                                                                    <div class="col-6">
                                                                        <button class="btn btn-primary" type="submit" name="themvaogio" style="background-color: #007d38; font-weight: bold; width: 100%;"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ</button>  
                                                                    </div>
                                                                <?php
                                                            } else{
                                                                ?>
                                                                    <div class="col-6">
                                                                        <a href="dangNhap.php">
                                                                            <button type="button" class="btn btn-danger " style="font-weight: bold;"> <i class="fas fa-sign-in-alt"></i> Đăng nhập để đặt hàng</button>
                                                                        </a>
                                                                    </div>
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php
            include("include/footer.php");
            ?>
        </div>
    </div>
</body>

</html>