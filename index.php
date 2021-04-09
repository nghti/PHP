<?php
    require "lib/dbCon.php";
    require "lib/trangchu.php";

    if (isset($_GET["p"])){
        $p = $_GET["p"];
    }
    else {
        $p = "";
    }

    $data = trangchu();
?>
<html>
  <head>
    <title>PHP Demo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/efluidmenu.css" />
    <style>
        .flex {
          display: flex;
        }
        .menu {
          background: #ddd;
        }
        .left {
            float: left;
            width: 30%;
        }
        .right {
            float: right;
        }
        .content {
          display: block;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/efluidmenu.js"></script>
  </head>
  <body>
  <div class="container mb-4">
    <div class="row menu border border-secondary">
      <div id="fluidmenu1" class="efluidmenu">
<!--        --><?php
//        $mottin = TinMoiNhat_TheoLoaiTin_MotTin(1);
//        $row_mottin = mysqli_fetch_array($mottin);
//        print_r($row_mottin);
//        ?>
<!--        <h2>qqqqqq--><?php //echo $row_mottin['TieuDe'] ?><!--</h2>-->
        <a class="efluid-animateddrawer" href="#">
        <span></span>
        </a>
        <ul>
        <li><a href="./">Trang Chu</a></li>
        <?php  foreach ($data['list_type'] as $k => $item ) { ?>
            <li><a href="/<?php echo $item->id ?>"><?php echo $item->TenTL ?></a>
              <?php if ($data['list_cate_' . $item->id]) { ?>
                  <ul>
                    <?php foreach ($data['list_cate_' . $item->id] as $cate ) { ?>
                         <li><a href="index.php?p=list&idLT=<?php echo $cate->id ?>"><?php echo $cate->Ten ?></a></li>
                      <?php } ?>
                  </ul>
              <?php } ?>
            </li>
            <?php } ?>
        <li id="search">
          <form id="topform" method="get" action="http://www.google.com/search/search.php">
          <input type="text" name="zoom_query" id="zoom_query" size="20" class="zoom_searchbox topsearchbox" placeholder="search">
          <input id="query_submit" type="image" src="assets/magnify.gif" />
          <input name="zoom_per_page" id="zoom_per_page" type="hidden" value="10" />
          <input name="zoom_and" id="zoom_and" type="hidden" value="1" />
          <input type="hidden" name="zoom_sort" value="0" />
          </form>
        </li>
        </ul>
      </div>
    </div>
    <div class="row border border-secondary">
      <?php
        if ($data['new_one'][0] ?? false) {
          $item_one = $data['new_one'][0];
        }
      ?>
      <div class="col-sm-6 border-end border-secondary">
        <h2>Slide</h2>
        <a href="index.php?p=list&idLT=<?php echo $item_one ->idLT ?>">
          <?php echo $item_one ->TieuDe ?>
        </a>
      </div>
      <div class="col-sm-3">
        <h2>Sidebar</h2>
        <?php
            foreach($data['new_four'] as $item) {
        ?>
            <ul>
                <li>
                    <a href="index.php?p=details&idTin=<?php echo $item->idTin ?>">
                        <?php echo $item->TieuDe ?>
                    </a>
                </li>
            </ul>
        <?php
            }
        ?>
      </div>
      <div class="col-sm-3 border-start">
        <ul>
        <?php
        foreach($data['advertise'] as $item) {
        ?>
          <li>
            <a href="<?php echo $item->Url ?>">
              <img src="img/<?php echo $item->urlHinh ?>" alt="">
            </a>
          </li>
        <?php
          }
        ?>
        </ul>
      </div>
    </div>
    <div class="row border border-secondary">
      <div class="col-sm-3">
        <h2>Tin Xem Nhieu</h2>
        <?php
          foreach ($data['new_see']  as $item) {
        ?>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold">
                <?php
                  echo $item->TieuDe
                ?>
              </div>
              <a href="index.php?p=details&idTin=<?php echo $item->idTin ?>">
                  <?php echo $item->SLS ?>
              </a>
            </div>
          </li>
        </ul>
        <?php
          }
        ?>
      </div>
      <div class="col-sm-6 border-start border-end border-secondary">
        <div class="content">
        <h2 class="flex">ND Page</h2>
        <?php
          switch ($p) {
            case "list" : require "blocks/list.php"; break;
            case "details" : require "blocks/details.php"; break;
            default : require "blocks/home.php";
          }
        ?>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="box">
          <?php
            $idTin = 2;
          ?>
          <h2><?php echo $item_one ->id ?></h2>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <?php
              if($data['new_type_one_1'] ?? false) {
                $new_one = $data['new_type_one_1'][0];
              }
              ?>
              <h5 class="card-title">
                <?php
                  echo $new_one->TieuDe
                ?>
              </h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <ul class="list-group list-group-flush">
              <?php
                foreach ($data['list_type'] as $k => $item ) {
                    foreach ($data['new_type_four_' . $item->id] as $typeF ) {
              ?>
              <li class="list-group-item">
                  <?php
                    echo $typeF->TieuDe
                  ?>
              </li>
              <?php
                    }
                }
              ?>
            </ul>
          </div>
        </div>
        <div class="box">
          <?php
            $nameT = $data['new_name'][0];
          ?>
          <h2><?php echo $nameT->Ten ?></h2>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">
                <?php
                  echo $new_one->TieuDe
                ?>
              </h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <ul class="list-group list-group-flush">
              <?php
              foreach ($data['list_type'] as $k => $item ) {
                foreach ($data['new_type_four_' . $item->id] as $typeF ) {
                  ?>
                    <li class="list-group-item">
                      <?php
                      echo $typeF->TieuDe
                      ?>
                    </li>
                  <?php
                }
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
          foreach ($data['advertise'] as $item) {
      ?>
        <a class="col-6" href="<?php echo $item->Url ?>">
          <img src="img/<?php echo $item->urlHinh ?>" alt="">
        </a>
      <?php
        }
      ?>
    </div>
    <div class="row">
      <ul class="list-group">
        <?php
        foreach ($data['list_type'] as $item) {
        ?>
        <li class="list-group-item bg-secondary"><?php echo $item->TenTL ?></li>
          <?php
            foreach ($data['list_cate_' . $item->id ] as $cate) {
          ?>
          <li class="list-group-item">
            <a href="index.php?p=list&idLT=<?php echo $cate->idLT ?>">
            <?php echo $cate->Ten ?>
            </a>
          </li>
        <?php
          }
        }
        ?>
      </ul>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
