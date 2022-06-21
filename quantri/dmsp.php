<?php
include_once './connect.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowpage = 5;
$row = $page * $rowpage - $rowpage;
$numrow = mysqli_num_rows(mysqli_query($link, "select * from loaisp"));
$totalpage = ceil($numrow / $rowpage);
$listpage = "";
for ($i = 1; $i <= $totalpage; $i++) {
    if ($page == $i) {
        $listpage .= ' <li class="btn btn-white  active"><a href="quantri.php?page_layout=dmsp&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listpage .= ' <li class="btn btn-white "><a href="quantri.php?page_layout=dmsp&page=' . $i . '">' . $i . '</a></li>';
    }
}
?>
<script>

    function xoa(){

        var con =confirm("Bạn có muốn xóa không!");
        return con;
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h1>Quản lý danh mục</h1>
                <td style="text-align: center"><a href="quantri.php?page_layout=themdm">
                        <button type="button" class="btn btn-primary ">Thêm mới</button>
                    </a></td>

            </div>
            <div class="ibox-content">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">STT</th>
                        <th style="text-align: center">Tên danh mục</th>
                        <th style="text-align: center">Sửa</th>
                        <th style="text-align: center">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        $i=1;
                        $sql = "select * from loaisp order by maloai desc ";
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                        ?>
                        <td style="text-align: center"><?php echo $i++?></td>
                        <td style="text-align: center"><?php echo $row['tenloai'] ?></td>
                        <td style="text-align: center"><a href="quantri.php?page_layout=suadm&maloai=<?php echo $row['maloai'] ?>">
                                <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                            </a></td>
                        <td style="text-align: center"><a onclick="return xoa();" href="xoadm.php?maloai=<?php echo $row['maloai'] ?>">
                                <button type="button" class="btn btn-primary btn-sm">Xóa</button>
                            </a></td>

                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div>

</div>
        

