<?php
include_once './connect.php';
$ma=$_GET['id_hd'];
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

      function xoa(){

        var con =confirm("Bạn có muốn xóa không!");
        return con;
      }
  </script>  
    <style>
    th,td{
        text-align: center;
    }
</style>

    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h1>Quản lý hóa đơn nhập</h1>
                            <td style="text-align: center"><a href="quantri.php?page_layout=themcthdn&id_hd=<?php echo $ma ?>"><button type="button" class="btn btn-primary ">Thêm</button></a></td>

                        </div>
                        <div class="ibox-content">

                            <table class="table table-bordered">
                                <thead >
                                <tr>
                                    <th style="text-align: center">STT</th>
                                    <th style="text-align: center">Mã hóa đơn nhập </th>
                                    <th style="text-align: center">Sản phẩm </th>
                                    <th style="text-align: center">Số lượng </th>
                                    <th style="text-align: center">Đơn giá </th>
                                    <th style="text-align: center">Tổng tiền </th>
                                    <th style="text-align: center">Sửa</th>
                                    <th style="text-align: center">Xóa</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $i=1;
                                    $sql="select * from cthdn  INNER JOIN sanpham ON cthdn.masp=sanpham.masp  where id_hd=$ma";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <td style="text-align: center"><?php echo $i++?></td>
                                    <td style="text-align: center"><?php echo $row['id_hd']?></td>
                                    <td style="text-align: center"><?php echo $row['tensp']?></td>
                                    <td style="text-align: center"><?php echo $row['soluong']?></td>
                                    <td style="text-align: center"><?php echo adddotstring($row['dongia'])?></td>
                                    <td style="text-align: center"><?php echo adddotstring($row['dongia']*$row['soluong']) ?></td>
                                  
                                    <td style="text-align: center"><a   href="quantri.php?page_layout=suacthdn&id_cthd=<?php echo $row['id_cthd']?>&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                                    <td style="text-align: center"><a onclick="return xoa();" href="xoacthdn.php?id_cthd=<?php echo $row['id_cthd']?>&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                                    
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
        

