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
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
    <!-- <link rel="stylesheet" href="css/output.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
    <title>Tableau des devises</title>
</head>

<body>
    <container class="flex items-center justify-center min-h-screen container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-xl shadow-lg border-2 border-blue-500 h-80">

                <h2 class="font-bold text-xl m-4">Convertisseur de devises</h2>
                <div class="p-2">
                    <select id="paysSelection">
                        <option value="" disabled selected>Sélectionnez un pays</option>
                    </select>
                    <div id="toggle" class="invisible h-20 mt-3 text-center">
                        <p>1€ = <span id="rate"></span></p>

                        <p>1 <span id="currentCurrency"></span> = <span id="currentInvertedRate"></span> Euro</p>
                    </div>
                    <h3>convertir : </h3>
                    <div class="flex ">
                     <input type="text" value="" id="valueToConvert" placeholder="..." class="w-12 mr-4 text-sm">
                     <select name="" id="currencyToConvert" class="mt-2 mr-4">
                        <option value="Euro">Euro</option>
                     </select>
                     <button id="convert" class="rounded border border-blue-500 shadow-sm w-6 mt-2 mr-4">=</button>               
                    <div id="convertedValue" class="mt-2">...</div>
                    </div>

                </div>
                <div class="text-xs text-gray-400 p-1">
                    <?php
                    echo $dt;
                    ?>
                </div>
            </div>

        </div>



    </container>

    <script src="tauxDeChange.js" type="module" defer></script>
    <script type="module" src="functions.js"></script>
    <script src="script.js" type="module"></script>
</body>

</html>