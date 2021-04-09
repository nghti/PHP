<?php
// defined(SV, $_SERVER);
// var_dump(SV);
use Lib\DB;

function trangchu() {
  $idTL = $_GET['idLT'] ?? 0;
  $data = [];
  $data['list_type'] = DB::query('SELECT id, TenTL FROM theloai limit 5');

  foreach ($data['list_type'] as $item) {
    $data['list_cate_' . $item->id] = DB::query('SELECT lt.* FROM loaitin as lt JOIN theloai as tl on tl.id = lt.theloai_id where lt.theloai_id = ' . $item->id);
    $data['new_left_' . $item->id] = DB::query('SELECT * FROM tin WHERE idLT = ' . $item->id . ' ORDER BY id DESC LIMIT 1');
    $data['new_right_' . $item->id] = DB::query('SELECT * FROM tin WHERE idLT= ' .$item->id . ' ORDER BY idLT DESC LIMIT 2');
    $data['new_type_one_' . $item->id] = DB::query('SELECT * FROM `tin` ORDER BY id DESC LIMIT 1');
    $data['new_type_four_' . $item->id] = DB::query('SELECT * FROM `tin` WHERE idLT= ' . $item->id . ' Order by id limit 4');
  }

  $data['new_one'] = DB::query('SELECT * FROM `tin` ORDER BY id DESC LIMIT 0,1');
  $data['new_four'] = DB::query('SELECT * FROM `tin` ORDER BY id DESC LIMIT 0,4');
  $data['advertise'] = DB::query('SELECT * FROM quangcao WHERE vitri = 1');
  $data['new_see'] = DB::query('SELECT * FROM `tin` ORDER BY SLS DESC LIMIT 0,2');
  $data['new_name'] = DB::query('SELECT `Ten` FROM loaitin WHERE id=1');

  return $data;
}
// Menu Top

  function TinMoiNhat_TheoLoaiTin_MotTin($idTin) {
    $conn = myConnect();
    $qr = "SELECT * FROM `tin` WHERE id=$idTin ORDER BY id DESC LIMIT 0,1";
    $result = mysqli_query($conn, $qr);
    return $result;
  }
?>
