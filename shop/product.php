<?php
include_once './quantri/connect.php';
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$rowPerPage = 9;
$rowPerPage2 = 3;
$perRow = $page * $rowPerPage - $rowPerPage;
$perRow2 = $page * $rowPerPage2 - $rowPerPage2;
$totalRow = mysqli_num_rows(mysqli_query($link, "SELECT * FROM sanpham "));
$totalPage = ceil($totalRow / $rowPerPage);
$list_page = "";
for ($i = 1; $i <= $totalPage; $i++) {
  if ($page == $i) {
    $list_page .= '<li class="active"><a href="index.php?page_layout=product&page=' . $i . '" >' . $i . '</a></li>';
  } else {
    $list_page .= '<li><a href="index.php?page_layout=product&page=' . $i . '">' . $i . '</a></li>';
  }
}


$sqldm = "select * from loaisp";
$rdm = mysqli_query($link, $sqldm);


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
<div class="container_fullwidth">
  <div class="container">
    <div lass="row">
      <div class="col-md-3">
        <div class="category leftbar">
          <h3 class="title">
            Danh mục
          </h3>
          <ul>
            <?php
            while ($r = mysqli_fetch_assoc($rdm)) {
            ?>
              <li>
                <a href="index.php?page_layout=product&maloai=<?php echo $r['maloai'] ?>">
                  <?php echo $r['tenloai'] ?>
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
        <div class="clearfix">
        </div>
        <form class="category leftbar" method="post">
          <h3 class="title">
            Tìm kiếm theo giá
          </h3>
          <ul>
            <li >
              <a href="index.php?page_layout=productprice&ma=1" style="color: red;">  
              Giá tăng dần
              </a>
            </li>
            <li>
              <a href="index.php?page_layout=productprice&ma=2" style="color: red;">
                Giá giảm dần
              </a>
            </li>

            <li>
              <a href="index.php?page_layout=productprice&ma=3" style="color: red;">
                Dưới 5 triệu
              </a>
            </li>
            <li>
              <a href="index.php?page_layout=productprice&ma=4" style="color: red;">
                5 triệu - 10 triệu
              </a>
            </li>
            <li>
              <a href="index.php?page_layout=productprice&ma=5" style="color: red;">
                10 triệu - 20 triệu
              </a>
            </li>
            <li>
              <a href="index.php?page_layout=productprice&ma=6" style="color: red;">
                Trên 20 triệu
              </a>
            </li>


          </ul>
        </form>

        <div class="clearfix">
        </div>
        <div class="leftbanner">
          <img src="shop/images/26.jpg" alt="">
        </div>

        <div class="leftbanner">
          <img src="shop/images/28.jpg" alt="">
        </div>
        <div class="leftbanner">
          <img src="shop/images/29.jpg" alt="">
        </div>
        <dv class="leftbanner">
          <img src="shop/images/30.jpg" alt="">
      </div>
    </div>
    <div class="col-md-9">
      <div class="banner">
        <div class="bannerslide" id="bannerslide">
          <ul class="slides">
            <li>
              <a href="#">
                <img src="shop/images/50.jpg" alt="" style="height: 180px; width: 100%;" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="shop/images/25.jpg" alt="" style="height: 180px; width: 100%;" />
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="products-grid">
        <div class="toolbar">
          <div class="row">
            <?php
            if (isset($_GET['maloai'])) {
              $ma = $_GET['maloai'];
              $sql = "select * from sanpham where maloai='$ma' limit  $perRow2,$rowPerPage2";
              $re = mysqli_query($link, $sql);
              while ($r = mysqli_fetch_assoc($re)) {
            ?> 
                <div class="col-md-4 col-sm-6">

                  <div class="products">
                  <?php if($r['giakm'] > 0){ ?>
                        <div class="offer">- <?php echo ceil(($r['giaban'] - $r['giakm']) * 100 / $r['giaban']) ?>%</div> 
                        <?php } ?>
                    <div class="thumbnail">
                      <a href="index.php?page_layout=details&masp=<?php echo $r['masp'] ?>">
                        <img src="quantri/anh/<?php echo $r['anh'] ?>" alt="Product Name" width="230px" height="280px">
                      </a>
                    </div>
                    <div class="productname">
                      <?php echo $r['tensp'] ?>
                    </div>
                    <h4 class="price">
                      <?php if($r['giakm'] > 0) 
                                                      echo adddotstring($r['giakm']);
                                                   else
                                                      echo adddotstring($r['giaban']) ?> VND
                    </h4>
                    <div class="button_group">
                      <a class="button add-cart" href="index.php?page_layout=details&masp=<?php echo $r['masp'] ?>">
                        Đặt mua
                      </a>
               
                    </div>
                  </div>
                </div>
              <?php
              }
            } else {
              $sql = "select * from sanpham limit  $perRow,$rowPerPage";
              $re = mysqli_query($link, $sql);
              while ($r = mysqli_fetch_assoc($re)) {
              ?>
                <div class="col-md-4 col-sm-6">

                  <div class="products">
                  <?php if($r['giakm'] > 0){ ?>
                        <div class="offer">- <?php echo ceil(($r['giaban'] - $r['giakm']) * 100 / $r['giaban']) ?>%</div> 
                        <?php } ?>
                    <div class="thumbnail">
                      <a href="index.php?page_layout=details&masp=<?php echo $r['masp'] ?>">
                        <img src="quantri/anh/<?php echo $r['anh'] ?>" alt="Product Name" width="230px" height="280px">
                      </a>
                    </div>
                    <div class="productname">
                      <?php echo $r['tensp'] ?>
                    </div>
                    <h4 class="price">
                      <?php if($r['giakm'] > 0) 
                                                      echo adddotstring($r['giakm']);
                                                   else
                                                      echo adddotstring($r['giaban']) ?> VND
                    </h4>
                    <div class="button_group">
                      <a class="button add-cart" href="index.php?page_layout=details&masp=<?php echo $r['masp'] ?>">
                        Đặt mua
                      </a>
                    </div>
                  </div>
                </div>
            <?php
              }
            }

            ?>
          
          </div>


        </div>

      </div>

    </div>

    <?php
    if (isset($_GET['maloai'])) {
      $totalRow2 = mysqli_num_rows(mysqli_query($link, "SELECT * FROM sanpham where maloai='$ma'"));
      $totalPage2 = ceil($totalRow2 / $rowPerPage2);
      $list_page2 = "";
      for ($i = 1; $i <= $totalPage2; $i++) {
        if ($page == $i) {
          $list_page2 .= '<li class="active"><a href="index.php?page_layout=product&maloai=' . $ma . '&page=' . $i . '" >' . $i . '</a></li>';
        } else {
          $list_page2 .= '<li><a href="index.php?page_layout=product&maloai=' . $ma . '&page=' . $i . '">' . $i . '</a></li>';
        }
      }
    ?>
      <div id="pagination" style="float: right;">
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <?php
            echo $list_page2;
            ?>
          </ul>
        </nav>
      </div>
    <?php
    }
    ?>
    <?php
    if (!isset($_GET['maloai'])) {
    ?>
      <div id="pagination" style="float: right;">
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <?php
            echo $list_page;
            ?>
          </ul>
        </nav>
      </div>
    <?php
    }
    ?>

  </div>
</div>
</div>