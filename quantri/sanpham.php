<?php
include_once './connect.php';
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$rowpage=5;
$row=$page*$rowpage-$rowpage;
$numrow=mysqli_num_rows(mysqli_query($link,"select * from sanpham"));
$totalpage=ceil($numrow/$rowpage);
$listpage="";
for ($i=1; $i<=$totalpage ; $i++) { 
    if($page==$i){
        $listpage.=' <li class="btn btn-white  active"><a href="quantri.php?page_layout=sanpham&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listpage.=' <li class="btn btn-white "><a href="quantri.php?page_layout=sanpham&page='.$i.'">'.$i.'</a></li>';
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
                            <h1>Quản lý sản phẩm</h1>
                            <td style="text-align: center"><a href="quantri.php?page_layout=themsp"><button type="button" class="btn btn-primary ">Thêm mới</button></a></td>

                        </div>
                        <div class="ibox-content">

                            <table class="table table-bordered">
                                <thead >
                                <tr>
                                    <th style="text-align: center">STT</th>
                                    <th style="text-align: center">Tên sản phẩm</th>
                                    <th style="text-align: center">Ảnh sản phẩm</th>
                                    <th style="text-align: center">Giá sản phẩm</th>
                                    <th style="text-align: center">Giá khuyến mãi</th>
                                    <th style="text-align: center">Loại sản phẩm</th>
                                    <th style="text-align: center">Nhà cung cấp</th>
                                    <th style="text-align: center">Sửa</th>
                                    <th style="text-align: center">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $i=1;
                                    $sql="select * from sanpham  INNER JOIN ncc ON sanpham.mancc=ncc.mancc inner join loaisp on sanpham.maloai=loaisp.maloai order by masp desc ";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <td style="text-align: center"><?php echo $i++?></td>
                                    <td style="text-align: center"><?php echo $row['tensp']?></td>
                                    <td style="text-align: center"><img   height="120px" src="anh/<?php echo $row['anh']?>"/></td>
                                    <td style="text-align: center"><?php echo  adddotstring($row['giaban'])?></td>
                                    <td style="text-align: center"><?php echo adddotstring( $row['giakm'])?></td>
                                    <td style="text-align: center"><?php echo $row['tenloai']?></td>
                                    <td style="text-align: center"><?php echo $row['tenncc']?></td>
                                    <td style="text-align: center"><a   href="quantri.php?page_layout=suasp&masp=<?php echo $row['masp']?>&anhsp=<?php echo $row['anh'] ?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                                    <td style="text-align: center"><a onclick="return xoa();" href="xoasp.php?masp=<?php echo $row['masp']?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                                  
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
        

