<?php

/**
 * Clase modelo de la tabla customers_plan
 *
 * @author admin
 */
class CustomersPlan extends SQLiteConnection {

    //put your code here

    const TABLE = "bf_customers_plan";

    private $id;
    private $customer;
    private $plan;
    private $creation;

    public function __construct() {
        parent::__construct();
    }

    private function fillData($stmt) {
        if ($record = $stmt->fetchObject()) {
            $this->setId($record->id);
            $this->setCustomer($record->customer);
            $this->setPlan($record->plan);
            $this->setCreation($record->creation);
        }
    }

    function getId() {
        return $this->id;
    }

    function getCustomer() {
        return $this->customer;
    }

    function getPlan() {
        return $this->plan;
    }

    function getCreation() {
        return $this->creation;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCustomer($customer) {
        $this->customer = $customer;
    }

    function setPlan($plan) {
        $this->plan = $plan;
    }

    function setCreation($creation) {
        $this->creation = $creation;
    }

    public function getCustomersPlanByCustomer($customer_id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE customer = '{$customer_id}'"));
        return $this;
    }

    public function getCustomersPlanByCustomerAndPlan($customerId, $planId) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE customer = '{$customerId}' AND plan = '{$planId}'"));
        return $this;
    }

    public function getCustomersPlanById($id) {
        $this->fillData($this->pdo->query("SELECT * FROM " . self::TABLE . " WHERE id = '{$id}'"));
        return $this;
    }

    public function createCustomersPlan($params) {

        $sql = "INSERT INTO " . self::TABLE . " (customer,plan,subscription,start_date,end_date) "
                . "VALUES (:customer, :plan, :subscription, :start_date, :end_date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':customer' => $params["customer"],
            ':plan' => $params["plan"],
            ':subscription' => $params["subscription"],
            ':start_date' => $params["start_date"],
            ':end_date' => $params["end_date"]
        ]);

        $this->getCustomersPlanById($this->pdo->lastInsertId());
    }

}
