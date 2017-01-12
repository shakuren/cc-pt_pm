<?php
	require_once("nsx.class.php");
include_once("layout/ad_header.php");


	if(isset($_POST["btnsubmit"]))
	{
		$tennsx = $_POST["txttennsx"];
		$diachi = $_POST["txtdc"];
    $dienthoai = $_POST["txtsdt"];
		$nsxmoi = new NSX($tennsx, $diachi,$dienthoai);

		$result =  $nsxmoi -> save();

		if(!$result)
		{
			header("Location: them_nsx.php?failure");
		}
		else
		{
			header("Location: them_nsx.php?inserted");
		}
	}
?>
<?php
	if(isset($_GET["inserted"]))
	{
    ?>
    <script>alert('Thêm thành công !');</script>
    <?php
    	header("Location: ds_nsx.php");
	}
?>
<h3 style="color: blue">Thêm Nhà Sản Xuất</h3>
<form method="post" class="form-horizontal" style="margin-left :30%" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<div class="lbltitle">
			<label>Tên Nhà Sản Xuất</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txttennsx" value="<?php echo isset($_POST["txttennsx"]) ? $_POST["txttennsx"] : ""; ?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="lbltitle">
			<label>Địa Chỉ</label>
		</div>
		<div class="lblinput">
			<textarea type="text" style="width: 18%" name="txtdc" value="<?php echo isset($_POST["txtdc"]) ? $_POST["txtdc"] : ""; ?>" ></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="lbltitle">
			<label>Số Điện Thoại</label>
		</div>
		<div class="lblinput">
			<input type="tell" name="txtsdt" value="<?php echo isset($_POST["txtsdt"]) ? $_POST["txtsdt"] : ""; ?>" />
		</div>
	</div>
	<div class="form-group">
		<div class="submit">
			<input type="submit" class="btn btn-success" name="btnsubmit" value="Thêm" />
		</div>
	</div>
</form>
