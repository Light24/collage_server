<?php
  require_once('Mysql.php');
  require_once('FileLoader.php');
  require_once('Categories.php');
?>

<?php
  if (!empty($_POST))
  {
    $data  = $_POST;
    $image = $_FILES['image'];
    $iid = FileLoader::instance()->load($image);

    if ($iid >= 0)
      Categories::instance()->add($data['name'], $iid);
  }
?>


<html>
  <head>
    <title>Добавление новой категории</title>
  </head>

  <body>
    Добавление новой категории
    <br />
    <form action = "cats_add.php" method = "POST" enctype = "multipart/form-data">
      <input type = "text" name = "name" required>
      <input type = "file" name = "image" required>
      <input type = "submit" value = "Добавить">
    </form>
  </body>
</html>