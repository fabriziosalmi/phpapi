<?php

// use: http(s)://PHP_HOST/covid19_stats.php?date=03-03-2020
// data source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports
error_reporting(E_ERROR);

$url = "https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_daily_reports/".$_GET["date"].".csv";
$data = file_get_contents($url);
file_put_contents("last.csv", $data);
$csv = array_map('str_getcsv', file('last.csv'));
foreach($csv as $row) {
	$cases = $row[3];
	$dead = $row[4];
	$sum+= $cases;
	$dsum+= $dead;
   foreach($row as $k) {
   	}
}

$fatality=($dsum*100)/$sum;

// JSON API
$json = array(
    "date" => $_GET["date"],
    "confirmed" => $sum,
    "deaths" => $dsum,
    "fatality" => round($fatality, 3)
    );

// JSON OUTPUT
header('data-source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports');
header('Content-Type: application/json');
echo json_encode($json);
?>
