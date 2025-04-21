<?php

namespace Modules\Api\Controllers;

use App\Core\Controller;
use App\Core\Api;
use App\Core\Auth;

use Modules\Api\Models\mCommon;
use Modules\Api\Models\mUser;
use Modules\Api\Utils\ValidateUser;
use Modules\Api\Utils\MailValidationEmail;

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
    $args['template'] = "Api";
    $args['page'] = "Create";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
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
            $isData['token'] = Auth::createTokenBasic($isData['email'], $isData['psw']);
            $isAction = mUser::create($isData);
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

  public function readAllAction($args = array())
  {
    $args['template'] = "Api";
    $args['page'] = "Read";
    // Extra data
    $data = array();

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
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
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }


  public function readByIdAction($args = array())
  {
    $args['template'] = "Api";
    $args['page'] = "Read";

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

    $args['template'] = "Api";
    $args['page'] = "Update";

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
            $isData['token'] = Auth::createTokenBasic($isData['email'], $isData['psw']);
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

    $args['template'] = "Api";
    $args['page'] = "Delete";

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

    $args['template'] = "Api";
    $args['page'] = "Login";

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

  public function checkAction($args = array())
  {
    $args['template'] = "Api";
    $args['page'] = "Check";

    $isMethod = Auth::isAuthMethod('GET');
    if ($isMethod) {

      $isHas = mCommon::hasTable('user');
      if ($isHas["state"] === true) {
        $isCount = mUser::countByRealm('super');
      }
    }

    Api::render($args, [
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount
    ]);
  }

  public function registerAction($args = array())
  {
    $args['template'] = "Api";
    $args['page'] = "Register";

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
          $isData['token'] = Auth::createTokenBasic($isData['email'], $isData['psw']);
          $isAction = mUser::create($isData);
          if ($isAction["state"] === false) {
            $isErrors = $isAction["data"];
          } else {
            //Send Validation Email
            $link = $_SERVER['HTTP_REFERER'] . "setup/email/validate/" . $isData['token'];
            $isMail = (new MailValidationEmail($isData['email'], $link))->execMail();
            if ($isMail['state'] === false)
              $isErrors = $isMail['data'];
            else
              $result = $isAction["data"];
          }
        }
      }
    }

    Api::render($args, [
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isErrors' => $isErrors,
      'result' => $result,
    ]);
  }

  public function updateValidateAction($args = array())
  {
    $args['template'] = "Api";
    $args['page'] = "Validate";

    $isMethod = Auth::isAuthMethod('PUT');
    if ($isMethod) {
      $isData = json_decode(file_get_contents('php://input'), true);
      if ($isData) {
        $isToken = Auth::validateTokenBasic($isData['token']);
        if ($isToken) {
          $isUser = mUser::readByToken($isData['token']);
          if ($isUser) {
            if ($isUser['state'] === true) {
              $user = $isUser['data'][0];
              $user['validate'] = '1';
              $isUpdate = mUser::updateValidate($user);
            }
          }
        }
      }
    }

    Api::render($args, [
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isToken' => $isToken,
      'isUser' => $isUser,
      'isUpdate' => $isUpdate
    ]);
  }

  protected function after()
  {
  }
  //
  //END CLASS
}