<?php

/**
 * Description of Customer
 *
 * @author admin
 */
class CustomersCard extends SQLiteConnection {

    //put your code here

    const TABLE = "bf_customers_card";

    private $id;
    private $customer;
    private $card;

    public function __construct() {
        parent::__construct();
    }

    private function fillData($stmt) {
        if ($record = $stmt->fetchObject()) {
            $this->setId($record->id);
            $this->setCustomer($record->customer);
            $this->setCard($record->card);
        }
    }

    function getId() {
        return $this->id;
    }

    function getCustomer() {
        return $this->customer;
    }

    function getCard() {
        return $this->card;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCustomer($customer) {
        $this->customer = $customer;
    }

    function setCard($card) {
        $this->card = $card;
    }

    public function getCustomersCardByCustomer($customer_id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE customer = '{$customer_id}'"));
    }

    public function getCustomersCardById($id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE id = '{$id}'"));
    }

    public function createCustomersCard($params) {

        $sql = "INSERT INTO " . self::TABLE . " (customer,card) VALUES (:customer, :card)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':customer' => $params["customer"],
            ':card' => $params["card"]
        ]);

        $this->getCustomersCardById($this->pdo->lastInsertId());
    }

}
