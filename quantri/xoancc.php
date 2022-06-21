<?php
session_start();
include_once './connect.php';
$ma=$_GET['mancc'];
$sql="delete from ncc where mancc='$ma'";
mysqli_query($link,$sql);
$_SESSION['flash_message'] = "Xóa thành công";
echo '<script>window.location="quantri.php?page_layout=dmncc"</script>';
?>