<?php
require_once("functions/db.php");


$response = ['status' => 'error', 'deleted_ids' => []];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['print_multipe'])) {
    foreach ($_POST['print_multipe'] as $jsonData) {
        $data = json_decode($jsonData, true);

        if (!$data) {
            continue; // skip invalid JSON
        }

        // Extract student info
        $ids = $data['id'];
        // $trms = $data['trms'];
        // $clase = $data['clase'];
        // $sectin = $data['sectin'];
        // $seisn = $data['seisn'];


        $sql = "DELETE FROM results WHERE roll_no in ('$ids')";
        $resultset = mysqli_query($con, $sql) or die("database error:" . mysqli_error($con));

        if ($resultset) {
            $response['deleted_ids'][] = $data['id'];
        }
    }
    $response['status'] = 'success';
}
header('Content-Type: application/json');
echo json_encode($response);
