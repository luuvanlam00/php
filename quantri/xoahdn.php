<?php
session_start();
include_once './connect.php';
$ma=$_GET['id_hd'];
$sql="delete from hdn where id_hd='$ma'";
mysqli_query($link,$sql);
$_SESSION['flash_message'] = "Xóa thành công";
echo '<script>window.location="quantri.php?page_layout=hdn"</script>';
?>