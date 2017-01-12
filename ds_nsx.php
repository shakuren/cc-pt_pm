<?php
include_once("layout/ad_header.php");
?>
<?php
require_once("nsx.class.php");
?>
<?php
$nsxs = NSX::ds_nsx();
?>
<div class="container">
  <h2 style="color: blue">Danh Sách Nhà Sản Xuất</h2>
  <p><a href="/store/them_nsx.php" class="btn btn-success btn-sm">Thêm Mới</a></p>
  <table class="table table-bordered">
    <thead>
      <tr style="color: red">
        <th>Mã NSX</th>
        <th>Tên NSX</th>
        <th>Địa Chỉ</th>
        <th>Số Điện Thoại</th>
        <th>Thao Tác</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
          foreach ($nsxs as $item){
          ?>
        <td><?php echo $item["MANSX"];?></td>
        <td><?php echo $item["TENNSX"];?></td>
        <td><?php echo $item["DIACHI"];?></td>
        <td><?php echo $item["SDT"];?></td>
        <td><?php
          echo "<a class='btn btn-primary btn-xs' href=/store/sua_nsx.php?mansx=".$item["MANSX"].">Sửa</a>";
          echo "<a class='btn btn-danger btn-xs' href=/store/xoa_nsx.php?mansx=".$item["MANSX"].">Xóa</a>";
          ?>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>


</div>
