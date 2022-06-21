<?php
session_start();
include_once './connect.php';
$ma=$_GET['id_kh'];
$sql="delete from khachhang where id_kh='$ma'";
mysqli_query($link,$sql);
$_SESSION['flash_message'] = "Xóa thành công";
echo '<script>window.location="quantri.php?page_layout=khachhang"</script>';
?>