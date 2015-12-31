<?php
  require_once("Mysql.php");
?>

<?php

  class Categories
  {
    private static $m_instnace;

    private function __construct()
    {
    }

    public static function instance()
    {
      if (self::$m_instnace == null)
        self::$m_instnace = new self();

      return self::$m_instnace;
    }

    public function getAll()
    {
      $query = "SELECT * FROM cats";
      Mysql::instance()->query($query);
      return Mysql::instance()->fetch_assoc_all();
    }

    public function add($name, $iid)
    {
      $query = sprintf('INSERT INTO cats(name, iid) VALUE (%s, %d)', $name, $iid);
      Mysql::instance()->query($query);
    }

  }
?>