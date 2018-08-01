<?php $conn = mysqli_connect('127.0.0.1','root','mysql','sample') or die(mysqli_error()); ?>
<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tao Cau Hoi</title>
  </head>
  <body>
    <?php
    if(isset($_GET['step'])) {
      if($_GET['step'] == 'taodapan') {
        $cauhoi = $_POST['cauhoi'];
        $level = $_POST['level'];

        $sql_cauhoi = "INSERT INTO ltweb_cauhoi(`cauhoi`,`level`) VALUES ('$cauhoi','$level')";
        $qry_cauhoi = mysqli_query($conn, $sql_cauhoi);

        if($qry_cauhoi) {
          $sql_select_mach = "SELECT id FROM ltweb_cauhoi WHERE id ORDER BY id DESC";
          // $result_mach = mysqli_query($conn, $sql_select_mach);
          // while($row_mach = mysqli_fetch_array($result_mach){
          //   echo '<form action="taocauhoi.php?step=dapandung" method="post">
          //     <input type="hidden" name="cauhoi" value="'.$row_mach['id'].'" />
          //     <label>Dap an A</label>
          //     <input type="text" name="dapan[]" /><br/ >
          //     <label>Dap an B</label>
          //     <input type="text" name="dapan[]" /><br/ >
          //     <label>Dap an C</label>
          //     <input type="text" name="dapan[]" /><br/ >
          //     <label>Dap an D</label>
          //     <input type="text" name="dapan[]" /><br/ >
          //     <button type="submit" name="luu">Luu Dap An</button>
          //   </form>';
          // }
        }
    } else if($_GET['step'] == 'dapandung') {
        $mach = $_POST['cauhoi'];
        foreach ($_POST['dapan'] as $key => $dapan) {
          $sql_dapan = "INSERT INTO ltweb_dapan(noidung,mach) VALUES ('{$dapan}',{$mach})";
          echo $sql_dapan;
          // $qry_dapan = mysqli_query($conn, $sql_dapan);
        }

      //   if($qry_dapan) {
      //     $sql_select_dapan_mach = "SELECT mach FROM ltweb_dapan WHERE mach = $_POST['cauhoi']";
      //     $result_dapan_mach = mysqli_query($conn, $sql_select_dapan_mach);
      //     while($row_dapan_mach = mysqli_fetch_array($result_dapan_mach) {
      //       echo '<form method="post">
      //         <input type="hidden" name="cauhoi" value="'.$row_dapan_mach['mach'].'" />
      //         <label>Chon cau tra loi</label>
      //       <select name="dapan">';
      //         $sql_select_dapan = "SELECT * FROM ltweb_dapan WHERE mach = $row_dapan_mach['mach']";
      //         $result_dapan = mysqli_query($conn, $sql_select_dapan);
      //         while($row_dapan = mysqli_fetch_array($result_dapan) {
      //           echo '<option value="'.$row_dapan['id'].'">'.$row_dapan['noidung'].'</option>';
      //         }
      //       echo '</select>
      //       <button type="submit" name="save">Luu</button>
      //     </form>';
      //   }
      // }
    }
  } else {
    echo '<form action="taocauhoi.php?step=taodapan" method="post">
      <label>Cau hoi</label>
      <input type="text" name="cauhoi" /><br/ >
      <label>Muc do</label>
      <select name="level">
        <option value="1">De</option>
        <option value="2">Kho</option>
      </select>
      <button type="submit">Luu Cau hoi</button>
    </form>';
   } ?>
  </body>
</html>

<?php
if(isset($_POST['save'])){
$mach = $_POST['cauhoi'];
$mada = $_POST['dapan'];

$sql_final = "UPDATE ltweb_dapan SET mada = $mada WHERE id = $mach";
$qry_dapan = mysqli_query($conn, $sql_final);
}
?>
