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
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 60)); // 1 minute

// JSON OUTPUT
header('data-api: https://phpapi.org/crypto/');
header('data-format: json');
header('data-source: https://api.nomics.com');
header('Content-Type: application/json');
header('Content-Encoding: gzip');
echo json_encode($json);

?>
