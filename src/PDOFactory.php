<?php
namespace DatabaseManagers_space;
/**
 *
 */

class PDOFactory
{

   public static function GET_MYSQL_CONNECTION()
   {
     try {
       $db = new \PDO('mysql:host='.$_ENV['APP_SERVER_NAME'].';dbname='.$_ENV['APP_DB_NAME'],$_ENV['APP_DB_USER'],$_ENV['APP_DB_PASSWORD']);
       $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       return $db;
     } catch (\Exception $e) {
      // header('location:http://sinecure/404.html');
     }


  }

}

 ?>
