<?php
namespace Modules\Api\Models;

use App\Core\NewException;
use App\Core\Jwt;

class mToken
{

  public static function getToken()
  {
    try {
      $payload = array(
        "userId" => "123"
      );

      $secret = "ABCabc123";

      $token = (new Jwt($secret))->encode($payload);

      return $token;

    } catch (NewException $e) {
      return "No token created";
    }
  }


  public static function decodeToken()
  {

    $testToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOiIxMjMifQ.WscZAx0BB55Io-FQHoG92pNzKAmTWPdzL8ZS3LdbsXc";

    $secret = "ABCabc123";


    $decode = (new Jwt($secret))->decode($testToken);

    return (array) $decode;

  }







}