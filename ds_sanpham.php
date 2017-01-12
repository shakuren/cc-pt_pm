<?php
include_once("layout/ad_header.php");
?>
<?php
require_once("sanpham.class.php");
?>
<?php
$sp = Sanpham::ds_sanpham();
?>
<div class="container">
  <h2 style="color: blue">Danh Sách Sản Phẩm</h2>
  <p><a href="/store/them_sp.php" class="btn btn-success btn-sm">Thêm Mới</a></p>
  <table class="table table-bordered">
    <thead>
      <tr style="color: red">
        <th>Tên Sản Phẩm</th>
        <th>Mô Tả</th>
        <th>Hình Ảnh</th>
        <th>Ngày Cập Nhật</th>
        <th>Giá Bán</th>
        <th>Số Lượng Tồn</th>
        <th>Thao Tác</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
          foreach ($sp as $item){
          ?>
        <td><?php echo $item["TENSP"];?></td>
        <td><?php echo $item["MOTA"];?></td>
        <td><img src="<?php echo "/store/".$item["HINHANH"];?>" class="img-responsive" style="width: 110px; height: 40px" alt="Image"></td>
        <td><?php echo $item["NGAYCAPNHAT"];?></td>
        <td><?php echo number_format($item["GIABAN"])." VNĐ";?></td>
        <td><?php echo $item["SLTON"];?></td>
        <td>  <?php
          echo "<a class='btn btn-primary btn-xs' href=/store/sua_sp.php?masp=".$item["MASP"].">Sửa</a>";
          echo "<a class='btn btn-danger btn-xs' href=/store/xoa_sp.php?masp=".$item["MASP"].">Xóa</a>";
          ?>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>


</div>
