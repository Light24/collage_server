<?php
  require_once('Mysql.php');
  require_once('FileLoader.php');
  require_once('Categories.php');
  require_once('CollagesManager.php');

?>

<?php
  if (!empty($_POST))
  {
    $data  = $_POST;
    $cid = $data['cats'];
    $vid = $data['vid'];

    $iid1 = FileLoader::instance()->load($_FILES['image1']);
    $iid2 = FileLoader::instance()->load($_FILES['image2']);
    if ($iid1 >= 0 && $iid2 >= 0)
      CollagesManager::instance()->add($cid, $vid, $iid1, $iid2);
  }

  $categories = Categories::instance()->getAll();

  $query = "SELECT * FROM view_types";
  Mysql::instance()->query($query);
  $view_types = Mysql::instance()->fetch_assoc_all();

?>


<html>
  <head>
    <title>Добавление новой категории</title>
  </head>

  <body>
    <form action = "collage_add.php" method = "POST" enctype = "multipart/form-data">
      <select name = "cats" required>
        <? foreach ($categories AS $category) : ?>
          <option value = "<?= $category['id'] ?>"> <?= $category['name'] ?> </option>
        <? endforeach ?>
      </select>

      <select name = "vid" required>
        <? foreach ($view_types AS $view_type) : ?>
          <option value = "<?= $view_type['id'] ?>"> <?= $view_type['name'] ?> </option>
        <? endforeach ?>
      </select>
      <input type = "file" name = "image1" required>
      <input type = "file" name = "image2" required>
      <input type = "submit" value = "Добавить">
    </form>
  </body>
</html>