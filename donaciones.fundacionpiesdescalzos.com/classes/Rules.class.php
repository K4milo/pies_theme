<?php

/**
 * Modelo para la tabla de planes
 *
 * @author acero01@gmail.com
 */
class Rules extends SQLiteConnection {

    const TABLE = "bf_currency_rules";
    const RECURRENT = 1;
    const RECURRENT_NAME = "Recurrente";
    const SIMPLE_NAME = "Simple";

    private $id;
    private $is_recurrent;
    private $language;
    private $country;
    private $currency;
    private $is_default;

    public function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->id;
    }

    function getIs_recurrent() {
        return $this->is_recurrent;
    }

    function getLanguage() {
        return $this->language;
    }

    function getCountry() {
        return $this->country;
    }

    function getCurrency() {
        return $this->currency;
    }

    function getIs_default() {
        return $this->is_default;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIs_recurrent($is_recurrent) {
        $this->is_recurrent = $is_recurrent;
    }

    function setLanguage($language) {
        $this->language = $language;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setCurrency($currency) {
        $this->currency = $currency;
    }

    function setIs_default($is_default) {
        $this->is_default = $is_default;
    }

    private function fillData($stmt) {
        if ($record = $stmt->fetchObject()) {
            $this->setId($record->id);
            $this->setIs_recurrent($record->id_recurrent);
            $this->setLanguage($record->language);
            $this->setCountry($record->country);
            $this->setCurrency($record->currency);
            $this->setIs_default($record->is_default);
        }
    }

    public function getAllRules() {
        $localSql = "SELECT 
            r.id,
            CASE WHEN is_recurrent = " . self::RECURRENT . "
                    THEN '" . self::RECURRENT_NAME . "' 
                    ELSE '" . self::SIMPLE_NAME . "' 
            END is_recurrent, 
            c.code country, 
            l.code language, 
            cu.code currency, 
            is_default 
        FROM " . self::TABLE . " r 
        JOIN bf_countries c ON c.id = r.country 
        JOIN bf_languages l ON l.id = r.language 
        JOIN bf_currencies cu ON cu.id = r.currency";
        return $this->pdo->query($localSql)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getRuleByCountryCode($countryCode) {

        $localSql = "SELECT 
            r.id,
            CASE WHEN is_recurrent = " . self::RECURRENT . "
                    THEN '" . self::RECURRENT_NAME . "' 
                    ELSE '" . self::SIMPLE_NAME . "' 
            END is_recurrent, 
            c.code country, 
            l.code language, 
            cu.code currency, 
            is_default 
        FROM " . self::TABLE . " r 
        JOIN bf_countries c ON c.id = r.country AND c.code = '{$countryCode}'
        JOIN bf_languages l ON l.id = r.language 
        JOIN bf_currencies cu ON cu.id = r.currency";
        return $this->pdo->query($localSql)->fetchAll(\PDO::FETCH_ASSOC);
    }

}
