<?php

namespace Modules\Admin\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Core\Translation;
use App\Core\Meta;


/**
 *  Admin User Controller
 */
class Post extends Controller
{
  protected function before()
  {
    if (isset($_POST))
      if (!isset($_POST['auth']) || empty($_POST['auth']) || $_POST['auth'] === 'false')
        self::redirect('/');
  }


  public function readAllAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Backend';
    $args['page'] = 'Post';
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
      "Posts" => "",
    );


    View::render($args, $meta, $trans, [
      'data' => $data,
      'breadcrumbs' => $breadcrumbs,
    ]);
  }








  protected function after()
  {
  }
  //END CLASS
}