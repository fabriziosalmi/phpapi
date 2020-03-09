<?php
// data source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports
error_reporting(E_ERROR);

// input filters
$input_date = htmlspecialchars($_GET["date"]);
$json = "";

// input error message
$error_message = array(
		"error" => "input error",
		"help" => "use https://phpapi.org/ncov2/?date=mm-dd-yyyy format";
		);

if ($input_date == ""){
	$json = $error_message;
	$header_api = "header('data-api: https://phpapi.org/ncov2/');";
	$header_format = "header('data-format: json');"
	$header_contenttype = "header('Content-Type: application/json');";
	echo json_encode($json);
	exit;
}

if (!isset($_GET["date"])){
	$json = $error_message;
	$header_api = "header('data-api: https://phpapi.org/ncov2/');";
	$header_format = "header('data-format: json');"
	$header_contenttype = "header('Content-Type: application/json');";	echo json_encode($json);
	exit;
}

// get data from https://github.com/CSSEGISandData/COVID-19
$url = "https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_daily_reports/".$input_date.".csv";
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

// fatality
$ratio=($dsum*100)/$sum;

// clean up temp file
unlink($temp_file);

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
header('data-source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports');
header('Content-Type: application/json');
echo json_encode($json);
?>
