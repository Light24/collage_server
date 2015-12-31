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

    public function add($cid, $vid, $iid1, $iid2)
    {
      $query = sprintf('INSERT INTO collages(cid, vid, iid_first, iid_second) VALUE (%d, %d, %d, %d)', $cid, $vid, $iid1, $iid2);
      Mysql::instance()->query($query);
    }


  }

?>