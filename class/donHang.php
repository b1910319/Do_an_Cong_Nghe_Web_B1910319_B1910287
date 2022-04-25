<?php
use Carbon\Carbon;

    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
    include_once($filepath."/../lib/Carbon-2.57.0/autoload.php");
    include_once("traSua.php");
?>
<?php
    class donHang{
        private $database ;
        private $format;
        private $traSua;
        public function __construct()
        {
            $this ->database = new database();
            $this ->format = new fomat();
            $this->traSua = new traSua();
        }
        public function insert_donhang($login_ma, $ghichu_nguoidung){
            $date_now = Carbon::now('Asia/Ho_Chi_Minh');
            $ngay_thongke = $date_now->toDateString();
            $nam_thongke = Carbon::now()->year;
            // $nam_thongke = $date_now->year;
            $ghichu_nguoidung = mysqli_real_escape_string($this->database->link, $ghichu_nguoidung);
            $queryGH = "SELECT * FROM `giohang` WHERE 	ma_nguoidung = '$login_ma' AND tinhtrang_giohang = '0' ORDER BY ma_giohang desc";
            $lay_GH= $this ->database->select($queryGH);
            if ($lay_GH){
                while($resultGH  = $lay_GH->fetch_assoc()){
                    $ma_giohang = $resultGH['ma_giohang'];
                    $show_trasua_ma = $this->traSua->show_trasua_ma($resultGH['ma_trasua']);
                    if($show_trasua_ma){
                        $resultTS_M = $show_trasua_ma->fetch_assoc();
                    }
                    $tongtien_donhang = $resultTS_M['gia_trasua'] * $resultGH['soluong_dat'];
                    $query_insertDH = "INSERT INTO `donhang`(`ma_giohang`, `tongtien_donhang`, `ghichu_nguoidung`, `thoigian_dathang`) 
                    VALUES ('$ma_giohang','$tongtien_donhang','$ghichu_nguoidung',
                    '$date_now')";
                    $result_insertDH = $this->database->insert($query_insertDH);
                    $query_updateGH = "UPDATE `giohang` SET `tinhtrang_giohang`='1' WHERE ma_giohang = '$ma_giohang'";
                    $result_updateGH = $this->database->update($query_updateGH);
                    $queryTK = "SELECT * FROM `thongke` WHERE ngay_thongke ='$ngay_thongke'";
                    $resultTK = $this->database->select($queryTK);
                    if($resultTK){
                        $ketqua = $resultTK->fetch_assoc();
                        $tongtien = $ketqua['tongtien_thongke'];
                        $tongtien_update = $tongtien + $tongtien_donhang;
                        $query_updateTK = "UPDATE `thongke` SET `tongtien_thongke`='$tongtien_update' WHERE  ngay_thongke ='$ngay_thongke' ";
                        $result_updateTK = $this->database->update($query_updateTK);
                    } else{
                        $query_insertTK = "INSERT INTO `thongke`( `tongtien_thongke`, `ngay_thongke`, `nam_thongke`) 
                        VALUES ('$tongtien_donhang','$ngay_thongke','$nam_thongke')";
                        $result_insertTK = $this->database->insert($query_insertTK);
                    }
                }
                header("location:index.php");
            }
            
            
        }
        public function show_donhang_ma_thoigian($ma_nguoidung){
            $queryDH = "SELECT DISTINCT thoigian_dathang, tintrang_donhang 
            FROM donhang inner join giohang on donhang.ma_giohang = giohang.ma_giohang 
                                        inner join nguoidung on giohang.ma_nguoidung = nguoidung.ma_nguoidung 
            WHERE giohang.ma_nguoidung ='$ma_nguoidung'  order by donhang.thoigian_dathang desc";
            $resultDH = $this ->database->select($queryDH);
            return $resultDH;
        }
        public function showall_donhang_ma_thoigian(){
            $queryDH = "SELECT DISTINCT thoigian_dathang, tintrang_donhang, nguoidung.ma_nguoidung, nguoidung.user_nguoidung
            FROM donhang inner join giohang on donhang.ma_giohang = giohang.ma_giohang 
                                        inner join nguoidung on giohang.ma_nguoidung = nguoidung.ma_nguoidung 
            order by donhang.thoigian_dathang desc";
            $resultDH = $this ->database->select($queryDH);
            return $resultDH;
        }
        public function show_chitiet_donhang_thoigian($ma_nguoidung, $thoigian_dathang){
            $queryDH = "SELECT donhang.ma_giohang , tintrang_donhang
            FROM  donhang inner join giohang on donhang.ma_giohang = giohang.ma_giohang 
                                    inner join nguoidung on giohang.ma_nguoidung = nguoidung.ma_nguoidung 
            WHERE giohang.ma_nguoidung ='$ma_nguoidung' AND donhang.thoigian_dathang = '$thoigian_dathang'";
            $resultDH = $this ->database->select($queryDH);
            return $resultDH;
        }
        public function showall_chitiet_donhang_thoigian($ma_nguoidung, $thoigian_dathang){
            $queryDH = "SELECT donhang.ma_giohang , tintrang_donhang, ma_donhang, donhang.thoigian_dathang
            FROM  donhang inner join giohang on donhang.ma_giohang = giohang.ma_giohang 
                                    inner join nguoidung on giohang.ma_nguoidung = nguoidung.ma_nguoidung 
            WHERE giohang.ma_nguoidung ='$ma_nguoidung' AND donhang.thoigian_dathang = '$thoigian_dathang'";
            $resultDH = $this ->database->select($queryDH);
            return $resultDH;
        }
        public function update_tinhtrang_donhang($maDH, $thoigian){
            $maDH = mysqli_real_escape_string($this->database->link, $maDH);
            $thoigian = mysqli_real_escape_string($this->database->link, $thoigian);
            $query = "UPDATE `donhang` SET `tintrang_donhang`='1' WHERE ma_donhang = '$maDH' AND thoigian_dathang = '$thoigian' AND tintrang_donhang = '0'";
            $result = $this->database->update($query);
        }
    }
?>