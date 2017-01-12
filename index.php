<?php
include_once("layout/header.php");
?>
<?php
require_once("sanpham.class.php");
require_once("loaisp.class.php");
require_once("nsx.class.php");
?>
<?php

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
		<div>
			<p><img src="/store/images/banner3.jpg" class="img-responsive" style="margin-top: 80px"/></p>
			<p><img src="/store/images/banner.jpg" class="img-responsive" style="margin-top: 80px"/></p>
		</div>
	</div>

	<div class="col-sm-9 panel panel-info">
		<h3 class="panel-heading">Sản Phẩm Cửa Hàng</h3><br>
		<div class="row">
		<?php
		if(isset($_GET["maloai"])){
			foreach ($prods as $item){
			?>
			<div class="col-sm-3 hoverimage">
				<a class="text-danger" <a href=/store/chitiet_sp.php?masp=<?php echo $item["MASP"];?>><img src="<?php echo "/store/".$item["HINHANH"];?>" class="img-responsive" style="width: 200px; height: 210px" alt="Image"></a>
				<a class="text-danger" <a href=/store/chitiet_sp.php?masp=<?php echo $item["MASP"];?>><?php echo $item["TENSP"];?></a>
				<p class="text-info"><?php echo number_format($item["GIABAN"])." VNĐ";?></p>
				<p>
					<button type="button" class="btn btn-info" onclick="location.href='/store/shopping_cart.php?productid=<?php echo $item["MASP"]; ?>'">Mua hàng</button>
				</p>
			</div>
			<?php }}
		 ?>
		 <?php
	 		if(isset($_GET["mansx"])){
	 			foreach ($pro as $item){
	 			?>
				<div class="col-sm-3 hoverimage">
					<a class="text-danger" <a href=/store/chitiet_sp.php?masp=<?php echo $item["MASP"];?>><img src="<?php echo "/store/".$item["HINHANH"];?>" class="img-responsive" style="width: 200px; height: 210px" alt="Image"></a>
					<a class="text-danger" <a href=/store/chitiet_sp.php?masp=<?php echo $item["MASP"];?>><?php echo $item["TENSP"];?></a>
					<p class="text-info"><?php echo number_format($item["GIABAN"])." VNĐ";?></p>
					<p>
						<button type="button" class="btn btn-info" onclick="location.href='/store/shopping_cart.php?productid=<?php echo $item["MASP"]; ?>'">Mua hàng</button>
					</p>
				</div>
				<?php }}
			 ?>
		 <?php if(!isset($_GET["maloai"])&& !isset($_GET["mansx"])) {
			 foreach ($sp as $item){
			 ?>
			 <div class="col-sm-3 hoverimage">
				 <a class="text-danger" <a href=/store/chitiet_sp.php?masp=<?php echo $item["MASP"];?>><img src="<?php echo "/store/".$item["HINHANH"];?>" class="img-responsive" style="width: 200px; height: 210px" alt="Image"></a>
				 <a class="text-danger" <a href=/store/chitiet_sp.php?masp=<?php echo $item["MASP"];?>><?php echo $item["TENSP"];?></a>
				 <p class="text-info"><?php echo number_format($item["GIABAN"])." VNĐ";?></p>
 				<p>
					 <button type="button" class="btn btn-info" onclick="location.href='/store/shopping_cart.php?productid=<?php echo $item["MASP"]; ?>'">Mua hàng</button>
				 </p>
			 </div>
		 <?php }}
		 ?>
		</div>
	</div>

</div>
	<?php
	include_once("layout/footer.php");
	?>
