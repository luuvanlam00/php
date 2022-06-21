<?php
include_once './connect.php';
$ma = $_GET['id_hd'];
$sql = "select * from hoadon where id_hd='$ma'";
$result = mysqli_query($link, $sql);

if (isset($_POST['sua'])) {

    $ten = $_POST['ten'];
    $dc = $_POST['dc'];
    $ngay = $_POST['ngay'];
    $tt = $_POST['tt'];
    $thanhtoan=$_POST['thanhtoan'];
    $sdt=$_POST['sdt'];
    $email=$_POST['email'];
    $sql = "update hoadon set thoigian='$ngay',tenkh='$ten',sdt='$sdt',email='$email',diachi='$dc',trangthai='$tt',thanhtoan='$thanhtoan' where id_hd=$ma";
    mysqli_query($link, $sql);
    $_SESSION['flash_message'] = "Sửa thành công";
    echo '<script>window.location="quantri.php?page_layout=hd"</script>';
}

?>


<div class="ibox-content">
    <h1>Sửa hóa đơn </h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="form-group"><label class="col-sm-2 control-label">Ngày bán </label>

                <div class="col-sm-10"><input type="datetime" class="form-control" name="ngay" value="<?php echo $row['thoigian'] ?> " readonly /></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Tên khách hàng </label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="ten" value="<?php echo $row['tenkh'] ?>"  readonly/></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Số điện thoại </label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="sdt" value="<?php echo $row['sdt'] ?>"  readonly/></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Email </label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="email" value="<?php echo $row['email'] ?>"  readonly/></div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">Địa chỉ</label>

                <div class="col-sm-10"><textarea require="" class="form-control" name="dc"> <?php echo $row['diachi'] ?></textarea></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Thanh toán </label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="thanhtoan" value="<?php echo $row['thanhtoan'] ?> "  readonly/></div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">Trạng thái </label>

                <div class="col-sm-10">
                <?php if($row['trangthai'] == "Chưa xác nhận"){
                ?>
                <select class="form-control m-b" name="tt">
                
                
                
                        <option selected>Chưa xác nhận</option>
                        <option >Xác nhận</option>

              
                      
             
                

                </select>
                <?php 
                }
               
                ?>
                     <?php if($row['trangthai'] == "Xác nhận"){
                ?>
                <select class="form-control m-b" name="tt">
                
                
                
                        <option >Chưa xác nhận</option>
                        <option selected>Xác nhận</option>

              
                      
             
                

                </select>
                <?php 
                }
               
                ?>
                
                </div>
            </div>
        <?php
        }
        ?>

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit" name="sua">Sửa</button>

            </div>
        </div>
    </form>
</div>