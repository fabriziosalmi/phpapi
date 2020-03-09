<?php
// data source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports
error_reporting(E_ERROR);

$json = "";
$ratio=($dsum*100)/$sum;

// process data from https://github.com/CSSEGISandData/COVID-19
$url = "https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_daily_reports/".$_GET["date"].".csv";
$data = file_get_contents($url);
$temp_file = uniqid(rand(), true) . '.csv';
file_put_contents($temp_file, $data);
$csv = array_map('str_getcsv', file($temp_file));
foreach($csv as $row) {
	$cases = $row[3];
	$dead = $row[4];
	$sum+= $cases;
	$dsum+= $dead;
   foreach($row as $k) {
   	}
}

// JSON API
$json = array(
    "date" => $_GET["date"],
    "confirmed" => $sum,
    "deaths" => $dsum,
    "ratio" => round($ratio, 3)
    );

// JSON OUTPUT
header('data-api: https://phpapi.org/ncov2/');
header('data-format: json');
header('data-request: htmlspecialchars($request)');
header('data-source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports');
header('Content-Type: application/json');
echo json_encode($json);

// clean up temp file
unlink($temp_file);
?>
