<?php

/**
 * Description of Customer
 *
 * @author admin
 */
class CreditCard extends SQLiteConnection {

    //put your code here

    const TABLE = "bf_credit_card";

    private $id;
    private $token;
    private $code;
    private $franchise;

    public function __construct() {
        parent::__construct();
    }

    private function fillData($stmt) {
        if ($record = $stmt->fetchObject()) {
            $this->setId($record->id);
            $this->setToken($record->token);
            $this->setCode($record->code);
            $this->setFranchise($record->franchise);
        }
    }

    function getId() {
        return $this->id;
    }

    function getToken() {
        return $this->token;
    }

    function getCode() {
        return $this->code;
    }

    function getFranchise() {
        return $this->franchise;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setToken($token) {
        $this->token = $token;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setFranchise($franchise) {
        $this->franchise = $franchise;
    }

    public function getCreditCardByToken($token) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE token = '{$token}'"));
        return $this;
    }

    public function getCreditCardById($id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE id = '{$id}'"));
        return $this;
    }

    public function createCreditCard($params) {

        $sql = "INSERT INTO " . self::TABLE . " (token,code,franchise) VALUES (:token, :code, :franchise)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':token' => $params["token"],
            ':code' => $params["code"],
            ':franchise' => $params["franchise"]
        ]);

        $this->getCreditCardById($this->pdo->lastInsertId());
    }

}
