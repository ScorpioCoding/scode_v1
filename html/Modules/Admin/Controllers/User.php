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
    //Template and page for rendering
    $args['template'] = 'Backend';
    $args['page'] = 'User';
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
      "Users" => "",
    );

    View::render($args, $meta, $trans, [
      'data' => $data,
      'breadcrumbs' => $breadcrumbs,
    ]);
  }

  public function createAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Backend';
    $args['page'] = 'UserCreate';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();
    $data = $_POST;

    $breadcrumbs = array(
      "Scode" => DS,
      "Users" => "",
      "List" => DS . $args['lang'] . DS . $meta['scMetaRoute'],
    );


    View::render($args, $meta, $trans, [
      'data' => $data,
      'breadcrumbs' => $breadcrumbs,
    ]);
  }

  public function readAllAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Backend';
    $args['page'] = 'UserReadAll';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();
    $data = $_POST;

    $breadcrumbs = array(
      "Scode" => DS,
      "Users" => "",
      "List" => DS . $args['lang'] . DS . $meta['scMetaRoute'],
    );

    View::render($args, $meta, $trans, [
      'data' => $data,
      'breadcrumbs' => $breadcrumbs,
    ]);
  }

  public function readByIdAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Backend';
    $args['page'] = 'UserReadById';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();
    $data = $_POST;

    $breadcrumbs = array(
      "Scode" => DS,
      "Users" => "",
      "ReadById" => DS . $args['lang'] . DS . $meta['scMetaRoute'],
    );

    View::render($args, $meta, $trans, [
      'data' => $data,
      'breadcrumbs' => $breadcrumbs,
    ]);
  }

  public function updateAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Backend';
    $args['page'] = 'UserUpdate';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();
    $data = $_POST;

    $breadcrumbs = array(
      "Scode" => DS,
      "Users" => "",
      "Update" => DS . $args['lang'] . DS . $meta['scMetaRoute'],
    );

    View::render($args, $meta, $trans, [
      'data' => $data,
      'breadcrumbs' => $breadcrumbs,
    ]);
  }

  public function deleteAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Backend';
    $args['page'] = 'UserDelete';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();
    $data = $_POST;

    $breadcrumbs = array(
      "Scode" => DS,
      "Users" => "",
      "Delete" => DS . $args['lang'] . DS . $meta['scMetaRoute'],
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