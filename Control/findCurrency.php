
<?php
session_start();
ini_set("display_errors", 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__).'log_errors_php.txt');
error_reporting(E_ALL);
//récupère les données des taux de change des devises
$data = json_decode($_SESSION['donneesPays'], true) ;
//récupère le pays sélectionné dans le champ
$pays = $_POST["selectedCountry"];
//trouve les valeurs de taux de change pour le pays sélectionné
$key = array_search($pays, array_column($data, 'nomPays'));
$codeDevise = $data[$key]['codeDevise'];
$nomDevise = $data[$key]['nomDevise'];
    $rate = $_SESSION['tauxDeChange']['rates'][$codeDevise];
//renvoie les données du pays sélectionné en tableau json
$resultTable = [
    "pays" => $pays,
    "devise" => $nomDevise,
    "taux" => $rate,
    "code" => $codeDevise,
];
$jsonResult = json_encode($resultTable, JSON_UNESCAPED_UNICODE);
header('Content-Type: application/json');
echo $jsonResult;
?>   
