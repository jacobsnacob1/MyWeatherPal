<?php
$curl = curl_init();
$url = "https://weatherapi-com.p.rapidapi.com/forecast.json?q=".$latitude."%2C".$longitude."&days=7";
$api = $jsonData["weatherAPI_api_key"];

curl_setopt_array($curl, [
	CURLOPT_URL => $url,	
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: weatherapi-com.p.rapidapi.com",
		"x-rapidapi-key: " . $api
	],
]);

$response = curl_exec($curl);
$responseJson = json_decode($response, true);
$err = curl_error($curl);


curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;
}

?>

