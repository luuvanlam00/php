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

  
    <style>
    th,td{
        text-align: center;
    }
</style>

    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h1>Quản lý hóa đơn bán</h1>

                        </div>
                        <div class="ibox-content">

                            <table class="table table-bordered">
                                <thead >
                                <tr>
                                    <th style="text-align: center">STT</th>
                                    <th style="text-align: center">Mã hóa đơn </th>
                                    <th style="text-align: center">Sản phẩm </th>
                                    <th style="text-align: center">Số lượng </th>
                                    <th style="text-align: center">Đơn giá </th>
                                    <th style="text-align: center">Tổng tiền </th>
                                    

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $i=1;
                                    $sql="select c.id_cthd,c.id_hd,s.tensp,c.soluong,c.giaban from cthd c INNER JOIN sanpham s ON c.masp=s.masp  where id_hd=$ma";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <td style="text-align: center"><?php echo $i++?></td>
                                    <td style="text-align: center"><?php echo $row['id_hd']?></td>
                                    <td style="text-align: center"><?php echo $row['tensp']?></td>
                                    <td style="text-align: center"><?php echo $row['soluong']?></td>
                                    <td style="text-align: center"><?php echo adddotstring($row['giaban'])?></td>
                                    <td style="text-align: center"><?php echo adddotstring($row['giaban']*$row['soluong']) ?></td>
                                  
                                  
                                    
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
        

