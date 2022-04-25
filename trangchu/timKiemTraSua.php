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
            <?php
            include("include/slide.php");
            ?>
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
                            if(isset($_GET['tukhoa'])){
                                $tukhoa = $_GET['tukhoa'];
                                ?>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <a href="">
                                                <button type="button" style="width: 100%;" class="btn btn-light danhmuc_title">Kết quả tìm kiếm với từ khóa "<?php echo $tukhoa ?>"</button>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                        <div class="row">
                            <?php
                                if(isset($_GET['tukhoa'])){
                                    $tukhoa = $_GET['tukhoa'];
                                    $timkiem_trasua = $traSua->timkiem_trasua($tukhoa);
                                    if ($timkiem_trasua){
                                        while($resultTK_TS = $timkiem_trasua->fetch_assoc()){
                                            ?>
                                                    <div class="col-lg-6 col-sm-12 mx-auto mt-2 info_trasua">
                                                    <a href="chiTietTraSua.php?ma_trasua=<?php echo $resultTK_TS['ma_trasua'] ?>">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <img src="../admin/uploads/<?php echo $resultTK_TS['hinhanh_trasua'] ?>" style="width: 100%;">
                                                                <p class="text-center"><?php echo number_format($resultTK_TS['gia_trasua'], 0, ',', '.') . ' <sup>đ</sup>'   ?></p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="ten_nuoc"><?php echo $resultTK_TS['ten_trasua'] ?></p>
                                                                <p><?php echo $resultTK_TS['tomtat_trasua'] ?> </p>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <i class=" fas fa-solid fa-heart" style="color: #2e9b00; font-size: 18px;"></i>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <i class="fas fa-shopping-cart" style="color: #2e9b00; font-size: 18px;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                        </div>
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