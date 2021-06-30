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
                                <thead >
                                <tr>
                                    <th >ID</th>
                                    <th >Mã hóa đơn </th>
                                    <th >Sản phẩm </th>
                                    <th >Số lượng </th>
                                    <th >Đơn giá </th>
                                    <th >Tổng tiền </th>
                                    

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $sql="select c.id_cthd,c.id_hd,s.tensp,c.soluong,c.giaban from cthd c INNER JOIN sanpham s ON c.masp=s.masp  where id_hd=$ma";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <td><?php echo $row['id_cthd']?></td>
                                    <td><?php echo $row['id_hd']?></td>
                                    <td><?php echo $row['tensp']?></td>
                                    <td><?php echo $row['soluong']?></td>
                                    <td><?php echo adddotstring($row['giaban'])?></td>
                                    <td><?php echo adddotstring($row['giaban']*$row['soluong']) ?></td>
                                  
                                  
                                    
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
        

