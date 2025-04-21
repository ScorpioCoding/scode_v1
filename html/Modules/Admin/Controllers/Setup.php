<?php

namespace Modules\Admin\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Core\Translation;
use App\Core\Meta;


/**
 *  Admin Setup Controller
 */
class Setup extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {
    //Template for rendering
    $args['template'] = 'Starter';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();

    //page for rendering default = controller
    //$args['page'] = 'SetupRegister';
    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  public function registerAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Blanco';
    $args['page'] = 'SetupRegister';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();

    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  public function emailSendAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Blanco';
    $args['page'] = 'SetupEmailSend';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();

    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  public function emailValidateAction($args = array())
  {
    //Template and page for rendering
    $args['template'] = 'Blanco';
    $args['page'] = 'SetupEmailValidate';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();
    // Translation
    $trans = array();
    $trans = Translation::translate($args);
    // Extra data
    $data = array();

    View::render($args, $meta, $trans, [
      'data' => $data
    ]);
  }

  protected function after()
  {
  }

  //END-Class
}