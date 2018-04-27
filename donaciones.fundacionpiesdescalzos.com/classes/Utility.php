<?php

/**
 * Clase de funciones de utilidad para la app
 *
 * @author Fabian Acero Garcia <aceor01@gmail.com>
 */
class Utility {

    /**
     * Carga la vista indicada
     * @param type $strViewPath
     * @param type $arrayOfData
     * @return type
     */
    public static function loadView($strViewPath, $arrayOfData = array()) {
        extract($arrayOfData);
        ob_start();
        require(dirname(__FILE__) . "/../{$strViewPath}");
        $strView = ob_get_contents();
        ob_end_clean();
        print $strView;
    }

    /**
     * Obtengo el identificador de referencia del proceso de pago
     * @return type
     */
    public static function getPaymentReference() {
        //return "payment_bare_feet_" . time();
        return "payment_barefoot_general" . time();
    }

    /**
     * Obtengo el session id
     * @return type
     */
    public static function getDeviceSessionId() {
        return md5(session_id() . microtime());
    }

    /**
     * Obtengo la cookie de la sesion
     */
    public static function getSessionCookie() {
        return "cookie_" . time();
    }

    /**
     * Obtengo la ip del cliente
     */
    public static function getUserIp() {
        $ipaddress = '';
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ipaddress = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ipaddress = $forward;
        } else {
            $ipaddress = $remote;
        }

        return $ipaddress;
    }

    /**
     * Obtengo el user agent del cliente
     * @return type
     */
    public static function getUserAgent() {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * Obtengo la fecha actual
     * @return type
     */
    public static function getCurrenTime() {
        return time();
    }

    /**
     * Da formato a un timestamp específico
     * @param type $date
     * @param type $format
     * @return type
     */
    public static function formatDate($date, $format = "Y-m-d") {
        return date($format, $date);
    }

    /**
     * Obtiene el valor de un arreglo en un indice indicado. Si el indice no existe, 
     * se devuelve un valor por defecto
     * @param type $array
     * @param type $index
     * @param type $default
     * @return type
     */
    public static function getValueFromArray($array, $index, $default = "") {

        return array_key_exists($index, $array) ? $array[$index] : $default;
    }

    /**
     * Obtiene el valor de un objeto en un atributo indicado. Si el atributo no existe, 
     * se devuelve un valor por defecto
     * @param type $object
     * @param type $index
     * @param type $default
     * @return type
     */
    public static function getValueFromObject($object, $index, $default = "") {

        return array_key_exists($index, $object) ? $object->$index : $default;
    }

    /**
     * Imprime un mensaje al usuario
     * @param type $type
     */
    public static function printNotificationMessage($message, $type = "error") {

        $class = "msg-{$type}";
        echo "<div class='$class'>{$message}<div>";
    }

    /**
     * Escribe un log de informacion
     */
    public static function writeLog($message, $line = "", $file = "") {
        error_log(" ::: START LOG ::: ");
        error_log("  \_ Line [{$line}], File [{$file}] => ");
        error_log("  \_ " . var_export($message, true));
        error_log(" ::: END LOG ::: ");
    }

    /**
     * Retorna la fecha actual con formato
     * @return type Date
     */
    public static function getCurrentDate() {
        return date("Y-m-d H:i:s");
    }

    /**
     * Obtiene la geolocalizacion a partir del archivo de binario mas informacion
     * https://www.ip2location.com/
     */
    public static function getGeoLocation($ip = "127.0.0.1") {
        require "vendor/autoload.php";
        $db = new \IP2Location\Database("./geodatabase/" . \Configuration::IP2LOCATION_FILE, \IP2Location\Database::FILE_IO);
        return $db->lookup($ip, \IP2Location\Database::ALL);
    }

}
