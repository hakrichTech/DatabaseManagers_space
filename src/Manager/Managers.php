$<?php
namespace DatabaseManagers_space\Manager;
/**
 *
 */
class Managers
{

  protected static $api = null;
  protected static $dao = null;
  protected static $managers = array();

  function __construct($api, $dao)
  {
    self::$api = $api;
    self::$dao = $dao;
  }


  public static function GET_MANAGER_OF(string $module)
  {
       if (empty($module))
          {
           throw new \InvalidArgumentException('Le module spécifié est invalide');
          }

      if (!isset(self::$managers[$module]))
       {
         $manager = '\\DatabaseManagers_space\\Models\\'.$module.'Manager_'.self::$api;
         self::$managers[$module] = new $manager(self::$dao);
       }

       return self::$managers[$module];


  }


}






 ?>
