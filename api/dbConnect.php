<?php

  class DbConnect {

    protected static $db;

    private function __construct() {
        try {
          $config = parse_ini_file(__DIR__."/config.ini");

          self::$db = new PDO( "mysql:host={$config['db_host']}; dbname={$config['db_name']}", $config['db_user'], $config['db_pass'] );
          
          self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
          echo "Database connection Error: ".$e->getMessage();
          die;
        }

    }

    public static function getConnection() {

      if (!self::$db) {
        new DbConnect();
      }

      return self::$db;
    }

  }

?>
