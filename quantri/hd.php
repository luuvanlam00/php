<?php
include_once './connect.php';
if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowpage = 10;
$row = $page * $rowpage - $rowpage;
$numrow = mysqli_num_rows(mysqli_query($link, "select * from hoadon"));
$totalpage = ceil($numrow / $rowpage);
$listpage = "";
for ($i = 1; $i <= $totalpage; $i++) {
    if ($page == $i) {
        $listpage .= ' <li class="btn btn-white  active"><a href="quantri.php?page_layout=hd&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listpage .= ' <li class="btn btn-white "><a href="quantri.php?page_layout=hd&page=' . $i . '">' . $i . '</a></li>';
    }
}
function adddotstring($strNum)
{

    $len = strlen($strNum);
    $counter = 3;
    $result = "";
    while ($len - $counter >= 0) {
        $con = substr($strNum, $len - $counter, 3);
        $result = '.' . $con . $result;
        $counter += 3;
    }
    $con = substr($strNum, 0, 3 - ($counter - $len));
    $result = $con . $result;
    if (substr($result, 0, 1) == '.') {
        $result = substr($result, 1, $len + 1);
    }
    return $result;
}
?>


<script>
    function xoa() {

        var con = confirm("Bạn có muốn xóa không!");
        return con;
    }
</script>
<style>
    th,
    td {
        text-align: center;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h1>Quản lý hóa đơn </h1>
                <td><a href="quantri.php?page_layout=hd&ma=2"><button type="button" class="btn btn-primary ">Hóa đơn trong ngày</button></a></td>
                <td><a href="quantri.php?page_layout=hd&ma=1"><button type="button" class="btn btn-primary ">Hóa đơn chưa xác nhận</button></a></td>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ngày bán </th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($ma)) {
                            if ($ma == 1) {

                        ?>
                                <tr>
                                    <?php

                                    $sql = "select * from hoadon  where trangthai='Chưa xác nhận' order by id_hd desc  ";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id_hd'];
                                    ?>

                                        <td><?php echo $id ?></td>
                                        <td><?php echo $row['thoigian'] ?></td>
                                        <td><?php echo $row['tenkh'] ?></td>
                                        <td><?php echo $row['sdt'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['diachi'] ?></td>
                                        <td><?php echo $row['thanhtoan'] ?></td>
                                        <td><?php
                                            $sql = "SELECT SUM(soluong*giaban) as sl FROM cthd where id_hd='$id'";
                                            $r = mysqli_query($link, $sql);
                                            $ra = mysqli_fetch_array($r);
                                            echo adddotstring($ra['sl']);
                                            ?></td>
                                        <td><?php echo $row['trangthai'] ?></td>

                                        <td><a href="quantri.php?page_layout=suahd&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                                        <td><a onclick="return xoa();" href="xoahd.php?id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                                        <td><a href="quantri.php?page_layout=cthd&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Chi tiết</button></a></td>
                                </tr>
                            <?php
                                    }
                                }
                                if ($ma == 2) {

                            ?>
                            <tr>
                                <?php
                                    $ngay = date('Y/m/d');
                                    $sql = "select * from hoadon  where thoigian = '$ngay' order by id_hd desc";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id_hd'];
                                ?>

                                    <td><?php echo $id ?></td>
                                    <td><?php echo $row['thoigian'] ?></td>
                                    <td><?php echo $row['tenkh'] ?></td>
                                    <td><?php echo $row['sdt'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['diachi'] ?></td>
                                    <td><?php echo $row['thanhtoan'] ?></td>
                                    <td><?php
                                        $sql = "SELECT SUM(soluong*giaban) as sl FROM cthd where id_hd='$id'";
                                        $r = mysqli_query($link, $sql);
                                        $ra = mysqli_fetch_array($r);
                                        echo adddotstring($ra['sl']);
                                        ?></td>
                                    <td><?php echo $row['trangthai'] ?></td>

                                    <td><a href="quantri.php?page_layout=suahd&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                                    <td><a onclick="return xoa();" href="xoahd.php?id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                                    <td><a href="quantri.php?page_layout=cthd&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Chi tiết</button></a></td>
                            </tr>
                    <?php
                                    }
                                }
                            } else {
                    ?>
                    <tr>
                        <?php
                                $sql = "select * from hoadon  order by id_hd desc  limit $row,$rowpage";
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id_hd'];
                        ?>

                            <td><?php echo $id ?></td>
                            <td><?php echo $row['thoigian'] ?></td>
                            <td><?php echo $row['tenkh'] ?></td>
                            <td><?php echo $row['sdt'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['thanhtoan'] ?></td>
                            <td><?php
                                    $sql = "SELECT SUM(soluong*giaban) as sl FROM cthd where id_hd='$id'";
                                    $r = mysqli_query($link, $sql);
                                    $ra = mysqli_fetch_array($r);
                                    echo adddotstring($ra['sl']);
                                ?></td>
                            <td><?php echo $row['trangthai'] ?></td>

                            <td><a href="quantri.php?page_layout=suahd&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                            <td><a onclick="return xoa();" href="xoahd.php?id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                            <td><a href="quantri.php?page_layout=cthd&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Chi tiết</button></a></td>
                    </tr>
                <?php
                                }
                ?>
            <?php
                            }
            ?>
                    </tbody>
                </table>

            </div>
            <div class="btn-group" style="float: right;">
                <ul>

                    <?php
                    if (!isset($ma)) {
                        echo $listpage;
                    }

                    ?>


                </ul>

            </div>

        </div>
    </div>

</div>