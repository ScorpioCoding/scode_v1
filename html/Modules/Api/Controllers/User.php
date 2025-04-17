<?php

namespace Modules\Api\Controllers;

use App\Core\Controller;
use App\Core\Api;
use App\Core\Auth;

use Modules\Api\Models\mCommon;
use Modules\Api\Models\mUser;
use Modules\Api\Utils\ValidateUser;

/**
 *  Api User CRUD
 */
class User extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {
  }

  public function createAction($args = array())
  {
    //echo 'HIER BEN IK API CONTROLLER CREATE USER';
    $args['api'] = "Create";



    //$isToken = Auth::isAuthByTokenBasic(getallheaders());
    //if ($isToken) {
    $isMethod = Auth::isAuthMethod('POST');
    if ($isMethod) {
      $isData = json_decode(file_get_contents('php://input'), true);
      if ($isData) {
        $res1 = ValidateUser::validateRealm($isData['realm']);
        $res2 = ValidateUser::validateName($isData['name']);
        $res3 = ValidateUser::validateEmail($isData['email']);
        $res4 = ValidateUser::validatePassword($isData['psw'], $isData['pswConfirm']);
        $isErrors = array_merge($res1, $res2, $res3, $res4);

        if (!$isErrors) {
          $isAction = mUser::create($isData);
          if ($isAction["state"] === false) {
            $isErrors = $isAction["data"];
          } else {
            $result = $isAction["data"];
          }
        }
      }
    }
    //}


    Api::render($args, [
      //'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isErrors' => $isErrors,
      'result' => $result,
    ]);
  }

  public function readAllAction($args = array())
  {
    $args['api'] = "Read";
    // Extra data
    $data = array();

    //$isToken = Auth::isAuthByTokenBasic(getallheaders());
    //if ($isToken) {
    $isMethod = Auth::isAuthMethod('GET');
    if ($isMethod) {

      $isHas = mCommon::hasTable('user');
      if ($isHas["state"] === true) {
        $isCount = mCommon::countTable('user');
        if ($isCount["state"] === true && $isCount["data"][0] > 0) {
          $isData = mCommon::readAll("user");
        }
      }

    }
    //}


    Api::render($args, [
      //'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }


  public function readByIdAction($args = array())
  {
    $args['api'] = "Read";
    // Extra data
    $data = array();

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('GET');
      if ($isMethod) {
        $isHas = mCommon::hasTableById('user', $args['id']);
        if ($isHas["state"] === true) {
          $isCount = mCommon::countTableById('user', $args["id"]);
          if ($isCount["state"] === true && $isCount["data"][0] > 0) {
            $isData = mCommon::readById("user", $args["id"]);
          }
        }

      }
    }


    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }



  public function updateAction($args = array())
  {

    $args['api'] = "Update";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('PUT');
      if ($isMethod) {
        $isData = json_decode(file_get_contents('php://input'), true);
        if ($isData) {

          //print_r($data);
          if (ValidateUser::validateEmailChanged($isData))
            $data['token'] = "blank";

          $res1 = ValidateUser::validateRealm($isData);
          $res2 = ValidateUser::validateUpdateName($isData);
          $res3 = ValidateUser::validateUpdateEmail($isData);
          $isErrors = array_merge($res1, $res2, $res3);

          //print_r($res);

          if (!$isErrors) {
            $isAction = mUser::update($isData);
            if ($isAction["state"] === false) {
              $isErrors = $isAction["data"];
            } else {
              $result = $isAction["data"];
            }
          }
        }
      }
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isErrors' => $isErrors,
      'result' => $result,
    ]);
  }


  public function deleteAction($args = array())
  {

    $args['api'] = "Delete";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod(strtoupper("delete"));
      if ($isMethod) {
        $isHas = mCommon::hasTableById('user', $args["id"]);
        if ($isHas["state"] === true) {
          $isCount = mCommon::countTableById('user', $args["id"]);
          if ($isCount["state"] === true && $isCount["data"][0] > 0) {
            $isData = mCommon::delete('user', $args["id"]);
          }
        }
      }
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }


  public function loginAction($args = array())
  {

    $args['api'] = "Login";

    $isMethod = Auth::isAuthMethod('POST');
    if ($isMethod) {
      $isData = json_decode(file_get_contents('php://input'), true);
      if ($isData) {
        $isErrors = ValidateUser::validateLogin($isData['email'], $isData['psw']);
        if (!$isErrors) {
          $isUser = mUser::authenticate($isData['email'], $isData['psw']);
          if ($isUser) {
            $isUser->token = Auth::createTokenBasic($isData['email'], $isData['psw']);
            mUser::updateToken($isUser);
          }
        }
      }
    }

    Api::render($args, [
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isErrors' => $isErrors,
      'isUser' => $isUser,
    ]);
  }



  protected function after()
  {
  }
  //
  //END CLASS
}