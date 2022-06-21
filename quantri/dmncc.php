<?php
include_once './connect.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowpage = 5;
$row = $page * $rowpage - $rowpage;
$numrow = mysqli_num_rows(mysqli_query($link, "select * from ncc"));
$totalpage = ceil($numrow / $rowpage);

?>
<script>

    function xoa() {

        var con = confirm("Bạn có muốn xóa không!");
        return con;
    }
</script>
<style>
    th, td {
        text-align: center;
    }
</style>


    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h1>Quản lý nhà cung cấp</h1>
            <td><a href="quantri.php?page_layout=themncc">
                    <button type="button" class="btn btn-primary ">Thêm mới</button>
                </a></td>

        </div>
        <div class="ibox-content">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center">STT</th>
                    <th style="text-align: center">Tên nhà cung cấp</th>
                    <th style="text-align: center">Sửa</th>
                    <th style="text-align: center">Xóa</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    $i = 1;
                    $sql = "select * from ncc   order by mancc desc ";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)){
                    ?>
                    <td style="text-align: center"><?php echo $i++ ?></td>
                    <td style="text-align: center"><?php echo $row['tenncc'] ?></td>
                    <td style="text-align: center"><a
                                href="quantri.php?page_layout=suancc&mancc=<?php echo $row['mancc'] ?>">
                            <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                        </a></td>
                    <td style="text-align: center"><a onclick="return xoa();"
                                                      href="xoancc.php?mancc=<?php echo $row['mancc'] ?>">
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


     

