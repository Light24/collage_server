<?php
  require_once("Mysql.php");
?>
<?php

  class CollagesManager
  {
    private static $m_instance;

    private function __construct()
    {
    }

    public static function instance()
    {
      if (self::$m_instance == null)
        self::$m_instance = new self();

      return self::$m_instance;
    }

    public function add($cid, $iid)
    {
      $query = sprintf('INSERT INTO collages(cid, iid) VALUE (%d, %d)', $cid, $iid);
      Mysql::instance()->query($query);
    }

    public function get($count)
    {
      $query = "SELECT * FROM collages LIMIT " . $count;
      Mysql::instance()->query($query);
      return Mysql::instance()->fetch_assoc_all();
    }

    public function getByCat($cid)
    {
      $query = "SELECT * FROM collages WHERE cid = " . $cid;
      Mysql::instance()->query($query);
      return Mysql::instance()->fetch_assoc_all();
    }

  }

?>