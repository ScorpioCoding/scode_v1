<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
$response = array();

if ($isMethod) {
  if ($isData) {
    if ($isErrors) {
      header('HTTP/1.1 200 OK');
      $response["success"] = false;
      $response["errors"] = $isErrors;
    } else {
      if ($isUser) {
        header('HTTP/1.1 200 OK');
        $response['success'] = true;
        $response["data"] = array(
          'auth' => 'true',
          'name' => $isUser->name,
          'email' => $isUser->email,
          'realm' => $isUser->realm,
          'token' => $isUser->token,
        );
      } else {
        header('HTTP/1.1 403 Forbidden');
        header("WWW-Authenticate: Invalid Credentials !");
      }
    }
  } else {
    header('HTTP/1.1 400 Bad Request');
    header("WWW-Authenticate: No data was provided!");
  }
} else {
  header('HTTP/1.1 405 Method not allowed');
}

if ('OPTIONS' === $method) {
  header('HTTP/1.1 204 No Content');
}

// Display Results
echo (json_encode($response));