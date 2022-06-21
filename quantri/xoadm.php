<?php
session_start();
include_once './connect.php';
$ma=$_GET['maloai'];
$sql="delete from loaisp where maloai='$ma'";
mysqli_query($link,$sql);
$_SESSION['flash_message'] = "Xóa thành công";
echo '<script>window.location="quantri.php?page_layout=dmsp"</script>';
?>