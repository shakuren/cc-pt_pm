<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta name="author" content="hutech" />
	<link href="/store/css/style.css" rel="stylesheet" type="text/css">
	<link href ="/store/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<title>Website bán hàng</title>
</head>
<body>

	<div id="wrapper">

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #d9edf7; border: 5px">
            <div class="container-fluid">
							<div class="col-md-1">
							</div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="/store/index.php">Trang Chủ</a>
                    <a class="navbar-brand" href="/store/dangky.php"> Đăng Ký</a>
										<a class="navbar-brand" href="/store/dangnhap.php"> Đăng Nhập</a>
										<a class="navbar-brand" href="/store/admin.php">Quản Lý</a>
                </div>
								<div class="col-md-2">
								</div>
								<form class="navbar-form navbar-left">
									<div class="form-group">
										<input type="text" class="form-control" name="txttukhoa" placeholder="Nhập từ khóa...">
										<button type="submit" name="btn-timkiem" class="btn btn-info">Tìm Kiếm</button>
									</div>
								</form>

								<div >
									<?php
										session_start();
										if(isset($_SESSION['taikhoan'])!="")
										{
											echo "<ul style='margin-top: 15px;margin-left: 20px; font-weight: bold'>Xin chào: ".$_SESSION['taikhoan']."    <a href='/store/dangxuat.php' class='btn btn-danger btn-xs'>Đăng Xuất</a></ul>";
										}

									?>
								</div>
            </div>
    </nav>
		<div style="margin-top: 60px">
			<img src="/store/images/logo1.png" class="img-responsive"/>
		</div>
