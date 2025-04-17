<?php

namespace Modules\Admin\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Core\Translation;
use App\Core\Meta;
use App\Core\Auth;


/**
 *  Admin Home Controller
 */
class UserLogin extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {

    //Template for rendering
    $args['template'] = 'Blanco';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();


    $isData = json_decode(file_get_contents('php://input'), true);

    echo "<pre>";
    print_r($isData);
    echo "</pre>";



    // if (isset($isData))
    //   if (empty($isDdata['password']))
    //     $data['hash'] = 'blanco';
    //   else
    //     print_r(password_hash($args['paswoord'], PASSWORD_DEFAULT));


    //page for rendering default = controller
    //$args['page'] = 'UserReadAll';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  public function hashAction($args = array())
  {

    //Template for rendering
    $args['template'] = 'Blanco';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();


    // $isData = json_decode(file_get_contents('php://input'), true);

    // echo "<pre>";
    // print_r($isData['password']);
    // echo "</pre>";

    echo "<pre>";
    print_r($args);
    echo "</pre>";

    echo "<pre>";
    print_r($_POST['password']);
    echo "</pre>";


    $hash = "";
    $hash = password_hash($_POST['paswoord'], PASSWORD_DEFAULT);
    echo "<pre>";
    print_r($hash);
    echo "</pre>";



    // if (isset($isData))
    //   if (empty($isDdata['password']))
    //     $data['hash'] = 'blanco';
    //   else
    //     print_r(password_hash($args['paswoord'], PASSWORD_DEFAULT));


    //page for rendering default = controller
    // $args['page'] = 'UserLogin';
    // View::render($args, $meta, $trans, [
    //   'data' => $data
    // ]);
  }

  protected function after()
  {
  }

  //END-Class
}