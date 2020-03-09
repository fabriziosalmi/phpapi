<?php
// data source: https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports
error_reporting(E_ERROR);

// input filters
$json = "";

if ($_GET["date"] == ""){
	$json = array(
		"error" => "input error",
		"help" => "use https://phpapi.org/ncov2/?date=mm-dd-yyyy format
		);
	// JSON OUTPUT
	header('data-api: https://phpapi.org/ncov2/');
	header('data-format: json');
	header('Content-Type: application/json');
	echo json_encode($json);
	exit;
}

if (!isset($_GET["date"])){
	$json = array(
		"error" => "input error",
		"help" => "use https://phpapi.org/ncov2/?date=mm-dd-yyyy format
		);	// JSON OUTPUT
	header('data-api: https://phpapi.org/ncov2/');
	header('data-format: json');
	header('Content-Type: application/json');
	echo json_encode($json);
	exit;
}

// check date
$input_date = htmlspecialchars($_GET["date"]);
if (checkdate($input_date) == false) {
	$json = array(
		"error" => "input error",
		"help" => "use https://phpapi.org/ncov2/?date=mm-dd-yyyy format
		);	// JSON OUTPUT
	header('data-api: https://phpapi.org/ncov2/');
	header('data-format: json');
	header('Content-Type: application/json');
	echo json_encode($json);
	exit;
} 

$regex = "/^(((0[13578]|1[02])\-(0[1-9]|[12]\d|3[01])\-((19|[2-9]\d)\d{2}))|((0[13456789]|1[012])\-(0[1-9]|[12]\d|30)\-((19|[2-9]\d)\d{2}))|(02\-(0[1-9]|1\d|2[0-8])\-((19|[2-9]\d)\d{2}))|(02\-29\-((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/";

if (preg_match($regex, $input_date, $matches)){
    return true;
}
else {
    return false;
    $output = 0;
	$json = array(
		"error" => "input error",
		"help" => "use https://phpapi.org/ncov2/?date=mm-dd-yyyy format
		);	// JSON OUTPUT
	header('data-api: https://phpapi.org/ncov2/');
	header('data-format: json');
	header('Content-Type: application/json');
	echo json_encode($json);
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
