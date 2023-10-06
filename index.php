<?php
session_start();
//include 'Control/devisesController.php';
include_once 'Model/AccesDonnees.php';
include_once 'Model/TauxDeChange.php';
$data = AccesDonnees::getDevises();
$_SESSION['donneesPays'] =json_encode($data, JSON_UNESCAPED_UNICODE) ;
$dt = date('d/m/Y');


ini_set("display_errors", 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__).'log_errors_php.txt');
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Tableau des devises</title>
</head>

<body>
<?php
echo 'Hello, nous sommes le '.$dt ;
//var_dump($_SESSION['data']);
//var_dump($data);
?>
<br>
<h2 class="titre">Convertisseur de devises</h2>
<div class="cadre">
<!-- <label for="nomPays">Choisissez le pays</label> -->
<select id="paysSelection"  onchange="resizeDropdown();findCountryAndGetRate()">
        <option value="" disabled selected>Sélectionnez un pays</option>
    </select> 
<!-- 
    <button id="OK">OK</button> -->
<!-- <div>
    taux de conversion : 
</div> -->
<div id="toggle" class="hide">
<p>1€ = <span id="rate"></span></p>

<p  >1 <span id="currentCurrency"></span> = <span id = "currentInvertedRate"></span> Euro</p>
</div>
</div>



<script>
    const countries = <?= json_encode($_SESSION['donneesPays']); ?>
</script>
<script src="script.js"></script>   
</body>
</html>