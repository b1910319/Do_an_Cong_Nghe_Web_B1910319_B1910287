<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
?>
<?php
    class duong{
        private $database ;
        private $format;
        public function __construct(){
            $this ->database = new database();
            $this ->format = new fomat();
        }
        public function insert_duong($phantram_duong){
            $phantram_duong = $this->format->validation($phantram_duong);
            $phantram_duong = mysqli_real_escape_string($this->database->link, $phantram_duong);
            $query = "INSERT INTO `duong`(`phantram_duong`) VALUES ('$phantram_duong')";
            $result = $this->database->insert($query);
            return $result;
        }
        public function show_duong (){
            $query = "SELECT * FROM `duong`  ORDER BY ma_phantramduong desc";
            $result = $this->database->select($query);
            return $result;
        }
        public function show_duong_ma($ma_duong){
            $query = "SELECT * FROM `duong` WHERE ma_phantramduong= '$ma_duong'  LIMIT 1";
            $result = $this->database->select($query);
            return $result;
        }
        public function update_duong($phantram_duong, $ma_duong){
            $phantram_duong = $this->format->validation($phantram_duong);
            // kết nối với CSDL 
            $phantram_duong = mysqli_real_escape_string($this->database->link, $phantram_duong);
            $ma_duong = mysqli_real_escape_string($this->database->link, $ma_duong);
            $query = "UPDATE `duong` SET `phantram_duong`='$phantram_duong' WHERE ma_phantramduong = '$ma_duong'";
            $result = $this->database->update($query);
            if($result  != NULL){
                $alert = '<span style="color: #038018; font-weight: bold;">Phần trăm đường được sửa thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Phần trăm đường sửa không thành công</span>';
                return $alert;
            }
        }
        public function delete_duong($maXoa){
            $query = "DELETE FROM `duong` WHERE ma_phantramduong = '$maXoa'";
            $result = $this->database->delete($query);
            if($result  != NULL){
                $alert = '<span style="color: #038018; font-weight: bold;">Phần trăm đường được xóa thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Phần trăm đường xóa không thành công</span>';
                return $alert;
            }
        }
        public function timkiem_duong($tukhoa){
            $query = "SELECT * FROM `duong` WHERE phantram_duong LIKE '%".$tukhoa."%' ";
            $result = $this ->database->select($query);
            return $result;
        }
    }
?>