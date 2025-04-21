<?php


if ($isToken) {
  if ($isMethod) {
    if ($isData) {
      if ($isErrors) {
        header('HTTP/1.1 200 OK');
        $response["success"] = false;
        $response["errors"] = $isErrors;
      } else {
        header('HTTP/1.1 200 OK');
        $response["success"] = true;
        $response["data"] = $result;
      }
    } else {
      header('HTTP/1.1 400 Bad Request');
      $response['error'] = "No data was provided!";
    }
  } else {
    header('HTTP/1.1 405 Method not allowed');
    $response['error'] = "Invalid Method";
  }
} else {
  // There was an error
  header('HTTP/1.1 401 Unauthorized');
  header("WWW-Authenticate: Authorization token required !");
}