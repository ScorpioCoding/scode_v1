<?php


if ($isMethod) {
  if ($isHas["state"] === true) {


    if ($isCount["state"] === false) {
      header('HTTP/1.1 200 OK');
      $response["success"] = false;
      $response['errors'] = $isCount["data"];
    }


    if ($isCount["state"] === true) {
      //Successfully  
      header('HTTP/1.1 200 OK');
      $response["success"] = true;
      $response['data'] = $isCount["data"][0];
    }
  } else {
    // There was an error
    header('HTTP/1.1 500 Could not execute query');
    $response['error'] = $isHas["data"];
  }
} else {
  header('HTTP/1.1 405 Method not allowed');
  $response['error'] = "Invalid Method";
}