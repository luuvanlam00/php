<?php
include_once './connect.php';
if(isset($_POST['them']))
{   
  $ten=$_POST['ten'];

  if(isset($ten))
  {
    $sql="insert into loaisp(tenloai) values('$ten')";
    $result=mysqli_query($link,$sql);
    $_SESSION['flash_message'] = "Thêm mới thành công";
    echo '<script>window.location="quantri.php?page_layout=dmsp"</script>';

  }

}
if(isset($_POST['lm']))
{ 

  $ten="";
                  
}                
?>                           
                <div class="ibox-content">
                                <h1>Thêm mới danh mục</h1>
                            <form method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Tên danh mục</label>

                                    <div class="col-sm-10"><input type="text" required="" class="form-control"  name="ten"/></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                             
                             
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" name="them">Thêm mới</button>
                                    <button class="btn btn-primary" type="submit" name="lm">Làm mới</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                            