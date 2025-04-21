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
class Dashboard extends Controller
{
  protected function before()
  {
    if (isset($_POST))
      if (!isset($_POST['auth']) || empty($_POST['auth']) || $_POST['auth'] === 'false')
        self::redirect('/');
  }

  public function indexAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Backend';
    $args['page'] = 'Dashboard';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();
    $data = $_POST;
    // SetUp the Navigator Bar
    $breadcrumbs = array(
      "Scode" => DS,
      "Dashboard" => DS . $args['lang'] . DS . $meta['scMetaRoute'],
    );

    View::render($args, $meta, $trans, [
      'data' => $data,
      'breadcrumbs' => $breadcrumbs,
    ]);
  }

  protected function after()
  {
  }

  //END-Class
}