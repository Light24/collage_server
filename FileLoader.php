<?
 require_once('Mysql.php');
?>

<?
  class FileLoader
  {
    private static $m_instance;

    private function __construct()
    {

    }

    public static function instance()
    {
      if (self::$m_instance == null)
        self::$m_instance = new FileLoader();

      return self::$m_instance;
    }

    public function load($file)
    {
      $file_size = filesize($file['tmp_name']);
      $file_name =  $file['name'];

      $file = fopen($file['tmp_name'], "rb");
      $file_content = fread($file, $file_size);
      fclose($file);

      $query = sprintf("INSERT INTO images (name, data, size) VALUES ('%s', '%s', %s)", $file_name, mysql_escape_string($file_content), $file_size);
      Mysql::instance()->query($query);

      $query = "SELECT LAST_INSERT_ID()";
      mysql::instance()->query($query);
      $result = mysql::instance()->fetch_row();
      return $result[0];
    }
  }

?>