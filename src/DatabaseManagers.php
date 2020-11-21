<?php
namespace DatabaseManagers_space;

/**
 *
 */
class DatabaseManagers
{

  private static $modelPath=array();
  private static $error=0;
  private static $managerPath=array();

  function __construct($managers_url,$models_url)
  {
    self::$managersUrl = $managers_url;
    self::$modelsUrl = $models_url;
    $a = self::CHECK_DIR($managers_url,"manager");
    $b = self::CHECK_DIR($models_url);
    if ($b) {
      if ($c) {
        self::$error=0;
      }else {
        self::$error=1;
      }
    }else {
      self::$error=2
    }

  }

  public static function CHECK_DIR($x,$array="")
  {
    $dir = __DIR__.'/../../../../'.$x;
    if (is_dir($dir)) {
      if ($array == "manager") {
        self::INCLUDE_G_DIR($dir);
        return 1;
      }else {
        self::INCLUDE_M_DIR($dir);
        return 1;
      }
    }else {
      return 0;
    }
  }

  protected static function INCLUDE_M_DIR($x)
  {
    $files = scandir($x);

    foreach ($files as $file) {
     if ($file!='.' && $file!="..") {
       self::$modelPath[]=$x.'/'.$file;
     }
   }
  }

  protected static function INCLUDE_G_DIR($x)
  {
    $files = scandir($x);

    foreach ($files as $file) {
     if ($file!='.' && $file!="..") {
       self::$managerPath[]=$x.'/'.$file;
     }
   }
  }
}




 ?>
