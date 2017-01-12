<?php
  require_once("sanpham.class.php");
  require_once("loaisp.class.php");
  require_once("nsx.class.php");
?>
<?php
include_once("layout/header.php");
if(!isset($_GET["masp"]))
{
  header('Location: not_found.php');
}
else {
  $masp=$_GET["masp"];
  $sanpham = Sanpham::chitiet_sp($masp);
  $prod = reset($sanpham);
  $maloai = $prod["MALOAI"];
  $mansx= $prod["MANSX"];
  $sp_lienquan= Sanpham::sanpham_lienquan($maloai,$masp);
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
	<h3 class="panel-heading">Chi Tiết Sản Phẩm</h3><br>
	<div class="row">
			<div class="col-sm-3 hoverimage">
        <img src="<?php echo "/store/".$prod["HINHANH"];?>" class="img-responsive" style="width: 210px; height: 215px" alt="Image">
      </div>
      <div class="col-sm-6" style="text-align: left">
        <p class="text-danger" style="font-size: 25px"><?php echo $prod["TENSP"];?></p>
        <p class="text-info" style="font-size: 20px"><?php echo 'Giá: '.number_format($prod["GIABAN"])." VNĐ";?></p>
        <p class="text-success" style="font-size: 16px"><?php echo 'Mô Tả: '.$prod["MOTA"];?></p>

				<p>
					<button type="button" class="btn btn-info"  style="float: right" onclick="location.href='/lab3/shopping_cart.php?productid=<?php echo $item["ProductID"]; ?>'">Mua hàng</button>
				</p>

		</div>
	</div>
  <h3 class="panel-heading">Sản Phẩm Liên Quan</h3>
  <div class="row">
    <?php
		foreach ($sp_lienquan as $item){
			?>
			<div class="col-sm-3 hoverimage">
				<a class="text-danger" <a href=/store/chitiet_sp.php?masp=<?php echo $item["MASP"];?>><img src="<?php echo "/store/".$item["HINHANH"];?>" class="img-responsive" style="width: 210px; height: 215px" alt="Image"></a>
				<a class="text-danger" <a href=/store/chitiet_sp.php?masp=<?php echo $item["MASP"];?>><?php echo $item["TENSP"];?></a>
				<p class="text-info"><?php echo number_format($item["GIABAN"])." VNĐ";?></p>
				<p>
					<button type="button" class="btn btn-info" onclick="location.href='/lab3/shopping_cart.php?productid=<?php echo $item["ProductID"]; ?>'">Mua hàng</button>
				</p>
			</div>
			<?php } ?>
  </div>
  <?php
	include_once("layout/footer.php");
	?>
