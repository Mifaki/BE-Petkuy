<?php

require '../credential.php';
function getAppoinmentHistory()
{

    global $conn;

    $query = 'SELECT ah.*, d.name AS doctor_name, d.category AS doctor_category, d.hospital_address AS doctor_hospital_address FROM appoinment_history AS ah INNER JOIN doctor AS d ON ah.doctor_id = d.id';

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        if (mysqli_num_rows($query_run) > 0) {

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            foreach ($res as &$row) {
                unset($row['doctor_id']);
            }
            
            header('HTTP/1.0 200 Appoinment History Fetched Successfully');
            return json_encode($res, JSON_PRETTY_PRINT);

        } else {
            $data = [
                'status' => 404,
                'message' => 'No Appoinment History Found'
            ];
            header('HTTP/1.0 404 No Appoinment History Found');
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