<?php 
  foreach($data['list_type'] as $item) {
    // $idTL = $row_theloai['idTL'];
?>
<div class="card mb-3">
  <div class="row g-0">
      <div class="col-md-4">
        <img src="https://picsum.photos/200" alt="img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item list-group-item-danger"><?php echo $item->TenTL ?></li>
              <?php 
                foreach($data['list_cate_' . $item->id] as $cate) {
              ?>
              <li class="list-group-item">
                <a href="index.php?p=details&idTin=<?php echo $cate->idLT ?>"><?php echo $cate->Ten ?></a>
              </li>
              <?php 
                }
              ?>
            </ul>
            <?php
            if($data['new_left_' . $item->id] ?? false) {
              $item_new = $data['new_left_' . $item->id][0];
            }
            ?>
            <h5 class="card-title">
                <a href="index.php?p=details&idTin=<?php echo $item_new->idTin ?>">
                  <?php echo $item_new->TieuDe ?>
                </a>
            </h5>
            <p class="card-text"><?php echo $item_new->TomTat ?></p>
            <ul>
                <?php
                    foreach ($data['new_right_' . $item->id] as $right) {
                ?>
                <li><small class="text-muted"><?php echo $right->TieuDe ?></small></li>
                <?php } ?>
            </ul>
        </div>
      </div>
  </div>
</div>
<?php 
  }
?>
