<?php
    $idLT = $_GET["idLT"];
    settype($idLT, "int");
    $breadcrumb = breadCrumb($idLT);
    $row_breadcrumb = mysqli_fetch_array($breadcrumb);
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#"><?php echo $row_breadcrumb['TenLT'] ?></a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>
<?php
    $tin = TinTheoLoaiTin($idLT);
    while($row_tin = mysqli_fetch_array($tin)) {
?>
<div class="card">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://picsum.photos/200" alt="img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row_tin['TieuDe'] ?></h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>