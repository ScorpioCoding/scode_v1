<?php

namespace App\Config;

class SetRoutes
{
  private $modules = array();
  private $routes = array();

  public function __construct()
  {
    self::loadModules();
    self::loadRoutes();
  }


  private function loadModules()
  {

    //echo WEBSITE_MODULE;
    $scan2 = scandir(PATH_MOD . ucfirst(WEBSITE_MODULE) . DS . 'Routes' . DS);
    foreach ($scan2 as $file) {
      if (!is_dir(PATH_MOD . ucfirst(WEBSITE_MODULE) . DS . 'Routes' . DS . $file)) {
        //echo $file;
        $mods = include_once(PATH_MOD . ucfirst(WEBSITE_MODULE) . DS . 'Routes' . DS . $file);
        foreach ($mods as $mod => $params) {
          $this->modules[$mod] = $params;
        }
        ;
      }
    }
  }


  /** Routes
   * 
   */
  public function loadRoutes()
  {
    foreach ($this->modules as $key => $value) {
      $this->routes[$key] = $value;
      // echo '<pre>';
      // print_r($this->routes[$key]);
      // echo '</pre>';
    }
    ;
  }


  public function getRoutes()
  {
    return $this->routes;
  }





  //END-Class
}