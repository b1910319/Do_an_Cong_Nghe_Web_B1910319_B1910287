<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once($filepath."/../helper/format.php");
?>
<?php
    class da{
        private $database ;
        private $format;
        public function __construct(){
            $this ->database = new database();
            $this ->format = new fomat();
        }
        public function insert_da($phantram_da){
            $phantram_da = $this->format->validation($phantram_da);
            $phantram_da = mysqli_real_escape_string($this->database->link, $phantram_da);
            $query = "INSERT INTO `da`(`phantram_da`) VALUES ('$phantram_da')";
            $result = $this->database->insert($query);
            return $result;
        }
        public function show_da (){
            $query = "SELECT * FROM `da`  ORDER BY ma_phantramda desc";
            $result = $this->database->select($query);
            return $result;
        }
        public function show_da_ma($ma_da){
            $query = "SELECT * FROM `da` WHERE ma_phantramda= '$ma_da'  LIMIT 1";
            $result = $this->database->select($query);
            return $result;
        }
        public function update_da($phantram_da, $ma_da){
            $phantram_da = $this->format->validation($phantram_da);
            // kết nối với CSDL 
            $phantram_da = mysqli_real_escape_string($this->database->link, $phantram_da);
            $ma_da = mysqli_real_escape_string($this->database->link, $ma_da);
            $query = "UPDATE `da` SET `phantram_da`='$phantram_da' WHERE ma_phantramda = '$ma_da'";
            $result = $this->database->update($query);
            if($result  != NULL){
                $alert = '<span style="color: #038018; font-weight: bold;">Phần trăm đá được sửa thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Phần trăm đá sửa không thành công</span>';
                return $alert;
            }
        }
        public function delete_da($maXoa){
            $query = "DELETE FROM `da` WHERE ma_phantramda = '$maXoa'";
            $result = $this->database->delete($query);
            if($result  != NULL){
                $alert = '<span style="color: #038018; font-weight: bold;">Phần trăm đá được xóa thành công</span>';
                return $alert;
            } else{
                $alert = '<span style="color: #eb3007; font-weight: bold;">Phần trăm đá xóa không thành công</span>';
                return $alert;
            }
        }
        public function timkiem_da($tukhoa){
            $query = "SELECT * FROM `da` WHERE phantram_da LIKE '%".$tukhoa."%' ";
            $result = $this ->database->select($query);
            return $result;
        }
    }
?>