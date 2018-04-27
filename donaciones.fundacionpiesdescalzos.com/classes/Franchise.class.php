<?php

/**
 * Description of Customer
 *
 * @author admin
 */
class Franchise extends SQLiteConnection {

    //put your code here

    const TABLE = "bf_franchise";

    private $id;
    private $name;
    private $remote_id;
    private $country;
    private $enable;

    public function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getRemote_id() {
        return $this->remote_id;
    }

    function getCountry() {
        return $this->country;
    }

    function getEnable() {
        return $this->enable;
    }

    function setRemote_id($remote_id) {
        $this->remote_id = $remote_id;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setEnable($enable) {
        $this->enable = $enable;
    }

    private function fillData($stmt) {
        if ($record = $stmt->fetchObject()) {
            $this->setId($record->id);
            $this->setName($record->name);
            $this->setCountry($record->country);
            $this->setRemote_id($record->remote_id);
            $this->setEnable($record->enable);
        }
    }

    public function getAllFranchise() {
        return $this->pdo->query("SELECT * FROM " . self::TABLE)->fetchAll();
    }

    public function getFranchiseByName($name) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE name = '{$name}'"));
    }

    public function getFranchiseByCode($code) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE code = '{$code}'"));
    }
    
    public function getFranchiseById($id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE id = '{$id}'"));
    }

    public function createFranchise($params) {

        $sql = "INSERT INTO " . self::TABLE . " (name,remote_id,country,enable) VALUES (:name,:remote_id,:country,:enable)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $params["name"],
            ':remote_id' => $params["remote_id"],
            ':country' => $params["country"],
            ':enable' => $params["enable"]
        ]);

        $this->getFranchiseById($this->pdo->lastInsertId());
    }

}
