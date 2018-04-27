<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SQLiteStructure
 *
 * @author admin
 */
class SQLiteStructure {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    const DEFAULT_SCHEMA = "main";

    /**
     * connect to the SQLite database
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Crea el esquema basico para el proyecto
     */
    public function createTables() {

        $success = null;
        $commands = [
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_plans(
                id INTEGER NOT NULL PRIMARY KEY,
                name VARCHAR(255) NOT NULL UNIQUE,
                code VARCHAR(255) NOT NULL UNIQUE,
                remote_id INTEGER DEFAULT NULL,
                value INTEGER NOT NULL,
                currency VARCHAR(255) NOT NULL,
                creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )",
            "INSERT INTO " . self::DEFAULT_SCHEMA . ".bf_plans (name, code, value, currency) 
                VALUES ('Plan_Huellas_COP_35mil_12Meses', '" . Configuration::PREFIX_PLAN . "35mil', 35000, 'COP'), 
                ('Plan_Huellas_COP_50mil_12Meses', '" . Configuration::PREFIX_PLAN . "50mil', 50000, 'COP'),
                ('Plan_Huellas_COP_100mil_12Meses', '" . Configuration::PREFIX_PLAN . "100mil', 100000, 'COP'),
                ('Plan_Huellas_30USD_12Meses', '" . Configuration::PREFIX_PLAN . "35USD', 30, 'USD'), 
                ('Plan_Huellas_50USD_12Meses', '" . Configuration::PREFIX_PLAN . "50USD', 50, 'USD'),
                ('Plan_Huellas_100USD_12Meses', '" . Configuration::PREFIX_PLAN . "100USD', 100, 'USD'),
                ('Plan_Huellas_100USD_Indefinido', '" . Configuration::PREFIX_PLAN . "100USD-indefinido', 100, 'USD'),
                ('Plan_Huellas_50USD_Indefinido', '" . Configuration::PREFIX_PLAN . "50USD-indefinido', 50, 'USD'),
                ('Plan_Huellas_30USD_Indefinido', '" . Configuration::PREFIX_PLAN . "30USD-indefinido', 30, 'USD'),
                ('Plan_Huellas_COP_100Mil_Indefinido', '" . Configuration::PREFIX_PLAN . "100mil-indefinido', 100, 'COP'),
                ('Plan_Huellas_COP_50Mil_Indefinido', '" . Configuration::PREFIX_PLAN . "50mil-indefinido', 50, 'COP'),
                ('Plan_Huellas_COP_35Mil_Indefinido', '" . Configuration::PREFIX_PLAN . "35mil-indefinido', 35, 'COP'),
                ('Plan_Huellas_100USD_24Meses', '" . Configuration::PREFIX_PLAN . "100USD-24meses', 100, 'USD'),
                ('Plan_Huellas_50USD_24Meses', '" . Configuration::PREFIX_PLAN . "50USD-24meses', 50, 'USD'),
                ('Plan_Huellas_30USD_24Meses', '" . Configuration::PREFIX_PLAN . "30USD-24meses', 30, 'USD'),
                ('Plan_Huellas_COP_100Mil_24Meses', '" . Configuration::PREFIX_PLAN . "100mil-24meses', 100, 'COP'),
                ('Plan_Huellas_COP_50Mil_24Meses', '" . Configuration::PREFIX_PLAN . "50mil-24meses', 50, 'COP'),
                ('Plan_Huellas_COP_35Mil_24Meses', '" . Configuration::PREFIX_PLAN . "35mil-24meses', 35, 'COP')",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_customer (
                id INTEGER NOT NULL PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                customer_id VARCHAR(255) NOT NULL,
                creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_franchise (
                id INTEGER NOT NULL PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                code VARCHAR(255) NOT NULL,
                remote_id INTEGER NOT NULL,
                country VARCHAR(255) NOT NULL,
                enable INTEGER NOT NULL DEFAULT 1
            )",
            "INSERT INTO " . self::DEFAULT_SCHEMA . ".bf_franchise (name, code, remote_id, country) 
                VALUES ('VISA', 'VISA', 250, 'CO'), ('AMERICAN EXPRESS', 'AMEX', 12, 'CO'), ('MASTERCARD', 'MASTERCARD', 11, 'CO')",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_credit_card (
                id INTEGER NOT NULL PRIMARY KEY,
                token VARCHAR(255) NOT NULL UNIQUE,
                code INTEGER NOT NULL,
                franchise INT NOT NULL,
                FOREIGN KEY (franchise) REFERENCES bf_franchise(id) ON UPDATE CASCADE ON DELETE CASCADE
            )",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_customers_card (
                id INTEGER NOT NULL PRIMARY KEY,
                customer INTEGER NOT NULL,
                card INTEGER NOT NULL,
                FOREIGN KEY (customer) REFERENCES bf_customer(id) ON UPDATE CASCADE ON DELETE CASCADE,
                FOREIGN KEY (card) REFERENCES bf_credit_card(id) ON UPDATE CASCADE ON DELETE CASCADE
            )",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_customers_plan (
                id INTEGER NOT NULL PRIMARY KEY,
                customer INTEGER NOT NULL,
                plan INTEGER NOT NULL,
                subscription INTEGER DEFAULT NULL,
                start_date VARCHAR(255) DEFAULT NULL,
                end_date VARCHAR(255) DEFAULT NULL,
                creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (customer) REFERENCES bf_customer(id) ON UPDATE CASCADE ON DELETE CASCADE,
                FOREIGN KEY (plan) REFERENCES bf_plan(id) ON UPDATE CASCADE ON DELETE CASCADE
            )",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_currencies (
                id INTEGER NOT NULL PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                code VARCHAR(45) NOT NULL
            )",
            "INSERT INTO " . self::DEFAULT_SCHEMA . ".bf_currencies (name, code) 
                VALUES ('Pesos Colombianos', 'COP'), ('Dolares Americanos', 'USD'), ('Euros', 'EUR')",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_countries (
                id INTEGER NOT NULL PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                code VARCHAR(45) NOT NULL
            )",
            "INSERT INTO " . self::DEFAULT_SCHEMA . ".bf_countries (name, code) 
                VALUES ('Colombia', 'CO'), ('Peru', 'PE'), ('Brazil', 'BR'), ('Mexico', 'MX')",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_languages (
                id INTEGER NOT NULL PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                code VARCHAR(45) NOT NULL
            )",
            "INSERT INTO " . self::DEFAULT_SCHEMA . ".bf_languages (name, code) 
                VALUES ('Español', 'ES'), ('Ingles', 'EN')",
            "CREATE TABLE IF NOT EXISTS " . self::DEFAULT_SCHEMA . ".bf_currency_rules (
                id INTEGER NOT NULL PRIMARY KEY,
                is_recurrent INTEGER NOT NULL DEFAULT 0,
                language INTEGER NOT NULL,
                country INTEGER NOT NULL,
                currency INTEGER NOT NULL,
                is_default INTEGER NOT NULL DEFAULT 0,
                FOREIGN KEY (language) REFERENCES bf_languages(id) ON UPDATE CASCADE ON DELETE CASCADE,
                FOREIGN KEY (country) REFERENCES bf_countries(id) ON UPDATE CASCADE ON DELETE CASCADE,
                FOREIGN KEY (currency) REFERENCES bf_currencies(id) ON UPDATE CASCADE ON DELETE CASCADE
            )",
            "INSERT INTO " . self::DEFAULT_SCHEMA . ".bf_currency_rules 
                (is_recurrent, language, country, currency, is_default) 
                VALUES 
                /* Reglas Colombia */
                (1, 1, 1, 1, 1),
                (1, 1, 1, 2, 0),
                (1, 2, 1, 1, 1),
                (1, 2, 1, 2, 0),
                (0, 1, 1, 1, 1),
                (0, 2, 1, 1, 1),
                
                (1, 1, 2, 1, 0),
                (1, 2, 2, 2, 1),
                (1, 1, 3, 1, 0),
                (1, 2, 3, 2, 1),
                (1, 1, 4, 1, 0),
                (1, 2, 4, 2, 1)",
        ];

        // Execute the sql commands to create new tables
        foreach ($commands as $command) {
            if ($this->pdo->exec($command)) {
                $success = empty($success) ? true : false;
            }
        }

        if ($success) {
            echo "<strong>Database Structure Successfully Created!</strong>";
        }
    }

    /**
     * Get the table list in the database
     */
    public function getTableList() {

        $stmt = $this->pdo->query("SELECT name
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }

        return $tables;
    }

    /**
     * Borra todas las tablas de la base de datos
     */
    public function dropTable() {

        $tableList = $this->getTableList();
        foreach ($tableList as $table) {
            $command = "DROP TABLE {$table};";
            $this->pdo->exec($command);
        }
    }

}
