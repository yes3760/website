<?php

// Set up the API endpoint and parameters
$apiEndpoint = "https://api.openweathermap.org/data/2.5/forecast";
$apiParams = array(
    "q" => "London,uk", // The city name and country code
    "units" => "metric", // The temperature units (metric or imperial)
    "appid" => "your_api_key" // Your API key
);

// Build the API URL
$apiUrl = $apiEndpoint . "?" . http_build_query($apiParams);

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

// Execute the cURL request
$response = curl_exec($ch);

// Check for any cURL errors
if (curl_errno($ch)) {
    echo "cURL Error #:" . curl_error($ch);
} else {
    // Decode the JSON response
    $data = json_decode($response, true);

    // Print the forecast data
    foreach ($data['list'] as $forecast) {
        $date = date("d.m.Y", $forecast['dt']);
        $day = strtolower(date("l", $forecast['dt']));
        $icon = $forecast['weather'][0]['icon'];
        $description = ucfirst($forecast['weather'][0]['description']);
        $degree = $forecast['main']['temp'];
        $min = $forecast['main']['temp_min'];
        $max = $forecast['main']['temp_max'];
        $humidity = $forecast['main']['humidity'];

        echo "
            <tr>
                <td>{$date}</td>
                <td>{$day}</td>
                <td><img src=\"https://openweathermap.org/img/wn/{$icon}.png\" alt=\"{$description}\"></td>
                <td>{$description}</td>
                <td>{$degree}°C</td>
                <td>{$min}°C / {$max}°C</td>
                <td>{$humidity}%</td>
            </tr>
        ";
    }
}

// Close the cURL session
curl_close($ch);

?>