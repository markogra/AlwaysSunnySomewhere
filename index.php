<?php

  echo "Welcome to It's always sunny somewhere". "<br>";
  echo "Get your local weather plus a ray of sun every time you login" . "<br> <br>";

$api_url = 'https://api.weatherapi.com/v1/current.json?key=03fd9754ed194c168c1150948231411&q=Paris&aqi=no';

// Read JSON file
$json_data = file_get_contents($api_url);

//echo $json_data;
// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// Check if the decoding was successful
if ($response_data === null) {
  die('Error decoding JSON');
}

// All user data exists in 'current' object
$location_data = $response_data->location;
$current_data = $response_data->current;
$condition_data = $current_data->condition;

// Cut long data into small & select only first 10 records
//$user_data = array_slice($user_data, 0, 9);

// Print data if need to debug
//print_r($current_data);
//print_r($location_data);
//print_r($condition_data);

// Display specific information
echo "City: " . $location_data->name . "<br>";
echo "Country: " . $location_data->country . "<br>";
echo "Temperature: " . $current_data->temp_c . "°C<br>";
echo "Weather: " . $condition_data->text . "<br>";

?>
