<?php

namespace Modules\Api\Utils;

use App\Core\NewException;

use Modules\Api\Models\mCommon;
use Modules\Api\Models\mUser;

class ValidateUser
{


    public static function validateRealm(string $realm)
    {
        $errorList = array();

        $realm = self::test_input($realm);

        if ($realm === "")
            $errorList[] = 'Realm Required!';

        return $errorList;
    }


    public static function validateName(string $name)
    {
        $errorList = array();

        $name = self::test_input($name);

        if ($name === "")
            $errorList[] = 'UserName Required!';


        if (strlen($name) < 3)
            $errorList[] = 'UserName must be more than 3 characters!';

        $count = mCommon::countTableByName('user', $name);
        var_dump($count);
        if ($count['state'] === true)
            if ($count['data'][0] > 0)
                $errorList[] = 'UserName exists';
        if ($count['state'] === false)
            $errorList[] = $count['data'];


        return $errorList;
    }

    public static function validateUpdateName(string $name)
    {
        $errorList = array();

        $name = self::test_input($name);

        if (strlen($name) < 6)
            $errorList[] = 'UserName must be more than 6 chars!';


        return $errorList;
    }

    public static function validateEmail(string $email)
    {
        $errorList = array();

        $email = self::test_input($email);

        $count = mUser::countByEmail($email);
        if ($count['state'] === true)
            if ($count['data'][0] > 0)
                $errorList[] = 'Email Already Exists';
        if ($count['state'] === false)
            $errorList[] = $count['data'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
            $errorList[] = 'Email Invalid!';

        return $errorList;

    }
    public static function validateUpdateEmail(string $email)
    {
        $errorList = array();

        $email = self::test_input($email);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
            $errorList[] = 'Email Invalid!';

        return $errorList;

    }

    public static function validateEmailChanged(string $email)
    {
        $email = self::test_input($email);

        $count = mUser::countByEmail($email);
        if ($count['state'] === true)
            if ($count['data'][0] > 0)
                return true;
            else
                return false;
    }

    public static function validatePassword(string $psw, string $pswConfirm)
    {
        $errorList = array();

        $psw = self::test_input($psw);
        $pswConfirm = self::test_input($pswConfirm);

        if ($psw === "")
            $errorList[] = 'Password required !';

        if ($pswConfirm === "")
            $errorList[] = 'Confirmation Password required !';

        if ($psw !== $pswConfirm)
            $errorList[] = 'Confirmation Password must be the same as Password !';

        if (strlen($psw) < 6)
            $errorList[] = 'Password must be more than 6 characters!';

        if (preg_match('/.*[a-z]+.*/i', $psw) == 0)
            $errorList[] = 'Password needs at least one letter!';

        if (preg_match('/.*\d+.*/i', $psw) == 0)
            $errorList[] = 'Password needs at least one number!';

        return $errorList;

    }
    public static function validateUpdatePassword(string $psw): array
    {
        $errorList = array();

        $psw = self::test_input($psw);

        //Password   
        if ($psw == "ChangeMe01")
            $errorList[] = 'Password required !';

        return $errorList;
    }

    public static function validateLogin(string $email, string $psw): array
    {
        $errorList = array();

        $psw = self::test_input($psw);
        $email = self::test_input($email);

        //Email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
            $errorList[] = 'Email Invalid!';

        //Password 
        if (!mUser::authenticate($email, $psw))
            $errorList[] = 'Invalid Credentials !';

        return $errorList;
    }


    private static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    //
    //END CLASS
}