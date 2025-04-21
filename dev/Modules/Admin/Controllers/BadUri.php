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
class BadUri extends Controller
{
  protected function before()
  {
    if (isset($_POST))
      if (!isset($_POST['auth']) || empty($_POST['auth']) || $_POST['auth'] === 'false')
        self::redirect('/');
  }

  public function indexAction($args = array())
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
    $data = $_POST;

    echo "BadUri : 404 PAGE";


    //page for rendering default = controller
    //$args['page'] = 'Home';
    // View::render($args, $meta, $trans, [
    //   'data' => $data
    // ]);
  }

  protected function after()
  {
  }

  //END-Class
}