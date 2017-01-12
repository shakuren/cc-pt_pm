<?php
	require_once("loaisp.class.php");
include_once("layout/ad_header.php");


	if(isset($_POST["btnsubmit"]))
	{
		$tenloai = $_POST["txttenloai"];
		$lspmoi = new LoaiSP($tenloai);
		$result =  $lspmoi ->save();
		if(!$result)
		{
			header("Location: them_loaisp.php?failure");
		}
		else
		{
			header("Location: them_loaisp.php?inserted");
		}
	}
?>
<?php
	if(isset($_GET["inserted"]))
	{
    ?>
    <script>alert('Thêm thành công !');</script>
    <?php
    	header("Location: ds_loaisp.php");
	}
?>
<h3 style="color: blue">Thêm Loại Sản Phẩm</h3>
<form method="post" class="form-horizontal" style="margin-left :30%" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<div class="lbltitle">
			<label>Tên Loại</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txttenloai" value="<?php echo isset($_POST["txttenloai"]) ? $_POST["txttenloai"] : ""; ?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="submit">
			<input type="submit" class="btn btn-success" name="btnsubmit" value="Thêm" />
		</div>
	</div>
</form>
