<?php
// data source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports
error_reporting(E_ERROR);
$json = "";
$date = $_GET["date"];
$country = $_GET["country"];
$url = "https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_daily_reports/".$date.".csv";
$data = file_get_contents($url);
$temp_file = uniqid(rand(), true) . '.csv';
file_put_contents($temp_file, $data);
$csv = array_map('str_getcsv', file($temp_file));

foreach ($csv as $row) {
	if ($row[1] == $_GET["country"]) {	
	
		$json = array(
			"date" => $date,
			"country" => $row[1],
			"confirmed" => round($row[3], 0),
			"recovered" => round($row[5], 0),
			"deaths" => round($row[4], 0)
		);
			// JSON OUTPUT
			header('data-api: https://phpapi.org/ncov2/');
			header('data-format: json');
			header('data-source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports');
			header('Content-Type: application/json');
			echo json_encode($json);	
	} 
}
?>
