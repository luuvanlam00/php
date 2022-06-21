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
$numrow=mysqli_num_rows(mysqli_query($link,"select * from binhluan"));
$totalpage=ceil($numrow/$rowpage);
$listpage="";
for ($i=1; $i<=$totalpage ; $i++) { 
    if($page==$i){
        $listpage.=' <li class="btn btn-white  active"><a href="quantri.php?page_layout=binhluan&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listpage.=' <li class="btn btn-white "><a href="quantri.php?page_layout=binhluan&page='.$i.'">'.$i.'</a></li>';
    }
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
                      <h1>Quản lý bình luận</h1>
                      

                  </div>
                  <div class="ibox-content">

                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th style="text-align: center">STT</th>
                              <th style="text-align: center">Mã sản phẩm</th>
                              <th style="text-align: center">Tên sản phâm</th>
                              <th style="text-align: center">Người dùng  </th>
                              <th style="text-align: center">Nội dung </th>
                              <th style="text-align: center">Thời gian </th>
                              <th style="text-align: center">Sửa</th>
                              <th style="text-align: center">Xóa</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <?php
                              $i=1;
                             $sql="select * from binhluan join sanpham on binhluan.masp = sanpham.masp order by binhluan.id_bl desc";
                            $result=mysqli_query($link,$sql);
                              while($row=mysqli_fetch_array($result)){
                              ?>
                              <td style="text-align: center"><?php echo $i++?></td>
                              <td style="text-align: center"><?php echo $row['masp']?></td>
                              <td style="text-align: center"><?php echo $row['tensp']?></td>
                              <td style="text-align: center"><?php echo $row['ten']?></td>
                              <td style="text-align: center"><?php echo $row['noidung']?></td>
                              <td style="text-align: center"><?php echo $row['ngay']?></td>
                              <td style="text-align: center"><a   href="quantri.php?page_layout=suabl&id_bl=<?php echo $row['id_bl']?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                              <td style="text-align: center"><a onclick="return xoa();" href="xoabl.php?id_bl=<?php echo $row['id_bl']?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                            
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
     

