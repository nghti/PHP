<?php
  function TinMoiNhat_MotTin() {
    $conn = myConnect();
    $qr = "
      SELECT * FROM `tin` ORDER BY idTin DESC LIMIT 0,1
    ";
    $result = mysqli_query($conn, $qr);
    return $result;
  }

  function TinMoiNhat_BonTin() {
    $conn = myConnect();
    $qr = "
      SELECT * FROM `tin` ORDER BY idTin DESC LIMIT 0,2
    ";
    $result = mysqli_query($conn, $qr);
    return $result;
  }

  function TinMoiNhat_LuotXem() {
    $conn = myConnect();
    $qr = "
      SELECT * FROM `tin` ORDER BY SLS DESC LIMIT 0,2
    ";
    $result = mysqli_query($conn, $qr);
    return $result;
  }

  function TinMoiNhat_TheoLoaiTin_MotTin($idTin) {
    $conn = myConnect();
    $qr = "
      SELECT * FROM `tin` WHERE idTin=$idTin ORDER BY idTin DESC LIMIT 0,1
    ";
    $result = mysqli_query($conn, $qr);
    return $result;
  }

  function TinMoiNhat_TheoLoaiTin_BonTin($idTin) {
    $conn = myConnect();
    $qr = "
      SELECT * FROM `tin` WHERE idLT=$idTin ORDER BY idTin DESC LIMIT 1,4
    ";
    $result = mysqli_query($conn, $qr);
    return $result;
  }

  function TenLoaitin($idTin) {
    $conn = myConnect();
    $qr = "
      SELECT `Ten` FROM loaitin WHERE idLT=$idTin
    ";
    $loaitin = mysqli_query($conn, $qr);
    $row = mysqli_fetch_array($loaitin);
    return $row['Ten'];
  }
?>