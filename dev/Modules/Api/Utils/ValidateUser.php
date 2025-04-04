<?php

namespace Modules\Api\Utils;

use App\Core\NewException;

use App\Api\Models\mCommon;
use Modules\Api\Models\mUser;

class ValidateUser
{


    public static function validateRealm(array $args)
    {
        $errorList = array();

        if ($args['realm'] == "")
            $errorList[] = 'Realm Required!';

        return $errorList;
    }


    public static function validateName(array $args)
    {
        $errorList = array();

        if (strlen($args['name']) < 6)
            $errorList[] = 'UserName must be more than 6 chars!';

        if (mCommon::countTableByName('user', $args['name']) > 0)
            $errorList[] = 'UserName exists';


        return $errorList;
    }

    public static function validateUpdateName(array $args)
    {
        $errorList = array();

        if (strlen($args['name']) < 6)
            $errorList[] = 'UserName must be more than 6 chars!';


        return $errorList;
    }

    public static function validateEmail(array $args)
    {
        $errorList = array();

        if (mUser::countByEmail($args['email']) > 0)
            $errorList[] = 'Email Already Exists';

        if (filter_var($args['email'], FILTER_VALIDATE_EMAIL) === false)
            $errorList[] = 'Email Invalid!';

        return $errorList;

    }
    public static function validateUpdateEmail(array $args)
    {
        $errorList = array();

        if (filter_var($args['email'], FILTER_VALIDATE_EMAIL) === false)
            $errorList[] = 'Email Invalid!';

        return $errorList;

    }

    public static function validateEmailChanged(array $args)
    {
        if (mUser::countByEmail($args['email']) > 0) {
            //$errorList[] = 'Email Already Exists';
            return true;
        } else {
            return false;
        }
    }

    public static function validatePassword(array $args)
    {
        $errorList = array();

        if ($args['psw'] == "")
            $errorList[] = 'Password required !';

        if ($args['pswConfirm'] == "")
            $errorList[] = 'Confirmation Password required !';

        if ($args['psw'] !== $args['pswConfirm'])
            $errorList[] = 'Confirmation Password must be the same as Password !';

        if (strlen($args['psw']) < 6)
            $errorList[] = 'Password must be more than 6 characters!';

        if (preg_match('/.*[a-z]+.*/i', $args['psw']) == 0)
            $errorList[] = 'Password needs at least one letter!';

        if (preg_match('/.*\d+.*/i', $args['psw']) == 0)
            $errorList[] = 'Password needs at least one number!';

        return $errorList;

    }
    public static function validateUpdatePassword($args = array()): array
    {
        $errorList = array();
        //Password   
        if ($args['psw'] == "ChangeMe01")
            $errorList[] = 'Password required !';

        return $errorList;
    }

    public static function validateLogin($args = array()): array
    {
        $errorList = array();

        //Email
        if (filter_var($args['email'], FILTER_VALIDATE_EMAIL) === false)
            $errorList[] = 'Email Invalid!';

        //Password 
        if (!mUser::authenticate($args))
            $errorList[] = 'Invalid Credentials !';

        return $errorList;
    }






    //
    //END CLASS
}