<?php
include_once 'Model/AccesDonnees.php';
include_once 'Model/Devises.php';
ini_set("display_errors", 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__).'log_errors_php.txt');
error_reporting(E_ALL);
session_start();
$data = AccesDonnees::getDevises();
$_SESSION['data'] = $data;
$pays = 'BULGARIE';
$key = array_search($pays, array_column($data, 'nomPays'));
$codeDevise = $data[$key]['codeDevise'];
$nomDevise = $data[$key]['nomDevise'];
echo $codeDevise;
echo $nomDevise;
if(isset($_SESSION['tauxDeChange']['rates'][$codeDevise])) {
    $rate = $_SESSION['tauxDeChange']['rates'][$codeDevise];
}
echo $rate;
