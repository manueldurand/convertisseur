<?php
session_start();

$dt = date('d/m/Y');


// ini_set("display_errors", 1);
// ini_set('log_errors', 1);
// ini_set('error_log', dirname(__FILE__) . 'log_errors_php.txt');
// error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css" type="text/css">
    <title>Tableau des devises</title>
</head>

<body>

    <br>
    <h1 class="text-3xl font-bold underline">
    Hello!
  </h1>
  <?php
    echo 'nous sommes le ' . $dt;
    //var_dump($_SESSION['data']);
    //var_dump($data);
    ?>
    <h2 class="border-blue-500 mx-auto">Convertisseur de devises</h2>
    <div class="cadre">
        <select id="paysSelection">
            <option value="" disabled selected>Sélectionnez un pays</option>
        </select>
        <div id="toggle" class="hide mt-4">
            <p>1€ = <span id="rate"></span></p>

            <p>1 <span id="currentCurrency"></span> = <span id="currentInvertedRate"></span> Euro</p>
        </div>
    </div>

    <script src="tauxDeChange.js" type="module" defer></script>
    <script type="module" src="functions.js"></script>
    <script src="script.js" type="module"></script>
</body>

</html>