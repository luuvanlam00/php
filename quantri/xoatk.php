<?php
session_start();
include_once './connect.php';
$ma=$_GET['taikhoan'];
$sql="delete from nguoidung where taikhoan='$ma'";
mysqli_query($link,$sql);
$_SESSION['flash_message'] = "Xóa thành công";
echo '<script>window.location="quantri.php?page_layout=dstk"</script>';
?>