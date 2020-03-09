<?php

$api = "https://api.ratesapi.io/api/latest";
$data = file_get_contents($api);

// JSON OUTPUT
header('data-api: https://phpapi.org/ncov2/');
header('data-format: json');
header('data-source: https://api.ratesapi.io');
header('Content-Type: application/json');
echo json_encode($data);

?>
