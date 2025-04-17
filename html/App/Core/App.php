<?php

namespace App\Core;

use App\Config\SetDb;
use App\Config\SetMeta;
use App\Config\SetRoutes;


class App
{

  public function __construct()
  {
    self::setDatabase();
    self::setMeta();
    self::setSubDomain();
    self::router();
  }

  private static function setDatabase()
  {
    (new DotEnv(PATH_ENV . 'database.env'))->load();
    (new SetDb());
  }

  private static function setMeta()
  {
    (new DotEnv(PATH_ENV . 'meta.env'))->load();
    (new SetMeta());
  }

  /**
   * Retreave the subdomain name
   * "http://admin.example.org -> admin -> Admin
   * "http://example.org -> site -> Site
   * 
   * @return void
   */
  private static function setSubDomain()
  {
    $url = $_SERVER['HTTP_HOST'];
    $parsedUrl = parse_url($url);
    $host = str_replace(COMPANY_DOMAIN_NAME, '', $parsedUrl['host']);
    $host = rtrim($host, '.');
    $host = ucfirst($host);

    $company_subdomains = explode(',', COMPANY_SUBDOMAINS);

    if ($host === "") {
      define('WEBSITE_MODULE', $company_subdomains[0]);
    } else {

      foreach ($company_subdomains as $sub) {
        $sub = trim($sub, " \n\r\t\v\x00");
        $sub = ucfirst($sub);
        if ($sub === $host) {
          define('WEBSITE_MODULE', $sub);
          break;
        }
      }

    }

  }

  private static function router()
  {

    $routes = (new SetRoutes)->getRoutes();

    $router = new Router();

    foreach ($routes as $route => $params) {
      $router->addRoute($route, $params);
    }
    ;

    //PARSING URL
    $tokens = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES);

    //DISPATCH
    try {
      $router->dispatch($tokens);
    } catch (NewException $e) {
      echo $e->getErrorMsg();
    }
  }

  //END-Class
}