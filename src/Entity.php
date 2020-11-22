<?php
namespace DatabaseManagers_space;

/**
 *
 */
abstract class Entity implements \ArrayAccess
{
  protected static $erreurs = array(),$id;
  protected static $app;
  protected static $managers;


  public function __construct()
  {
    self::$app=$this;

  }


  abstract public static function SYNC(array $x);

  public static function IS_NEW(){
    return empty(self::$id);
  }

  public static function ERROR(){
    return self::$erreurs;
  }

  public static function ID(){
    return self::$id;
  }

  public static function SET_ID($id)
     {
       self::$id = (int) $id;
     }

     public function offsetGet($var)
       {
          if (is_callable(array($this, $var)))
             {
               return $this;
            }else {
              return;
            }
      }

      public function offsetSet($var, $value){

      }

      public function offsetExists($var){

      }

      public function offsetUnset($var){

      }
}


 ?>
