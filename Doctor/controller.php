<?php

require '../credential.php';
function getDoctor()
{

    global $conn;

    $query = 'SELECT * FROM doctor';

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        if (mysqli_num_rows($query_run) > 0) {

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            header('HTTP/1.0 200 Doctor Fetched Successfully');
            return json_encode($res, JSON_PRETTY_PRINT);

        } else {
            $data = [
                'status' => 404,
                'message' => 'No Doctor Found'
            ];
            header('HTTP/1.0 404 No Dcotor Found');
            return json_encode($data, JSON_PRETTY_PRINT);
        }

    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header('HTTP/1.0 500 Internal Server Error');
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}

?>