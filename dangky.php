<?php
include_once("layout/header.php");
?>
<?php
if(isset($_SESSION['taikhoan'])!="")
{
  header("Location: index.php");
}
require_once("taikhoan.class.php");
require_once("sanpham.class.php");
require_once("loaisp.class.php");
require_once("nsx.class.php");
if(isset($_POST['btn-dangky']))
{
  $ten_tk =$_POST['txttentk'];
  $mat_khau =$_POST['txtmatkhau'];
  $ho_ten =$_POST['txthoten'];
  $dc_email =$_POST['txtemail'];
  $dia_chi =$_POST['txtdc'];
  $dien_thoai =$_POST['txtsdt'];
  $tk = new Taikhoan($ten_tk,$mat_khau,$ho_ten,$dc_email,$dia_chi,$dien_thoai);
  $result =$tk->save();
  if(!$result)
  {
    ?>
    <script>alert('Có lỗi xảy ra, vui lòng kiểm tra dữ liệu !');</script>
    <?php
  }
  else{
    $_SESSION['taikhoan']=$ten_tk;
    header("Location: index.php");
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
      <h3 class="panel-heading">Đăng Ký Tài Khoản</h3><br>
      <form method="post" class="form-horizontal" style="width:30%; text-align: left; margin-left: 38%">
        <div class="form-group row">
          <label for="txttentk" class="col-sm-6 form-control-label">Tên Tài Khoản</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="txttentk" placeholder="Tên tài khoản"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="txtmatkhau" class="col-sm-6 form-control-label">Mật Khẩu</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="txtmatkhau" placeholder="Mật khẩu"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="txthoten" class="col-sm-6 form-control-label">Họ Và Tên</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="txthoten" placeholder="Họ tên"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="txtemail" class="col-sm-6 form-control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="txtemail" placeholder="Email"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="txtdc" class="col-sm-6 form-control-label">Địa Chỉ</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="txtdc" placeholder="Địa chỉ"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="txtsdt" class="col-sm-6 form-control-label">Điện Thoại</label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" name="txtsdt" placeholder="Điện thoại"/>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="btn-dangky" class="btn btn-primary" value="Đăng Ký" />
          </div>
        </div>
      </form>
    </div>
</div>
<?php
include_once("layout/footer.php");
?>
