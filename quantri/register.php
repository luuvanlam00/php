
<?php
include_once './connect.php';
if(isset($_POST['dk']))
{   
  $ten=$_POST['ten'];
  $mk=$_POST['mk'];
  $mk2=$_POST['mk2'];
    $vaitro="user";

  if(isset($ten) &&isset($mk)&&isset($mk2))
  {       
    if($mk!=$mk2)
    {
        echo '<script>alert("Mật khẩu không khớp!")</script>';
    }
    else{
        $mk=md5($mk);
        $sql="insert into nguoidung values('$ten','$mk','$vaitro')";
        $result=mysqli_query($link,$sql);
        echo '<script>alert("Bạn đã đăng kí thành công!")</script>';
        echo '<script>window.location="index.php"</script>';

    }
  }
 

}
               
?>   
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form"  method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="ten" placeholder="Tài khoản" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="mk" class="form-control" placeholder="Mật Khẩu" required="" minlength="6">
                </div>
                <div class="form-group">
                    <input type="password" name="mk2" class="form-control" placeholder="Nhập lại mật khẩu" minlength="6">
                </div>
              
                <button type="submit" name="dk" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="index.php">Login</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
        });
    </script>
</body>

</html>
