<?php //IDEA:
require_once("config/db.class.php");


class Sanpham
{
	public $masp;
	public $tensp;
	public $maloai;
  public $mansx;
	public $giaban;
	public $slton;
	public $mota;
	public $hinhanh;
  public $ngaycapnhat;

	public function __construct($ten_sp, $ma_loai, $ma_nsx, $sl_ton, $gia, $mo_ta, $hinhanh,$ngay_cn)
	{
		$this ->tensp = $ten_sp;
		$this ->maloai =$ma_loai;
		$this ->mansx= $ma_nsx;
		$this ->slton= $sl_ton;
		$this ->giaban = $gia;
		$this ->mota =$mo_ta;
    $this ->hinhanh =$hinhanh;
    $this ->ngaycapnhat =$ngay_cn;
	}

	public function save()
	{
		$file_temp = $this->hinhanh['tmp_name'];
    $user_file = $this->hinhanh['name'];
    $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
    $filepath = "images/".$timestamp.$user_file;
    if(move_uploaded_file($file_temp,$filepath)==false)
  	{
    	return false;
    }

		$db= new Db();
		$sql = "INSERT INTO SANPHAM(TENSP,GIABAN , MOTA, HINHANH, SLTON, NGAYCAPNHAT, MALOAI, MANSX) values('$this->tensp','$this->giaban','$this->mota','$filepath','$this->slton','$this->ngaycapnhat','$this->maloai','$this->mansx')";
		$result = $db -> query_execute($sql);
		return $result;
	}

	public static function ds_sanpham()
	{
		$db = new Db();
		$sql = "SELECT * FROM SANPHAM ORDER BY NGAYCAPNHAT DESC";
		$result = $db -> select_to_array($sql);
		return $result;
	}
	//Lấy ds theo loại sp
	public static function ds_sanpham_theoloai($maloai)
	{
		$db = new Db();
		$sql = "SELECT * FROM SANPHAM WHERE MALOAI ='$maloai'";
		$result = $db -> select_to_array($sql);
		return $result;
	}
	public static function ds_sanpham_theonsx($mansx)
	{
		$db = new Db();
		$sql = "SELECT * FROM SANPHAM WHERE MANSX ='$mansx'";
		$result = $db -> select_to_array($sql);
		return $result;
	}
	public static function chitiet_sp($masp)
	{
		$db = new Db();
		$sql = "SELECT * FROM SANPHAM WHERE MASP ='$masp'";
		$result = $db -> select_to_array($sql);
		return $result;
	}
	public static function sanpham_lienquan($maloai,$masp)
	{
		$db = new Db();
		$sql = "SELECT * FROM SANPHAM WHERE MALOAI ='$maloai' and MASP !='$masp'";
		$result = $db -> select_to_array($sql);
		return $result;
	}
	public static function xoa_sanpham($masp)
	{
		$db = new Db();
		$sql = "DELETE FROM SANPHAM WHERE MASP='$masp'";
		$result = $db -> query_execute($sql);
		return $result;
	}

}


?>
