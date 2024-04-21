<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include './controller.php';

$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method == 'GET') {
    $appoinmentHistory = getAppoinmentHistory();
    echo $appoinmentHistory;
} else {
    $data = [
        'status' => 405,
        'message' => $request_method. 'Menthod not allowed'
    ];
    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

?>