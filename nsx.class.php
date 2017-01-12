<?php //IDEA
require_once("config/db.class.php");

class NSX
{
    public $mansx;
    public $tennsx;
    public $diachi;
    public $dienthoai;
    public function __construct($ten_nsx,$dia_chi,$dien_thoai) {
        $this->tennsx = $ten_nsx;
        $this->diachi = $dia_chi;
        $this->dienthoai = $dien_thoai;
    }
    public static function ds_nsx(){
        $db = new Db();
        $sql = "SELECT * FROM NSX";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public function save()
  	{	$db= new Db();
  		$sql = "INSERT INTO NSX(TENNSX,DIACHI ,SDT) values('$this->tennsx','$this->diachi','$this->dienthoai')";
  		$result = $db -> query_execute($sql);
  		return $result;
    }
    public function sua_nsx($mansx,$tennsx,$diachi,$dienthoai)
  	{	$db= new Db();
  		$sql="UPDATE NSX SET TENNSX='$tennsx',DIACHI='$diachi',SDT='$dienthoai' WHERE MANSX='$mansx'";
  		$result = $db -> query_execute($sql);
  		return $result;
    }
    public static function xoa_nsx($mansx)
  	{
  		$db = new Db();
  		$sql = "DELETE FROM NSX WHERE MANSX='$mansx'";
  		$result = $db -> query_execute($sql);
  		return $result;
  	}
}
?>
