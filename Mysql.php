<?
  class Mysql
  {
    private $config = array(
      'host'     => 'localhost',
      'user'     => 'root',
      'password' => '',
      'database' => 'collage',
    );

    private static $m_instance;
    private $mysql_link = null;
    private $query_result = null;

    private function __construct()
    {
      $this->mysql_link = mysql_connect($this->config['host'], $this->config['user'], $this->config['password']);
      mysql_select_db($this->config ['database'], $this->mysql_link);
    }

    function __destruct()
    {
      mysql_close($this->mysql_link);
    }

    public static function instance()
    {
      if (self::$m_instance == null)
        self::$m_instance = new Mysql();

      return self::$m_instance;
    }

    public function query($query)
    {
      $this->query_result = mysql_query($query, $this->mysql_link);
      print_r(mysql_error());
    }

    public function fetch_row()
    {
      return mysql_fetch_row($this->query_result);
    }

    public function fetch_assoc_all()
    {
      $data = array();
      while ($row = mysql_fetch_assoc($this->query_result))
        $data[] = $row;

      return $data;
    }
  }

?>