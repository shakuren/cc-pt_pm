<?php
include_once("layout/ad_header.php");
?>
<?php
require_once("loaisp.class.php");
?>
<?php
$cates = LoaiSP::ds_loaisp();
?>
<div class="container">
  <h2 style="color: blue">Danh Sách Loại Sản Phẩm</h2>
  <p><a href="/store/them_loaisp.php" class="btn btn-success btn-sm">Thêm Mới</a></p>
  <table class="table table-bordered">
    <thead>
      <tr style="color: red">
        <th>Mã NSX</th>
        <th>Tên NSX</th>
        <th>Thao Tác</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
          foreach ($cates as $item){
          ?>
        <td><?php echo $item["MALOAI"];?></td>
        <td><?php echo $item["TENLOAI"];?></td>
        <td><a href="/store/sua_loaisp.php" class="btn btn-primary btn-xs">Sửa</a>
          <a href="/store/xoa_loaisp.php" class="btn btn-danger btn-xs">Xóa</a>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>


</div>
