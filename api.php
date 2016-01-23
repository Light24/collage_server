<?php
  require_once('Mysql.php');
  require_once('CollagesManager.php');
  require_once('Categories.php');

  header('Content-Type: text/html; charset=cp1251'); //utf-8 cp1251

  $action = $_GET['action'];

  switch ($action)
  {
    case 'get_image':
      $image_id = intval($_GET['iid']);
      $query = sprintf("SELECT data FROM images WHERE id = %d", $image_id);
      Mysql::instance()->query($query);
      $data = Mysql::instance()->fetch_row();
      echo $data[0];
    break;

    case 'get_collages_new':
      $collages = CollagesManager::instance()->get(50);
      echo json_encode(array('data' => $collages), JSON_FORCE_OBJECT);
    break;

    case 'get_cats':
      $categories = Categories::getAll();
      echo json_encode(array('data' => $categories), JSON_FORCE_OBJECT);
    break;

    case 'get_collages_by_cat':
      $cid = intval($_GET('cid'));
      $collages = CollagesManager::instance()->getByCat($cid);
      echo json_encode(array('data' => $collages), JSON_FORCE_OBJECT);
    break;
  }
?>