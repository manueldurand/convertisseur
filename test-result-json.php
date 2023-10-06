<?php
$resultTable = [
    "devise"=> $nomDevise,
    "taux"=> $rate,
    "code"=> $codeDevise];
$jsonResult = json_encode($resultTable);
echo $jsonResult;