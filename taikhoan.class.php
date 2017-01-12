<?php //IDEA:
require_once("config/db.class.php");

class Taikhoan
{
  public $tentk;
  public $matkhau;
  public $hoten;
  public $email;
  public $diachi;
  public $sdt;

  public function __construct($ten_tk,$mat_khau,$ho_ten,$dc_email,$dia_chi,$dien_thoai)
  {
    $this->tentk = $ten_tk;
    $this->matkhau = $mat_khau;
    $this->hoten = $ho_ten;
    $this->email = $dc_email;
    $this->diachi = $dia_chi;
    $this->sdt = $dien_thoai;
  }
  public static function ds_taikhoan()
	{
		$db = new Db();
		$sql = "SELECT * FROM TAIKHOAN";
		$result = $db -> select_to_array($sql);
		return $result;
	}
  public function save()
  {
    $db = new Db();
    $sql ="INSERT INTO TAIKHOAN(TENTK, MATKHAU, HOTEN, EMAIL, DIACHI, SDT) VALUES('".mysqli_real_escape_string($db->connect(),$this->tentk)."','".md5(mysqli_real_escape_string($db->connect(),$this->matkhau))."','".mysqli_real_escape_string($db->connect(),$this->hoten)."','".mysqli_real_escape_string($db->connect(),$this->email)."',
    '".mysqli_real_escape_string($db->connect(),$this->diachi)."','".mysqli_real_escape_string($db->connect(),$this->sdt)."')";
    $result = $db->query_execute($sql);
		return $result;
  }

  public static function kt_dangnhap($tentk,$matkhau)
  {
    $matkhau=md5($matkhau);
    $db = new Db();
    $sql= "SELECT * FROM TAIKHOAN WHERE TENTK='$tentk' AND MATKHAU='$matkhau'";
    $result = $db->select_to_array($sql);
		return $result;
  }

}



?>
