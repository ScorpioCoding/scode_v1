<?php

if ($isToken) {
  if ($isMethod) {
    if ($isHas["state"] === true) {
      if ($isCount["state"] === true && $isCount["data"] > 0) {
        //Successfully  
        header('HTTP/1.1 200 OK');
        $response["success"] = true;
        $response['data'] = $isData["data"];
      } else {
        //Successfully  
        header('HTTP/1.1 200 OK');
        $response["success"] = false;
        $response['errors'] = $isData["data"];
      }
    } else {
      // There was an error
      header('HTTP/1.1 500 Could not execute query');
      $response['error'] = "Could not execute query";
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