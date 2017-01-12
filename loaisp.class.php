<?php //IDEA
require_once("config/db.class.php");

class LoaiSP
{
    public $maloai;
    public $tenloai;

    public function __construct($cate_name) {
        $this->categoryName = $cate_name;

    }
    public static function ds_loaisp(){
        $db = new Db();
        $sql = "SELECT * FROM LOAISP";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public function save()
    {
      $db= new Db();
      $sql = "INSERT INTO LOAISP(TENLOAI) values('$this->tenloai')";
      $result = $db -> query_execute($sql);
      return $result;
    }
}
?>
