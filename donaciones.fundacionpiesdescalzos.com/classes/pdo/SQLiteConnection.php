<?php

/**
 * Description of SQLiteConnection
 *
 * @author admin
 */
class SQLiteConnection {

    /**
     * PDO instance
     * @var type 
     */
    protected $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function __construct() {
        if ($this->pdo == null) {
            try {
                $this->pdo = new \PDO("sqlite:" . \Configuration::PATH_TO_SQLITE_FILE);
            } catch (Exception $ex) {
                \Utility::printNotificationMessage($ex->getMessage());
            }
        }
    }
    
    /**
     * Obtiene la conexion
     * @return type
     */
    public function getConnection(){
        return $this->pdo;
    }

}
