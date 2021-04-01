<?php
    require "lib/dbCon.php";
    require "lib/trangchu.php";
    
    if (isset($_GET["p"])){
        $p = $_GET["p"];
    }
    else {
        $p = "";
    }
?>
<html>
  <head>
    <title>PHP Demo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
  </head>
  <body>
  <div class="container">
    <div class="row menu border border-secondary">
      <div class="col-sm">MENU</div>
    </div>
    <div class="row border border-secondary">
      <?php
          $tinmoinhat_mottin = TinMoiNhat_MotTin();
          $row_tinmoinhat_mottin = mysqli_fetch_array($tinmoinhat_mottin);
      ?>
      <div class="col-sm-6 border-end border-secondary">
        <h2>Slide</h2>
        <a href="index.php?p=list&idTin=<?php echo $row_tinmoinhat_mottin['idTin'] ?>">
          <?php echo $row_tinmoinhat_mottin['TieuDe'] ?>
        </a>
      </div>
      <div class="col-sm-3">
        <h2>Sidebar</h2>
        <?php
            $tinmoinhat_bontin = TinMoiNhat_BonTin();
            while ( $row_tinmoinhat_bontin = mysqli_fetch_array($tinmoinhat_bontin) ) {
        ?>
            <ul>
                <li>
                    <a href="index.php?p=details&idTin=<?php echo $row_tinmoinhat_bontin['idTin'] ?>">
                        <?php echo $row_tinmoinhat_bontin['TieuDe'] ?>
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
          $quangcao = QuangCao(1);
          while  ($row_quangcao = mysqli_fetch_array($quangcao) ) {

        ?>
          <li>
            <a href="<?php echo $row_quangcao['Url'] ?>">
              <img src="img/<?php echo $row_quangcao['urlHinh'] ?>" alt="">
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
          $tinmoinhat_luotxem = TinMoiNhat_LuotXem();
          while ( $row_tinmoinhat_luotxem = mysqli_fetch_array($tinmoinhat_luotxem) ) {
        ?>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold">
                <?php
                  echo $row_tinmoinhat_luotxem['TieuDe']
                ?>
              </div>
              <a href="index.php?p=details&idTin=<?php echo $row_tinmoinhat_luotxem['idTin'] ?>">
                  <?php echo $row_tinmoinhat_luotxem['SLS'] ?>
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
            default : require "blocks/menu.php";
          }
        ?>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="box">
          <?php
            $idTin = 2;
          ?>
          <h2><?php echo TenLoaitin($idTin) ?></h2>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <?php
                $mottin = TinMoiNhat_TheoLoaiTin_MotTin($idTin);
                $row_mottin = mysqli_fetch_array($mottin);
              ?>
              <h5 class="card-title">
                <?php
                  echo $row_mottin['TieuDe']
                ?>
              </h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <ul class="list-group list-group-flush">
              <?php
                $bontin = TinMoiNhat_TheoLoaiTin_BonTin($idTin);
                while( $row_bontin = mysqli_fetch_array($bontin) ) {
              ?>
              <li class="list-group-item">
                  <?php
                    echo $row_bontin['TieuDe']
                  ?>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>
        <div class="box">
          <?php
            $idTin = 3;
          ?>
          <h2><?php echo TenLoaitin($idTin) ?></h2>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <?php
                $mottin = TinMoiNhat_TheoLoaiTin_MotTin($idTin);
                $row_mottin = mysqli_fetch_array($mottin);
              ?>
              <h5 class="card-title">
                <?php
                  echo $row_mottin['TieuDe']
                ?>
              </h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <ul class="list-group list-group-flush">
              <?php
                $bontin = TinMoiNhat_TheoLoaiTin_BonTin($idTin);
                while( $row_bontin = mysqli_fetch_array($bontin) ) {
              ?>
              <li class="list-group-item">
                  <?php
                    echo $row_bontin['TieuDe']
                  ?>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>