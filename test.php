<?php
echo '<pre>';
var_dump($_GET);
echo '</pre>';

echo getcwd();
echo $_SERVER['DOCUMENT_ROOT'];

$condition = !is_null($_GET);
echo $condition;
