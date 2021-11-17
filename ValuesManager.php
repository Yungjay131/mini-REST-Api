<?php
class ValuesManager {
    /* #region Vars */
    private static ?ValuesManager $INSTANCE = null;

    public $START = 0;
    public $LOWER_LIMIT = 15;
    public $lIMIT = 299;

    public $query_get = false;
    public $query_param = null;
    public $query_param_start = 0;
    public $query_param_end = 50;
    /* #endregion */

    public static function  getInstance(): ValuesManager {
        if (self::$INSTANCE === null)
            self::$INSTANCE = new ValuesManager();

        return self::$INSTANCE;
    }

    private function __construct() {
        self::$INSTANCE = $this;
    }

    //checking if there is a GET query
    public function check_query_get($getObject): bool {
        if (sizeof($getObject) === 0 || is_null($getObject))
            $this->query_get = false;
        else
            $this->query_get = true;

        return $this->query_get;
    }
    function check_query_param($getObject): ?int {
        if (array_key_exists('users', $getObject))
            $this->query_param = $getObject['users'];
        else
            $this->query_param = null;

        return $this->query_param;
    }

    function check_query_param_start($getObject): ?int {
        if (array_key_exists('from', $getObject))
            $this->query_param_start = $getObject['from'];
        else
            $this->query_param_start = 0;

        if ($this->query_param_start < 0 || $this->query_param_start > 299)
            $this->query_param_start = 0;

        return $this->query_param_start;
    }

    function check_query_param_end($getObject): ?int {
        if (array_key_exists('to', $getObject))
            $this->query_param_end = $getObject['to'];
        else
            $this->query_param_end = 50;

        if ($this->query_param_end < 1 || $this->query_param_end > 299)
            $this->query_param_end = 50;

        return $this->query_param_end;
    }
}
