<?php
session_start();
include_once './connect.php';
$ma=$_GET['id_bl'];
$sql="delete from binhluan where id_bl='$ma'";
mysqli_query($link,$sql);
$_SESSION['flash_message'] = "Xóa thành công";
echo '<script>window.location="quantri.php?page_layout=binhluan"</script>';
?>