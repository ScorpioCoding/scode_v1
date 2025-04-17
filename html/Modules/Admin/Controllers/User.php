<?php

namespace Modules\Admin\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Core\Translation;
use App\Core\Meta;


/**
 *  Admin Home Controller
 */
class User extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {
  }

  /**
   * User ReadAll
   * @param mixed $args
   * @return void
   */
  public function readAllAction($args = array())
  {
    //Template for rendering
    $args['template'] = 'Backend';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();






    //page for rendering default = controller
    $args['page'] = 'UserReadAll';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  protected function after()
  {
  }

  //END-Class
}