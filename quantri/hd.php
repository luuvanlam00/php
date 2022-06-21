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
                <td style="text-align: center"><a href="quantri.php?page_layout=hd&ma=2">
                        <button type="button" class="btn btn-primary ">Hóa đơn trong ngày</button>
                    </a></td>
                <td style="text-align: center"><a href="quantri.php?page_layout=hd&ma=1">
                        <button type="button" class="btn btn-primary ">Hóa đơn chưa xác nhận</button>
                    </a></td>

            </div>
            <div class="ibox-content">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">STT</th>
                        <th style="text-align: center">Ngày bán</th>
                        <th style="text-align: center">Tên khách hàng</th>
                        <th style="text-align: center">Số điện thoại</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Địa chỉ</th>
                        <th style="text-align: center">Thanh toán</th>
                        <th style="text-align: center">Tổng tiền</th>
                        <th style="text-align: center">Trạng thái</th>
                        <th style="text-align: center">Sửa</th>
                        <th style="text-align: center">Xóa</th>
                        <th style="text-align: center">Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($ma)) {
                        if ($ma == 1) {

                            ?>
                            <tr>
                            <?php
                            $i=1;
                            $sql = "select * from hoadon  where trangthai='Chưa xác nhận' order by id_hd desc  ";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id_hd'];
                                ?>

                                <td style="text-align: center"><?php echo $i++?></td>
                                <td style="text-align: center"><?php echo $row['thoigian'] ?></td>
                                <td style="text-align: center"><?php echo $row['tenkh'] ?></td>
                                <td style="text-align: center"><?php echo $row['sdt'] ?></td>
                                <td style="text-align: center"><?php echo $row['email'] ?></td>
                                <td style="text-align: center"><?php echo $row['diachi'] ?></td>
                                <td style="text-align: center"><?php echo $row['thanhtoan'] ?></td>
                                <td style="text-align: center"><?php
                                    $sql = "SELECT SUM(soluong*giaban) as sl FROM cthd where id_hd='$id'";
                                    $r = mysqli_query($link, $sql);
                                    $ra = mysqli_fetch_array($r);
                                    echo adddotstring($ra['sl']);
                                    ?></td>
                                <td style="text-align: center"><?php echo $row['trangthai'] ?></td>

                                <td style="text-align: center"><a
                                            href="quantri.php?page_layout=suahd&id_hd=<?php echo $row['id_hd'] ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                                    </a></td>
                                <td style="text-align: center"><a onclick="return xoa();"
                                                                  href="xoahd.php?id_hd=<?php echo $row['id_hd'] ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Xóa</button>
                                    </a></td>
                                <td style="text-align: center"><a
                                            href="quantri.php?page_layout=cthd&id_hd=<?php echo $row['id_hd'] ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Chi tiết</button>
                                    </a></td>
                                </tr>
                                <?php
                            }
                        }
                        if ($ma == 2) {

                            ?>
                            <tr>
                            <?php
                            $i=1;
                            $ngay = date('Y/m/d');
                            $sql = "select * from hoadon  where thoigian = '$ngay' order by id_hd desc";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id_hd'];
                                ?>

                                <td style="text-align: center"><?php echo $i++?></td>
                                <td style="text-align: center"><?php echo $row['thoigian'] ?></td>
                                <td style="text-align: center"><?php echo $row['tenkh'] ?></td>
                                <td style="text-align: center"><?php echo $row['sdt'] ?></td>
                                <td style="text-align: center"><?php echo $row['email'] ?></td>
                                <td style="text-align: center"><?php echo $row['diachi'] ?></td>
                                <td style="text-align: center"><?php echo $row['thanhtoan'] ?></td>
                                <td style="text-align: center"><?php
                                    $sql = "SELECT SUM(soluong*giaban) as sl FROM cthd where id_hd='$id'";
                                    $r = mysqli_query($link, $sql);
                                    $ra = mysqli_fetch_array($r);
                                    echo adddotstring($ra['sl']);
                                    ?></td>
                                <td style="text-align: center"><?php echo $row['trangthai'] ?></td>

                                <td style="text-align: center"><a
                                            href="quantri.php?page_layout=suahd&id_hd=<?php echo $row['id_hd'] ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                                    </a></td>
                                <td style="text-align: center"><a onclick="return xoa();"
                                                                  href="xoahd.php?id_hd=<?php echo $row['id_hd'] ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Xóa</button>
                                    </a></td>
                                <td style="text-align: center"><a
                                            href="quantri.php?page_layout=cthd&id_hd=<?php echo $row['id_hd'] ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Chi tiết</button>
                                    </a></td>
                                </tr>
                                <?php
                            }
                        }
                    } else {
                        ?>
                        <tr>
                        <?php
                        $i=1;
                        $sql = "select * from hoadon  order by id_hd desc  ";
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id_hd'];
                            ?>

                            <td style="text-align: center"><?php echo $i++?></td>
                            <td style="text-align: center"><?php echo $row['thoigian'] ?></td>
                            <td style="text-align: center"><?php echo $row['tenkh'] ?></td>
                            <td style="text-align: center"><?php echo $row['sdt'] ?></td>
                            <td style="text-align: center"><?php echo $row['email'] ?></td>
                            <td style="text-align: center"><?php echo $row['diachi'] ?></td>
                            <td style="text-align: center"><?php echo $row['thanhtoan'] ?></td>
                            <td style="text-align: center"><?php
                                $sql = "SELECT SUM(soluong*giaban) as sl FROM cthd where id_hd='$id'";
                                $r = mysqli_query($link, $sql);
                                $ra = mysqli_fetch_array($r);
                                echo adddotstring($ra['sl']);
                                ?></td>
                            <td style="text-align: center"><?php echo $row['trangthai'] ?></td>

                            <td style="text-align: center"><a
                                        href="quantri.php?page_layout=suahd&id_hd=<?php echo $row['id_hd'] ?>">
                                    <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                                </a></td>
                            <td style="text-align: center"><a onclick="return xoa();"
                                                              href="xoahd.php?id_hd=<?php echo $row['id_hd'] ?>">
                                    <button type="button" class="btn btn-primary btn-sm">Xóa</button>
                                </a></td>
                            <td style="text-align: center"><a
                                        href="quantri.php?page_layout=cthd&id_hd=<?php echo $row['id_hd'] ?>">
                                    <button type="button" class="btn btn-primary btn-sm">Chi tiết</button>
                                </a></td>
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


        </div>
    </div>

</div>