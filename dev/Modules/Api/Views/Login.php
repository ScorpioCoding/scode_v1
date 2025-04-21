<?php

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