<?php
require_once("nsx.class.php");
if(isset($_GET["mansx"])){
  $mansx = $_GET["mansx"];
	$result = NSX::xoa_nsx($mansx);
  if($result)
  {
  ?>
    <script language="javascript">
    window.alert("Bạn đã xóa thành công !");
    window.location="ds_nsx.php";
    </script>
  <?php
  }
  else
  {
  ?>
    <script >
    window.alert("Bạn chưa xóa được !");
    window.location="ds_nsx.php";
    </script>
  <?php
  }
}
?>
