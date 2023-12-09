<?php
$api_key = "DEMO_KEY";

$cache_file = 'apod_cache.json';

if (file_exists($cache_file) && time() - filemtime($cache_file) < 86400) {
    $apod_data = json_decode(file_get_contents($cache_file));
} else {
    $api_url = "https://api.nasa.gov/planetary/apod?api_key=" . urlencode($api_key);

    $ch = curl_init($api_url);
    if ($ch === false) {
        die('Erreur cURL : Impossible d\'initialiser la ressource cURL');
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        die('Erreur cURL : ' . curl_error($ch));
    }

    curl_close($ch);

    if ($response) {
        $apod_data = json_decode($response);

        if ($apod_data) {
            file_put_contents($cache_file, json_encode($apod_data));
        }
    }
}

if ($apod_data) {
    echo '<h2>Astronomy Picture of the Day</h2>';
    echo '<h3>' . $apod_data->title . '</h3>';
    echo '<p>' . $apod_data->explanation . '</p>';
    echo '<img src="' . $apod_data->url . '" alt="Astronomy Picture of the Day">';
} else {
    echo 'Impossible de récupérer l\'Astronomy Picture of the Day pour le moment.';
}
?>
