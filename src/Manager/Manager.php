<?php
namespace DatabaseManagers_space\Manager;
/**
 *
 */
abstract class Manager
{
  protected static $dao;
  function __construct($dao)
  {
    self::$dao=$dao;
  }
}


 ?>
