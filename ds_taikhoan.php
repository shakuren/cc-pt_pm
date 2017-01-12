<?php
include_once("layout/ad_header.php");
?>
<?php
require_once("taikhoan.class.php");
?>
<?php
$taikhoan = Taikhoan::ds_taikhoan();
?>
<div class="container">
  <h2 style="color: blue">Danh Sách Tài Khoản</h2>
  <table class="table table-bordered">
    <thead>
      <tr style="color: red">
        <th>Tên Tài Khoản</th>
        <th>Mật Khẩu</th>
        <th>Họ Tên</th>
        <th>Email</th>
        <th>Địa Chỉ</th>
        <th>Điện Thoại</th>
        <th>Thao Tác</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
          foreach ($taikhoan as $item){
          ?>
        <td><?php echo $item["TENTK"];?></td>
        <td><?php echo $item["MATKHAU"];?></td>
        <td><?php echo $item["HOTEN"];?></td>
        <td><?php echo $item["EMAIL"];?></td>
        <td><?php echo $item["DIACHI"];?></td>
        <td><?php echo $item["SDT"];?></td>
        <td><a href="/store/sua_tk.php" class="btn btn-primary btn-xs">Sửa</a>
          <a href="/store/xoa_tk.php" class="btn btn-danger btn-xs">Xóa</a>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>


</div>
