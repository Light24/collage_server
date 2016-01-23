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

    $iid = FileLoader::instance()->load($_FILES['collage']);
    if ($iid >= 0)
      CollagesManager::instance()->add($cid, $iid);
  }

  $categories = Categories::instance()->getAll();

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

      </select>
      <input type = "file" name = "collage" required>
      <input type = "submit" value = "Добавить">
    </form>
  </body>
</html>