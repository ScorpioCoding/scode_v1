<?php

if ($isMethod) {
  if ($isData) {
    if ($isToken) {
      if ($isUser) {
        if ($isUpdate) {
          header('HTTP/1.1 200 OK');
          $response["success"] = true;
        } else {
          header('HTTP/1.1 200 OK');
          $response["success"] = false;
          $response["errors"] = $isUpdate['data'];
        }
      } else {
        header('HTTP/1.1 403 Forbidden');
        $response['error'] = "Invalid Token!";
      }
    } else {
      header('HTTP/1.1 401 Unauthorized');
      $response['error'] = "Invalid Token!";
    }
  } else {
    header('HTTP/1.1 400 Bad Request');
    $response['error'] = "No data was provided!";
  }
} else {
  header('HTTP/1.1 405 Method not allowed');
  $response['error'] = "Invalid Method";
}