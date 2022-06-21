<?php
session_start();
include_once './connect.php';
$ma=$_GET['masp'];
$sql="delete from sanpham where masp='$ma'";
mysqli_query($link,$sql);
$_SESSION['flash_message'] = "Xóa thành công";
echo '<script>window.location="quantri.php?page_layout=sanpham"</script>';
?>