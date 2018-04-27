<?php

/**
 * Modelo para la tabla de planes
 *
 * @author acero01@gmail.com
 */
class Plan extends SQLiteConnection {

    const TABLE = "bf_plans";

    private $id;
    private $name;
    private $code;
    private $remote_id;
    private $value;
    private $currency;
    private $creation;

    public function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->id;
    }

    function getRemote_id() {
        return $this->remote_id;
    }

    function setRemote_id($remote_id) {
        $this->remote_id = $remote_id;
    }

    function getCurrency() {
        return $this->currency;
    }

    function setCurrency($currency) {
        $this->currency = $currency;
    }

    function getName() {
        return $this->name;
    }

    function getCode() {
        return $this->code;
    }

    function getValue() {
        return $this->value;
    }

    function getCreation() {
        return $this->creation;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setValue($value) {
        $this->value = $value;
    }

    function setCreation($creation) {
        $this->creation = $creation;
    }

    private function fillData($stmt) {
        if ($record = $stmt->fetchObject()) {
            $this->setId($record->id);
            $this->setName($record->name);
            $this->setCode($record->code);
            $this->setRemote_id($record->remote_id);
            $this->setValue($record->value);
            $this->setCurrency($record->currency);
            $this->setCreation($record->creation);
        }
    }

    public function getAllPlans() {
        return $this->pdo->query("SELECT * FROM " . self::TABLE)->fetchAll();
    }

    public function getPlanByName($name) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE name = '{$name}'"));
        return $this;
    }

    public function getPlanByCode($code) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE code = '{$code}'"));
        return $this;
    }

    public function getPlanById($id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE id = '{$id}'"));
        return $this;
    }

    public function updatePlan($params) {

        $sql = "UPDATE " . self::TABLE . " "
                . "SET remote_id = :remote_id "
                . "WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        // passing values to the parameters
        $stmt->bindValue(':remote_id', $params["remote_id"]);
        $stmt->bindValue(':id', $params["id"]);

        return $stmt->execute();
    }

    public function createPlan($params) {

        $sql = "INSERT INTO " . self::TABLE . " (name,code,value) VALUES (:name,:code,:value)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $params["name"],
            ':code' => $params["code"],
            ':value' => $params["value"]
        ]);

        $this->getPlanById($this->pdo->lastInsertId());
    }

}
