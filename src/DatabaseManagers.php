<?php
namespace DatabaseManagers_space;

/**
 *
 */
class DatabaseManagers
{

  private static $modelPath=array();
  private static $entyPath=array();
  private static $error=0;
  private static $app;
  private static $manager=array();
  private static $managerPath=array();

  function __construct($managers_url,$models_url,$entyPath)
  {
    self::$app = $this;
    $a = self::CHECK_DIR($managers_url,"manager");
    $b = self::CHECK_DIR($models_url);
    $d = self::CHECK_DIR($entyPath,"enty");
    if ($b) {
      if ($a) {
        self::$error=0;
      }else {
        self::$error=1;
      }
    }else {
      self::$error=2;

    }

  }

  public static function CHECK_DIR($x,$array="")
  {
    $dir = __DIR__.'/../../../'.$x;
    if (is_dir($dir)) {
      if ($array == "manager") {
        self::INCLUDE_G_DIR($dir);
        return 1;
      }
      elseif ($array == "enty") {
        self::INCLUDE_E_DIR($dir);
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

  protected static function INCLUDE_E_DIR($x){
    $files = scandir($x);

    foreach ($files as $file) {
     if ($file!='.' && $file!="..") {
       self::$entyPath[]=$x.'/'.$file;
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



  public static function RUN()
  {
    if (self::$error == 0) {
      foreach (self::$managerPath as $manager) {
        $content = file_get_contents($manager);
        $array = explode("/", $manager);
        $name = $array[count($array)-1];
        $file = __DIR__."/Managers/".$name;
        fopen($file,"w+");
        file_put_contents($file,$content);
      }
      foreach (self::$entyPath as $enty) {
        $content1 = file_get_contents($enty);
        $array1 = explode("/", $enty);
        $name1 = $array1[count($array1)-1];
        $file1 = __DIR__."/Entity/".$name1;
        fopen($file1,"w+");
        file_put_contents($file1,$content1);
      }
      foreach (self::$modelPath as $models) {
        $content0 = file_get_contents($models);
        $array0 = explode("/", $models);
        $name0 = $array0[count($array0)-1];
        $file0 = __DIR__."/Models/".$name0;
        list($manager0,$ext) = explode("Manager_", $name0);
        self::$manager[]=$manager0;
        fopen($file0,"w+");
        file_put_contents($file0,$content0);
      }
    }
    return self::$app;

  }
  public static function MANAGER()
  {
    return self::$manager;
  }

  public static function APP()
  {
     return self::$app;
  }
}




 ?>
