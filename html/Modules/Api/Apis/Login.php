<?php

$allowed_domains = ['https://admin.scode.be', 'https://scode.be', 'https://www.scode.be'];

if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
  $origin = $_SERVER['HTTP_ORIGIN'];
} else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
  $origin = $_SERVER['HTTP_REFERER'];
}

if (in_array($origin, $allowed_domains)) {
  header('Access-Control-Allow-Origin: ' . $allowed_domains);
} else {
  //No HTTP_ORIGIN set, so we allow any. You can disallow if needed here
  header("Access-Control-Allow-Origin: *");
}

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 600");    // cache for 10 minutes

if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
  if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT"); //Make sure you remove those you do not want to support

  if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

  //Just exit with 200 OK with the above headers for OPTIONS method
  exit(0);
}


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



// Display Results
echo (json_encode($response));