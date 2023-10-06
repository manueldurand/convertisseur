<?php
    /**
     * récupère la liste des taux de change de la base de données
     * @return Array
     */
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
$data = json_decode($json, true);
$_SESSION['date'] = $data['date'];
$_SESSION['tauxDeChange'] = $data;