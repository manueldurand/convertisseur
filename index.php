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
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <!-- <link rel="stylesheet" href="css/output.css" type="text/css"> -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Tableau des devises</title>
</head>

<body>
    <container class="container">
        <div class="" id="form">
            <div class="">

                <h2 class="">Convertisseur de devises</h2>
                <fieldset>

                    <div class="centerdiv">
                        <select id="paysSelection" class="centerdiv">
                            <option value="" disabled selected>Sélectionnez un pays</option>
                        </select>
                </fieldset>
                    <div id="toggle" class="hide">
                        <p class="">1€ = <span id="rate" ></span></p>

                        <p class="">1 <span id="currentCurrency" ></span> = <span id="currentInvertedRate"></span> Euro</p>
                    </div>
                    <h3>convertir : </h3>
                    <fieldset>
                        <div class="centerdiv">
                         <input type="text" value="" id="valueToConvert" placeholder="..." required class="">
                         <select name="" id="currencyToConvert" class="">
                            <option value="Euro">Euro</option>
                         </select>
                    </fieldset>
                    <fieldset>
                        <button id="convert" class="">=</button>               
                    </fieldset>
                    <fieldset>
                        <div id="convertedValue" class="centerdiv">...</div>
                        </div>
                    </fieldset>

                    <div id="date" class="">
                        <?php
                        echo $dt;
                        ?> &copy;manueldurand.fr
                    </div>
                </div>
            </div>

        </div>



    </container>

    <script src="tauxDeChange.js" type="module" defer></script>
    <script type="module" src="functions.js"></script>
    <script src="script.js" type="module"></script>
</body>

</html>