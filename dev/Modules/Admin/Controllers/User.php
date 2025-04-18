<?php

namespace Modules\Admin\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Core\Translation;
use App\Core\Meta;


/**
 *  Admin User Controller
 */
class User extends Controller
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


    //page for rendering default = controller
    //$args['page'] = 'UserReadAll';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  public function createAction($args = array())
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


    //page for rendering default = controller
    $args['page'] = 'UserCreate';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

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
    $data = $_POST;


    //page for rendering default = controller
    $args['page'] = 'UserReadAll';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  public function readByIdAction($args = array())
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


    //page for rendering default = controller
    $args['page'] = 'UserReadById';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  public function updateAction($args = array())
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


    //page for rendering default = controller
    $args['page'] = 'UserUpdate';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  public function deleteAction($args = array())
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


    //page for rendering default = controller
    $args['page'] = 'UserDelete';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  protected function after()
  {
  }

  //END-Class
}