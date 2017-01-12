<?php
require_once("sanpham.class.php");
if(isset($_GET["masp"])){
  $masp = $_GET["masp"];
	$result = Sanpham::xoa_sanpham($masp);
  if($result)
  {
  ?>
    <script>
    window.alert("Bạn đã xóa thành công !");
    window.location="ds_sanpham.php";
    </script>
  <?php
  }
  else
  {
  ?>
    <script>
    window.alert("Bạn chưa xóa được !");
    window.location="ds_sanpham.php";
    </script>
  <?php
  }
}
?>
