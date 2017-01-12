<?php
include_once("layout/header.php");
?>
<?php
require_once("taikhoan.class.php");
require_once("sanpham.class.php");
require_once("loaisp.class.php");
require_once("nsx.class.php");
if(isset($_POST['btn-dangnhap']))
{
  $tentk =$_POST['txttentk'];
  $matkhau =$_POST['txtmatkhau'];
  $tk = Taikhoan::kt_dangnhap($tentk,$matkhau);
  if($tk){
    $_SESSION['taikhoan']=$tentk;
    header("Location: index.php");
  }
  else{
    ?>
    <script>alert('Tên tài khoản hoặc mật khẩu không đúng !');</script>
    <?php
  }
}
if(!isset($_GET["maloai"])){
	$sp = Sanpham::ds_sanpham();
}
else {
	$maloai = $_GET["maloai"];
	$prods = Sanpham::ds_sanpham_theoloai($maloai);
}


if(!isset($_GET["mansx"])){
	$sp = Sanpham::ds_sanpham();
}
else {
	$mansx = $_GET["mansx"];
	$pro = Sanpham::ds_sanpham_theonsx($mansx);
}
$cates = LoaiSP::ds_loaisp();
$nsxs = NSX::ds_nsx();
 ?>
 <div class="container text-center">
 	<div class="col-sm-3 panel panel-info">
 		<h3 class="panel-heading">Danh Mục</h3>
 		<ul class="list-group">
 			<?php
 			foreach ($cates as $item) {
 				echo "<li class='list-group-item'><a href=/store/index.php?maloai=".$item["MALOAI"].">".$item["TENLOAI"]."</a></li>";
 			}
 			?>
 		</ul>
 		<h3 class="panel-heading">Nhà Sản Xuất</h3>
 		<ul class="list-group">
 			<?php
 			foreach ($nsxs as $item) {
 				echo "<li class='list-group-item'><a href=/store/index.php?mansx=".$item["MANSX"].">".$item["TENNSX"]."</a></li>";
 			}
 			?>
 		</ul>
 	</div>
     <div class="col-sm-9 panel panel-info">
       <h3 class="panel-heading">Đăng Nhập</h3><br>
       <form method="post" class="form-horizontal" style="margin-left: 30%">
  <div class="form-group">
    <label for="txttentk" class="col-sm-2 control-label">Tài Khoản</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="txttentk" value="<?php echo isset($_POST["txttentk"]) ? $_POST["txttentk"] : ""; ?>" placeholder="Tên tài khoản">
    </div>
  </div>
  <div class="form-group">
    <label for="txtmatkhau" class="col-sm-2 control-label">Mật Khẩu</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" name="txtmatkhau" value="<?php echo isset($_POST["txtmatkhau"]) ? $_POST["txtmatkhau"] : ""; ?>" placeholder="Mật khẩu">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="checkboxError"> Ghi Nhớ
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="btn-dangnhap" class="btn btn-success">Đăng Nhập</button>
    </div>
  </div>
</form>
     </div>
