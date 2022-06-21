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
$numrow=mysqli_num_rows(mysqli_query($link,"select * from khachhang"));
$totalpage=ceil($numrow/$rowpage);
$listpage="";
for ($i=1; $i<=$totalpage ; $i++) { 
    if($page==$i){
        $listpage.=' <li class="btn btn-white  active"><a href="quantri.php?page_layout=khachhang&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listpage.=' <li class="btn btn-white "><a href="quantri.php?page_layout=khachhang&page='.$i.'">'.$i.'</a></li>';
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
                      <h1>Quản lý khách hàng</h1>
                      <td style="text-align: center"><a href="quantri.php?page_layout=themkh"><button type="button" class="btn btn-primary ">Thêm mới</button></a></td>

                  </div>
                  <div class="ibox-content">

                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th style="text-align: center">STT</th>
                              <th style="text-align: center">Tên khách hàng</th>
                              <th style="text-align: center">Email</th>
                              <th style="text-align: center">Số điện thoại</th>
                              <th style="text-align: center">Sửa</th>
                              <th style="text-align: center">Xóa</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <?php
                              $i=1;
                             $sql="select * from khachhang order by id_kh desc  ";
                            $result=mysqli_query($link,$sql);
                              while($row=mysqli_fetch_array($result)){
                              ?>
                              <td style="text-align: center"><?php echo $i++?></td>
                              <td style="text-align: center"><?php echo $row['tenkh']?></td>
                              <td style="text-align: center"><?php echo $row['email']?></td>
                              <td style="text-align: center"><?php echo $row['sdt']?></td>
                              <td style="text-align: center"><a   href="quantri.php?page_layout=suakh&id_kh=<?php echo $row['id_kh']?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                              <td style="text-align: center"><a onclick="return xoa();" href="xoakh.php?id_kh=<?php echo $row['id_kh']?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                            
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
     

