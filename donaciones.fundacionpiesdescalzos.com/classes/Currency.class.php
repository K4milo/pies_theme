<?php

/**
 * Description of Customer
 *
 * @author admin
 */
class Currency extends SQLiteConnection {

    //put your code here

    const TABLE = "bf_currencies";

    private $id;
    private $name;
    private $code;

    public function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCode($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    private function fillData($stmt) {
        if ($record = $stmt->fetchObject()) {
            $this->setId($record->id);
            $this->setCode($record->name);
            $this->setCountry($record->code);
        }
    }

    public function getAllCurrencies() {
        return $this->pdo->query("SELECT * FROM " . self::TABLE)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCurrencyByName($name) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE name = '{$name}'"));
    }

    public function getCurrencyByCode($code) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE code = '{$code}'"));
    }

}
