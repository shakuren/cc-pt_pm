<?php
	require_once("sanpham.class.php");
	require_once("nsx.class.php");
  require_once("loaisp.class.php");
include_once("layout/ad_header.php");


	if(isset($_POST["btnsubmit"]))
	{
		$tensp = $_POST["txttensp"];
		$maloai = $_POST["txtloaisp"];
    $mansx = $_POST["txtnsx"];
		$giaban = $_POST["txtgia"];
		$slton = $_POST["txtsl"];
		$mota = $_POST["txtmota"];
		$hinhanh = $_FILES["txthinh"];
    $ngaycapnhat = $_POST["txtngaycn"];
		$spmoi = new Sanpham($tensp, $maloai,$mansx, $slton, $giaban, $mota, $hinhanh,$ngaycapnhat);
		$result =  $spmoi -> save();

		if(!$result)
		{
			header("Location: them_sp.php?failure");
		}
		else
		{
			header("Location: them_sp.php?inserted");
		}
	}
?>
<?php
	if(isset($_GET["inserted"]))
	{
    ?>
    <script>alert('Thêm sản phẩm thành công !');</script>
    <?php
    	header("Location: ds_sanpham.php");
	}
?>
<h3 style="color: blue">Thêm Sản Phẩm</h3>
<form method="post" class="form-horizontal" style="margin-left :30%" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<div class="lbltitle">
			<label>Tên sản phẩm</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txttensp" value="<?php echo isset($_POST["txttensp"]) ? $_POST["txttensp"] : ""; ?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="lbltitle">
			<label>Mô tả</label>
		</div>
		<div class="lblinput">
			<textarea type="text" style="width: 18%" name="txtmota" value="<?php echo isset($_POST["txtmota"]) ? $_POST["txtmota"] : ""; ?>" ></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="lbltitle">
			<label>Số lượng</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtsl" value="<?php echo isset($_POST["txtsl"]) ? $_POST["txtsl"] : ""; ?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="lbltitle">
			<label>Giá bán</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtgia" value="<?php echo isset($_POST["txtgia"]) ? $_POST["txtgia"] : ""; ?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="lbltitle">
			<label>Loại sản phẩm</label>
		</div>
		<div class="lblinput">
            <select name="txtloaisp">
                <option value="" selected>--Chọn loại--</option>
								<?php
                        $cates = LoaiSP::ds_loaisp();
                        foreach ($cates as $item){
                            echo "<option value=".$item["MALOAI"].">".$item["TENLOAI"]."</option>";
                        }
                ?>
            </select>
		</div>
	</div>
  <div class="form-group">
		<div class="lbltitle">
			<label>Nhà Sản Xuất</label>
		</div>
		<div class="lblinput">
            <select name="txtnsx">
                <option value="" selected>--Chọn loại--</option>
								<?php
                        $nsxs = $nsxs = NSX::ds_nsx();
                        foreach ($nsxs as $item){
                            echo "<option value=".$item["MANSX"].">".$item["TENNSX"]."</option>";
                        }
                ?>
            </select>
		</div>
	</div>
	<div class="form-group">
		<div class="lbltitle">
			<label>Hình ảnh</label>
		</div>
		<div class="lblinput">
			<input type="file" id="txthinh" name="txthinh" accept=".PNG,.GIF,.JPG" />
		</div>
	</div>
  <div class="form-group">
    <div class="lbltitle">
      <label>Ngày Cập Nhật</label>
    </div>
    <div class="lblinput">
      <input type="date" name="txtngaycn" value="<?php echo isset($_POST["txtngaycn"]) ? $_POST["txtngaycn"] : ""; ?>" />
    </div>
  </div>
	<div class="form-group">
		<div class="submit">
			<input type="submit" class="btn btn-success" name="btnsubmit" value="Thêm" />
		</div>
	</div>
</form>
