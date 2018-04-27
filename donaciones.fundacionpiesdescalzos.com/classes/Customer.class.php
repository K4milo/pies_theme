<?php

/**
 * Description of Customer
 *
 * @author admin
 */
class Customer extends SQLiteConnection {

    //put your code here

    const TABLE = "bf_customer";

    private $id;
    private $name;
    private $email;
    private $customer_id;
    private $creation;

    public function __construct() {
        parent::__construct();
    }

    private function fillData($stmt) {
        if ($customer = $stmt->fetchObject()) {
            $this->setId($customer->id);
            $this->setName($customer->name);
            $this->setEmail($customer->email);
            $this->setCustomer_id($customer->customer_id);
            $this->setCreation_date($customer->creation);
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCustomer_id() {
        return $this->customer_id;
    }

    public function getCreation_date() {
        return $this->creation;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
    }

    public function setCreation_date($creation) {
        $this->creation = $creation;
    }

    public function getCustomerByEmail($email) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE email = '{$email}'"));
    }

    public function getCustomerByCustomer_id($customer_id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE customer_id = '{$customer_id}'"));
    }

    public function getCustomerById($id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE id = '{$id}'"));
    }

    public function createCustomer($params) {

        $sql = "INSERT INTO " . self::TABLE . " (name,email,customer_id) VALUES (:name, :email, :customer_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $params["name"],
            ':email' => $params["email"],
            ':customer_id' => $params["customer_id"]
        ]);

        $this->getCustomerById($this->pdo->lastInsertId());
    }

}
