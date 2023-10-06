
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cURL test</title>
</head>
<body>
    
<?php

// set API Endpoint and API key
$endpoint = 'latest';
$access_key = '82ef299e8d40fdf790a28dbcfea10dc6';

// Initialize CURL:
$ch = curl_init('http://api.exchangeratesapi.io/v1/'.$endpoint.'?access_key='.$access_key.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$exchangeRates = json_decode($json, true);
//var_dump($json);
//var_dump($exchangeRates['rates']);
// Access the exchange rate values, e.g. GBP:
//echo $exchangeRates['rates']['GBP'];
echo 'Date : '.$exchangeRates['date'];
?>
<table border="1px black">
    <thead>
        <tr>
            <th colspan="2">
                Taux de conversions
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>pays</td><td>taux</td>
        </tr>
        <?php
        foreach ($exchangeRates['rates'] as $land => $rate) :
            ?>
        <tr>
            <td><?= $land ?></td><td><?= $rate ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

    
    
    </body>
</html>
