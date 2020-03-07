<?php
$coin = trim(htmlspecialchars($_GET["coin"]));
$api = "https://api.nomics.com/v1/currencies/ticker?key=24d12bc4f4b4d6d845e3c36e0422bf78&ids=".$coin;
$data = file_get_contents($api);
$decode = json_decode($data, true);
$name = $decode[0]["name"];
$currency = $decode[0]["currency"];
$price = $decode[0]["price"];
$pricedate = $decode[0]["price_date"];
$marketcap = $decode[0]["market_cap"];
$circulating_supply = $decode[0]["circulating_supply"];
// $volume = $decode[0]["volume"];

$json = array(
	"name" => $name,
	"currency" => $currency,
	"price ($)" => $price,
	"price date" => $pricedate,
	"marketcap" => $marketcap,
	"circulating supply" => $circulating_supply
//	"volume" => $volume
);

// NO CACHE
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// JSON OUTPUT
header('data-api: https://phpapi.org/crypto/');
header('data-format: json');
header('data-source: https://p.nomics.com/cryptocurrency-bitcoin-api');
header('Content-Type: application/json');
echo json_encode($json);

?>
