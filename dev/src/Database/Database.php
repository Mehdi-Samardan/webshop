<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Database
{
   private static string $dbHost = '127.0.0.1';
   private static string $dbName = 'webshop';
   private static string $dbUser = 'root';
   private static string $dbPassword = '';

   private static $dbConnection = null;
   private static $dbStatement = null;

   private static function connect()
   {
      try {
         self::$dbConnection = new PDO(
            "mysql:host=".self::$dbHost.";dbname=".self::$dbName,
            self::$dbUser,
            self::$dbPassword);
      } catch(PDOException $e) {
        //TODO; 
        $e->getMessage();
      }
   }

   public static function query(string $sql, array $placeholders = [])
   {
      if(is_null(self::$dbConnection)) {
         self::connect();
      }
      self::$dbStatement = self::$dbConnection->prepare($sql);
      self::$dbStatement->execute($placeholders);
   }

   public static function getAll()
   {
      if(is_null(self::$dbConnection) || is_null(self::$dbStatement))
      {
         return [];
      }

      return self::$dbStatement->fetchAll(PDO::FETCH_ASSOC);
   }

   public static function get()
   {
      if(is_null(self::$dbConnection) || is_null(self::$dbStatement))
         return [];

      return self::$dbStatement->fetch(PDO::FETCH_ASSOC);
   }

   public static function LastInsertId()
   {
      return self::$dbConnection->LastInsertId();
   }
}