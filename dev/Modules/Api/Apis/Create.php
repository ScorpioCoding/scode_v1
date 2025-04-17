<?php


//print_r("API USER/CREATE : " . $_SERVER['ORIGIN']);

// header("Access-Control-Allow-Origin: http://admin.localhost:7084");
// header("Access-Control-Allow-Credentials: true");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// Allow from any origin

$allowed_domains = ['http://admin.localhost:7082', 'admin.locahost:7082'];

// if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
//   $origin = $_SERVER['HTTP_ORIGIN'];
// } else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
//   $origin = $_SERVER['HTTP_REFERER'];
// } else {
//   $origin = $_SERVER['REMOTE_ADDR'];
// }

// if (isset($_SERVER['HTTP_ORIGIN']) && preg_match('!^http(s)?://([a-z0-9\-]+\.)?example\.com$!is', $_SERVER['HTTP_ORIGIN'])) {
//   header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
// }


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


$response = array();


//if ($isToken) {
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
// } else {
//   // There was an error
//   header('HTTP/1.1 401 Unauthorized');
//   header("WWW-Authenticate: Authorization token required !");
// }


// if ('OPTIONS' === $method) {
//   header('HTTP/1.1 204 No Content');
// }

// Display Results
echo (json_encode($response));