<?php 
require_once '../../global.php';
require_once '../../dao/categories_dao.php';
if (isset($_GET['add'])) {
  $VIEW_NAME = 'add.php';
} elseif (isset($_GET['insert'])) {
  if (isset($_POST['submit'])) {
    //bình thường
    $name = $_POST['name'];
    $image = $_FILES['image'];
    $err = [];
    if ($name == '') {
      $err['name'] = "Cần có dữ liệu";
    }
    if ($image['size'] == 0) {
      $err['image'] = "Cần có hình";
    } elseif ($image['size'] > 2 * 1024 * 1024) {
      $err['image'] = "Hình đã lớn hơn 2mb";
    } elseif ($image['size'] > 0 && $image['size'] <= 2 * 1024 * 1024) {

      $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
      $ext = strtolower($ext);
      if ($ext == 'jpg' || $ext == 'png') {
      } else {
        $err['image'] = "không đúng định dạng";
      }
    }

    if ($err == []) {
      categories_insert($name, $image['name']);
      move_uploaded_file($image['tmp_name'], "../../content/image/" . $image['name']);
      header("location: " . ADMIN_URL . '/loai-hang/index.php');
      die;
    }
  }

  $VIEW_NAME = 'add.php';
}else if(isset($_GET['edit'])){
    $VIEW_NAME = 'edit.php';
// }else if(isset($_GET['remote'])){
//     header("location: " . ADMIN_URL . 'loai-hang/index.php');   
//     die;
}else{
    $rows = categories_select_all();
    $VIEW_NAME = 'list.php';
}

include_once '../layout.php';
?>