<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
$response = array();

// if ($isToken) {
if ($isMethod) {
    if ($isHas["state"] === true) {
        if ($isCount["state"] === true && $isCount["data"][0] > 0) {
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
        $response['error'] = $isHas["data"];
    }
} else {
    header('HTTP/1.1 405 Method not allowed');
    $response['error'] = "Invalid Method";
}
// } else {
//     // There was an error
//     header('HTTP/1.1 401 Unauthorized');
//     header("WWW-Authenticate: Authorization token required !");
// }

if ('OPTIONS' === $method) {
    header('HTTP/1.1 204 No Content');
}

// Display Results
echo (json_encode($response));