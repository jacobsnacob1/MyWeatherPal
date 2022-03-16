<?php
$curl = curl_init();
$url = "https://api.ambeedata.com/latest/pollen/by-lat-lng?lat=" . $latitude . "&lng=" . $longitude;
$api = $jsonData["ambee_api_key"];

curl_setopt_array($curl, [
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"Content-type: application/json",
		"x-api-key: " . $api
	],
]);

//alt api key: 62ce9f7a2e13eb080d94a9a30103d72db8272283208e5d000d8a97d4e52828b5   both expire 15 days from 11/24, make new one before submission

$response = curl_exec($curl);
$pollenJson = json_decode($response, true);
$err = curl_error($curl);


curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;
	//echo $pollenJson['data']['0']['Risk']['tree_pollen'];
}