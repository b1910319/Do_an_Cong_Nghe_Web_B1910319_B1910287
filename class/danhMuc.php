<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
?>
<?php
    class danhMuc{
        private $database ;
        private $format;
        public function __construct(){
            $this ->database = new database();
            $this ->format = new fomat();
        }
        public function insert_danhmuc($ten_danhmuc){
            $ten_danhmuc = $this->format->validation($ten_danhmuc);
            $ten_danhmuc = mysqli_real_escape_string($this->database->link, $ten_danhmuc);
            $query = "INSERT INTO `danhmuc_trasua`(`ten_danhmuc`) VALUES ('$ten_danhmuc')";
            $result = $this->database->insert($query);
            return $result;
        }
        public function show_danhmuc (){
            $query = "SELECT * FROM `danhmuc_trasua`  ORDER BY ma_danhmuc desc";
            $result = $this->database->select($query);
            return $result;
        }
        public function show_danhmuc_ma($ma_danhmuc){
            $query = "SELECT * FROM `danhmuc_trasua` WHERE ma_danhmuc = '$ma_danhmuc'  LIMIT 1";
            $result = $this->database->select($query);
            return $result;
        }
        public function update_danhmuc($ten_danhmuc, $ma_danhmuc){
            $ten_danhmuc = $this->format->validation($ten_danhmuc);
            $ten_danhmuc = mysqli_real_escape_string($this->database->link, $ten_danhmuc);
            $ma_danhmuc = mysqli_real_escape_string($this->database->link, $ma_danhmuc);
            $query = "UPDATE `danhmuc_trasua` SET `ten_danhmuc`='$ten_danhmuc' WHERE ma_danhmuc = '$ma_danhmuc'";
            $result = $this->database->update($query);
            if($result  != NULL){
                $alert = '<span style="color: #038018; font-weight: bold;">Thông tin danh mục được sửa thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Thông tin loại danh mục sửa không thành công</span>';
                return $alert;
            }
        }
        public function delete_danhmuc($maXoa){
            $query = "DELETE FROM `danhmuc_trasua` WHERE ma_danhmuc = '$maXoa'";
            $result = $this->database->delete($query);
            if($result  != NULL){
                $alert = '<span style="color: #038018; font-weight: bold;">Danh mục được xóa thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Danh mục xóa không thành công</span>';
                return $alert;
            }
        }
        public function timkiem_danhmuc($tukhoa){
            $query = "SELECT * FROM `danhmuc_trasua` WHERE ten_danhmuc LIKE '%".$tukhoa."%' ";
            $result = $this ->database->select($query);
            return $result;
        }
    }
?>