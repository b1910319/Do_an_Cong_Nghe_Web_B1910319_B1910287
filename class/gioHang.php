<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
?>
<?php
    class gioHang{
        private $database ;
        private $format;
        public function __construct(){
            $this ->database = new database();
            $this ->format = new fomat();
        }
        public function insert_giohang($data){
            $ma_trasua = mysqli_real_escape_string($this->database->link, $data['ma_trasua']);
            $ma_phantramduong = mysqli_real_escape_string($this->database->link, $data['ma_phantramduong']);
            $ma_phantramda = mysqli_real_escape_string($this->database->link, $data['ma_phantramda']);
            $ma_nguoidung = mysqli_real_escape_string($this->database->link, $data['ma_nguoidung']);
            $soluong_dat = mysqli_real_escape_string($this->database->link, $data['soluong_dat']);
            $query = "INSERT INTO `giohang`(`ma_trasua`, `ma_phantramda`, 
            `ma_phamtramduong`, `ma_nguoidung`, `soluong_dat`) 
            VALUES ('$ma_trasua','$ma_phantramda','$ma_phantramduong',
            '$ma_nguoidung','$soluong_dat')";
            $result = $this->database->insert($query);
            return $result;
        }
        public function show_giohang ($ma_nguoidung){
            $query = "SELECT * FROM `giohang` where ma_nguoidung = '$ma_nguoidung' AND tinhtrang_giohang = '0' ORDER BY ma_giohang desc";
            $result = $this->database->select($query);
            return $result;
        }
        public function show_all_giohang (){
            $query = "SELECT * FROM `giohang` where tinhtrang_giohang = '0' ORDER BY ma_giohang desc";
            $result = $this->database->select($query);
            return $result;
        }
        public function show_giohang_ma ($ma_giohang){
            $query = "SELECT * FROM `giohang` where ma_giohang = '$ma_giohang' AND tinhtrang_giohang = '1' ";
            $result = $this->database->select($query);
            return $result;
        }
        public function update_giohang($soluong_dat, $ma_giohang){
            $soluong_dat = mysqli_real_escape_string($this->database->link, $soluong_dat);
            $ma_giohang = mysqli_real_escape_string($this->database->link, $ma_giohang);
            $query = "UPDATE `giohang` SET `soluong_dat`='$soluong_dat' WHERE ma_giohang = '$ma_giohang'";
            $result = $this->database->update($query);
            if($result  != NULL){
                $alert = '<span style="color: #038018; font-weight: bold;">Số lượng được cập nhật thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Số lượng cập nhật không thành công</span>';
                return $alert;
            }
        }
        public function delete_giohang_ma($ma_giohang){
            $query = "DELETE FROM `giohang` WHERE ma_giohang = '$ma_giohang'";
            $result = $this->database->delete($query);
        }

    }
?>