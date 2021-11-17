<?php

class DataManager {
    private static $filename = './data.json';
    public static $START = 0;
    public static $LOWER_LIMIT = 50;
    public static $LIMIT = 299;
    public function __construct() {
    }


    public static function getJSONData($query_param_start = 0, $query_param_end = 50) {
        $_data = self::getData();

        $_result = [];

        for ($index = $query_param_start; $index <= $query_param_end; $index++) {
            $_result[$index] = $_data[$index];
        }

        $__result = json_encode($_result);
        return $__result;
    }

    public static function getJSONData2($number_of_users) {
        $_data = self::getData();

        $_result = [];

        for ($index = 0; $index < $number_of_users; $index++) {
            #making the data generated random
            $_result[$index] = $_data[self::generateRandomNumber()];
        }

        $__result = json_encode($_result);
        return $__result;
    }

    private static function getData() {
        $JSONData = file_get_contents(self::$filename);

        header('Content-type:application/json;charset-utf-8');

        $_data = json_decode($JSONData, true);

        return $_data;
    }

    private static function generateRandomNumber() {
        return rand(0, self::$LIMIT);
    }
}
