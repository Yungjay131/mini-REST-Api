<?php
require_once './DataManager.php';
require_once './ValuesManager.php';

$valuesManager = ValuesManager::getInstance();

if ($valuesManager->check_query_get($_GET) === false) {
    echo DataManager::getJSONData();
    die();
}

if (!is_null($valuesManager->check_query_param($_GET))) {
    echo DataManager::getJSONData2($valuesManager->query_param);
    die();
}

echo DataManager::getJSONData($valuesManager->check_query_param_start($_GET), $valuesManager->check_query_param_end($_GET));
die();

echo "Working";
