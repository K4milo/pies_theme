<?php

namespace BareFoot;

include 'classes/pdo/SQLiteConnection.php';
include 'classes/pdo/SQLiteStructure.php';

spl_autoload_register(function($className) {
    include_once "classes/{$className}.class.php";
});

require_once dirname(__FILE__) . '/../lib/PayU.php';

/**
 * Clase de donaciones. Usa el API de \PayU
 *
 * @author Fabian Acero Garcia acero01@gmail.com
 */
class Donation {

    private $post;
    private $alertClasses;
    private $statusList;
    private $dictionary;
    private $countryCode;
    private $languageCode;
    private $currencyRules;

    const STATUS_ERROR = "ERROR";
    const STATUS_SUCCESS = "SUCCESS";
    const STATUS_WARNING = "WARNING";
    const TRANS_APPROVED = "APPROVED";
    const TRANS_DECLINED = "DECLINED";
    const TRANS_ERROR = "ERROR";
    const TRANS_EXPIRED = "EXPIRED";
    const TRANS_PENDING = "PENDING";

    public function __construct() {

        $params = $this->getParams();
        $this->setLanguageCode(\Utility::getValueFromArray($params["params"], "lang"));
        $this->_loadSiteLanguage($this->getLanguageCode());

        $countryCode = \Utility::getValueFromArray($params["params"], "country", null);
        if (empty($countryCode)) {
            $geoInfo = \Utility::getGeoLocation(\Utility::getUserIp());
            $countryCode = \Utility::getValueFromArray($geoInfo, "countryCode");
        }

        $this->setCountryCode($countryCode);

        if (method_exists($this, $params["operation"])) {
            $this->_loadCommonVars();
            $operation = $params["operation"];
            $this->post = $params = $params["params"];

            switch (sizeof($params)) {
                case 0:
                    $this->$operation();
                    break;
                case 1:
                    $this->$operation(array_values($params)[0]);
                    break;
                case 2:
                    $this->$operation(array_values($params)[0], array_values($params)[1]);
                    break;
                default:
                    call_user_func_array(array($this, $operation), $params);
                    break;
            }
        } else {
            $errorMessage = "La operacion o metodo '{$params["operation"]}' no existe";
            \Utility::writeLog($errorMessage, __LINE__, __FILE__);
            return json_encode(array("status" => self::STATUS_ERROR, "message" => $errorMessage));
        }
    }

    /**
     * Obtiene el codigo del pais actual
     * @return type
     */
    function getCountryCode() {
        return $this->countryCode;
    }

    /**
     * Setea el codigo del pais
     * @param type $countryCode
     */
    function setCountryCode($countryCode) {
        $countryCode = preg_match("/[A-Z]{2}/", $countryCode) ? $countryCode : \Configuration::DEFAULT_COUNTRY;
        $this->countryCode = $countryCode;
    }

    /**
     * Obtiene el codigo del lenguaje actual
     * @return type
     */
    function getLanguageCode() {
        return $this->languageCode;
    }

    /**
     * Setea el codigo del lenguaje
     * @param type $languageCode
     */
    function setLanguageCode($languageCode) {
        $this->languageCode = preg_match("/[A-Z]{2}/", $languageCode) ? $languageCode : \Configuration::DEFAULT_LANGUAGE;
    }

    /**
     * Gets the language dictionary 
     * @return type
     */
    public function getDictionary() {
        return $this->dictionary;
    }

    /**
     * Obtiene las reglas de moneda del pais indicado
     * @param type $countryCode
     * @return type
     */
    private function getCurrencyRules($countryCode = \Configuration::DEFAULT_COUNTRY) {
        return (new \Rules)->getRuleByCountryCode($countryCode);
    }

    /**
     * Test: Obtengo la informacion de geolocalizacion para debug
     */
    public function getGeoInfo($base = "") {

        switch ($base) {
            case "CO":
                $ip = "190.85.49.213"; // COLOMBIA
                break;
            case "AR":
                $ip = "140.191.0.0"; // ARGENTINA
                break;
            case "IT":
                $ip = "62.110.13.0"; // ITALY
                break;
            case "BR":
                $ip = "179.184.10.146"; // BRAZIL
                break;
            case "CA":
                $ip = "24.48.176.0"; // CANADA
                break;
            case "MX":
                $ip = "148.204.0.0"; // MEXICO
                break;
            default:
                $ip = \Utility::getUserIp();
                break;
        }
        $geoInfo = \Utility::getGeoLocation($ip);
        $this->printDebugResponse($geoInfo, true);
    }

    /**
     * Sets the language dictionary
     * @param type $dictionary
     */
    public function setDictionary($dictionary) {
        $this->dictionary = $dictionary;
    }

    /**
     * Carga el idioma para el contenido indicado
     * @param type $lang
     */
    private function _loadSiteLanguage($lang = "ES") {

        $langFile = "i18n/{$lang}.php";

        if (file_exists($langFile)) {
            include_once $langFile;
            $this->setDictionary($language);
        }
    }

    /**
     * Carga las variables comunes para todo el proyecto
     */
    private function _loadCommonVars() {
        $this->alertClasses = array(
            self::STATUS_SUCCESS => array("class" => "alert-success", "message" => "¡Gracias!"),
            self::STATUS_ERROR => array("class" => "alert-danger", "message" => "Lo sentimos hubo un problema"),
            self::STATUS_WARNING => array("class" => "alert-warning", "message" => "Lo sentimos hubo un problema"));

        $this->statusList = array(
            self::TRANS_APPROVED => "<strong class='approved'>Aprobada</strong>",
            self::TRANS_DECLINED => "<strong class='declined'>Declinada</strong>",
            self::TRANS_ERROR => "<strong class='error'>Error</strong>",
            self::TRANS_EXPIRED => "<strong class='expired'>Expirada</strong>",
            self::TRANS_PENDING => "<strong class='pending'>Pendiente</strong>"
        );
    }

    /**
     * Obtiene la operacion que se indique en el POST.
     * La operacion por defecto es index
     */
    private function getParams() {

        $operation = "index";
        $params = !empty($_POST) ? $_POST : $_GET;

        if (array_key_exists("operation", $params)) {
            $operation = $params["operation"];
            unset($params["operation"]);
        }

        return array("operation" => $operation, "params" => $params);
    }

    /**
     * Inicio
     */
    private function index() {

        $limitDates = array(
            "minDate" => date("d-m-Y", strtotime("-" . \Configuration::MIN_BIRTH_YEAR . " year")),
            "maxDate" => date("d-m-Y", strtotime("-" . \Configuration::MAX_BIRTH_YEAR . " year"))
        );

        $currencies = $this->getCurrencies();

        \Utility::loadView("views/donation/index.php", array(
            "deviceSessionId" => \Utility::getDeviceSessionId(),
            "currencies" => $currencies,
            "enableRecurrent" => is_array(\Utility::getValueFromArray($currencies, "recurrent")),
            "donationQuantities" => $this->getDonationQuantities(),
            "expirationDates" => $this->getExpirationDates(),
            "enrollmentTime" => $this->getEnrollmentTime(),
            "identificationTypes" => $this->getIdentificationTypes(),
            "paymentMethods" => $this->getPaymentMethods(),
            "limitDates" => $limitDates,
            "autoFill" => array(
                "isRecurrent" => \Utility::getValueFromArray($this->post, "plan") == \Configuration::RECURRENT_DONATION
            ),
            "dictionary" => $this->getDictionary()
        ));
    }

    /**
     * Ejecuta la realizacion de una donacion y muestra el thankyou page
     */
    private function makeDonation() {

        try {
            $this->startPayU();
            $alertClass = $this->alertClasses[self::STATUS_WARNING]["class"];
            $alertMessage = $this->alertClasses[self::STATUS_WARNING]["message"];
            $transactionTime = \Utility::getCurrentDate();
            $isRecurrentPayment = false;
            $transactionStatus = self::TRANS_DECLINED;
            $customersName = "";

            if ($this->post["donationType"] == \Configuration::SINGLE_DONATION) {
                $paymentResponse = $this->sendPayment();
                $transactionStatus = $paymentResponse->transactionResponse->responseCode;
                $view = ($transactionStatus != self::TRANS_APPROVED || $paymentResponse->code != self::STATUS_SUCCESS ? "error.php" : "success.php");
                //$customersName = "{$this->post["name"]}-{$this->post["lastName"]}";
                $customersName = "{$this->post["name"]}";
                $this->printDebugResponse($paymentResponse);

                if (array_key_exists("transactionResponse", $paymentResponse) && array_key_exists("operationDate", $paymentResponse->transactionResponse)) {
                    $transactionTime = date("Y-m-d H:i:s", strtotime($paymentResponse->transactionResponse->operationDate));
                }

                if (array_key_exists($paymentResponse->code, $this->alertClasses)) {
                    $alertClass = $this->alertClasses[$paymentResponse->code]["class"];
                    $alertMessage = $this->alertClasses[$paymentResponse->code]["message"];
                }

                $statusLabel = \Utility::getValueFromArray($this->statusList, $transactionStatus, $this->statusList[self::TRANS_DECLINED]);
            } else {
                $paymentResponse = $this->sendRecurrentPayment();
                $subscriptionPlan = $paymentResponse->plan;
                $subscriptionId = $paymentResponse->id;
                $view = "success.php";
                $statusLabel = $this->statusList[self::TRANS_APPROVED];
                $alertClass = $this->alertClasses[self::STATUS_SUCCESS]["class"];
                $alertMessage = $this->alertClasses[self::STATUS_SUCCESS]["message"];
                $customersName = $paymentResponse->customer->fullName;

                if (empty($subscriptionPlan) || is_null($subscriptionId)) {
                    $view = "error.php";
                    $statusLabel = $this->statusList[self::TRANS_ERROR];
                    $alertClass = $this->alertClasses[self::STATUS_ERROR]["class"];
                }
                $this->printDebugResponse($paymentResponse);
                $isRecurrentPayment = true;
            }

            if (!empty($paymentResponse) || !is_null($paymentResponse)) {
                \Utility::loadView("views/donation/{$view}", array(
                    "paymentResponse" => $paymentResponse,
                    "customersName" => $customersName,
                    "alertClass" => $alertClass,
                    "alertMessage" => $alertMessage,
                    "transactionTime" => $transactionTime,
                    "statusLabel" => $statusLabel,
                    "isRecurrentPayment" => $isRecurrentPayment,
                    "dictionary" => $this->getDictionary(),
                ));
            } else {
                $this->_goToForm();
            }
        } catch (PayUException $pex) {
            \Utility::writeLog($pex->getMessage(), __LINE__, __FILE__);
            $this->_goToForm();
        } catch (Exception $exc) {
            \Utility::writeLog($exc->getTraceAsString(), __LINE__, __FILE__);
            $this->_goToForm();
        }
    }

    /**
     * Parametros requeridos para iniciar el API
     */
    private function startPayU() {
        // Start PayU
        \PayU::$apiKey = \Configuration::API_KEY;
        \PayU::$apiLogin = \Configuration::API_LOGIN;
        \PayU::$merchantId = \Configuration::API_ID_COMMERCE;
        \PayU::$language = \SupportedLanguages::ES;
        \PayU::$isTest = \Configuration::TEST;
        // URL de Pagos
        \Environment::setPaymentsCustomUrl(\Configuration::API_URL);
        // URL de Consultas
        \Environment::setReportsCustomUrl(\Configuration::API_URL_QUERY);
        // URL de Suscripciones para Pagos Recurrentes
        \Environment::setSubscriptionsCustomUrl(\Configuration::API_RECURRENT_PAYMENT);
    }

    /**
     * Ejecuta la operacion indicada en \PayU
     * @param type $operation
     */
    private function executeOperation($operation = "ping") {

        $response = array();
        $this->startPayU();

        switch ($operation) {
            case "pay":
                $response = $this->sendPayment();
                break;
            case "paymentMethods":
                $response = \PayUPayments::getPaymentMethods(\SupportedLanguages::ES);
                break;
            default;
            case "ping":
                $response = \PayUReports::doPing();
                break;
        }

        $this->printDebugResponse($response);
    }

    /**
     * Envia una peticion de pago 
     * @return type
     */
    private function sendPayment() {

        $description = "{$this->post["name"]}-{$this->post["lastName"]}";
        $fullName = "{$this->post["name"]} {$this->post["lastName"]}";
        $donationValue = $this->post["donationQuantity"] == "other" ? $this->post["anotherQuantity"] : $this->post["donationQuantity"];

        $parameters = array(
            \PayUParameters::ACCOUNT_ID => \Configuration::API_ACCOUNT_ID,
            \PayUParameters::REFERENCE_CODE => \Utility::getPaymentReference(),
            \PayUParameters::DESCRIPTION => $description,
            // -- Valores --
            \PayUParameters::VALUE => $donationValue,
            \PayUParameters::CURRENCY => $this->post["currency"],
            // -- Comprador 
            \PayUParameters::BUYER_NAME => $fullName,
            \PayUParameters::BUYER_EMAIL => $this->post["email"],
            \PayUParameters::BUYER_CONTACT_PHONE => $this->post["cellphone"],
            \PayUParameters::BUYER_DNI => $this->post["documentNumber"],
            \PayUParameters::BUYER_STREET => $this->post["address"],
            \PayUParameters::BUYER_CITY => $this->post["city"],
            \PayUParameters::BUYER_STATE => $this->post["department"],
            \PayUParameters::BUYER_COUNTRY => \Configuration::CODE_COLOMBIA,
            \PayUParameters::BUYER_POSTAL_CODE => \Configuration::POSTAL_CODE,
            \PayUParameters::BUYER_PHONE => $this->post["cellphone"],
            // -- Pagador --
            \PayUParameters::PAYER_NAME => $this->post["name"],
            \PayUParameters::PAYER_EMAIL => $this->post["email"],
            \PayUParameters::PAYER_CONTACT_PHONE => $this->post["cellphone"],
            \PayUParameters::PAYER_DNI => $this->post["documentNumber"],
            \PayUParameters::PAYER_STREET => $this->post["address"],
            \PayUParameters::PAYER_CITY => $this->post["city"],
            \PayUParameters::PAYER_STATE => $this->post["department"],
            \PayUParameters::PAYER_COUNTRY => \Configuration::CODE_COLOMBIA,
            \PayUParameters::PAYER_POSTAL_CODE => \Configuration::POSTAL_CODE,
            \PayUParameters::PAYER_PHONE => $this->post["cellphone"],
            // -- Datos de la tarjeta de crédito -- 
            \PayUParameters::CREDIT_CARD_NUMBER => $this->post["cardNumber"],
            \PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "{$this->post["cardExpirationYear"]}/{$this->post["cardExpirationMonth"]}",
            \PayUParameters::CREDIT_CARD_SECURITY_CODE => $this->post["cardCode"],
            \PayUParameters::PAYMENT_METHOD => $this->post["cardType"],
            \PayUParameters::INSTALLMENTS_NUMBER => $this->post["creditDues"], //\Configuration::CREDIT_CARD_DUES,
            \PayUParameters::COUNTRY => \PayUCountries::CO,
            \PayUParameters::DEVICE_SESSION_ID => $this->post["deviceSessionId"],
            \PayUParameters::IP_ADDRESS => \Utility::getUserIp(),
            \PayUParameters::PAYER_COOKIE => \Utility::getSessionCookie(),
            \PayUParameters::USER_AGENT => \Utility::getUserAgent()
        );

        $this->printDebugResponse($parameters);
        // Solicitud de autorización y captura
        $response = \PayUPayments::doAuthorizationAndCapture($parameters);
        return $response;
    }

    /**
     * Envia una peticion de pago recurrente
     * @return type
     */
    private function sendRecurrentPayment() {

        $payUCustomer = $this->getCustomer();
        \Utility::writeLog($payUCustomer, __LINE__, __FILE__);
        if (!$payUCreditCard = $this->getCreditCard($payUCustomer)) {
            throw new Exception("No se obtuvo la tarjeta de credito del usuario");
        }
        \Utility::writeLog($payUCreditCard, __LINE__, __FILE__);
        $payUPlan = $this->getPlan();
        \Utility::writeLog($payUPlan, __LINE__, __FILE__);

        if ($payUPlan) {
            $customerId = $payUCustomer->getId();
            $planId = $payUPlan->getId();
            $customersPlan = $this->getCustomersPlan($customerId, $planId);
            \Utility::writeLog($customersPlan, __LINE__, __FILE__);

            if (!$customersPlan->getId()) {
                $parameters = array(
                    \PayUParameters::PLAN_CODE => $payUPlan->getCode(),
                    \PayUParameters::CUSTOMER_ID => $payUCustomer->getCustomer_id(),
                    \PayUParameters::TOKEN_ID => $payUCreditCard->getToken(),
                    \PayUParameters::TRIAL_DAYS => \Configuration::TRIAL_DAYS,
                    \PayUParameters::INSTALLMENTS_NUMBER => $this->post["creditDues"],
                    "immediatePayment" => \Configuration::IMMEDIATE_PAYMENT
                );
                $response = \PayUSubscriptions::createSubscription($parameters);
                \Utility::writeLog($response, __LINE__, __FILE__);

                if ($response) {
                    $this->insertCustomersPlan([
                        "customer" => $customerId,
                        "plan" => $planId,
                        "subscription" => $response->id,
                        "start_date" => $response->currentPeriodStart,
                        "end_date" => $response->currentPeriodEnd
                    ]);

                    return $response;
                }
            } else {
                /* $response = \PayUSubscriptions::findSubscriptionsByPlanOrCustomerOrAccount([
                  \PayUParameters::PLAN_CODE => $payUPlan->getCode()
                  ]); */
                $message = "Ya estás subscrito(a) a un plan mensual";
                \Utility::writeLog($message, __LINE__, __FILE__);
                \Utility::loadView("views/donation/success.php", array(
                    "alertClass" => $this->alertClasses[self::STATUS_SUCCESS]["class"],
                    "alertMessage" => $message,
                    "transactionTime" => \Utility::getCurrentDate(),
                    "statusLabel" => $this->statusList[self::TRANS_APPROVED],
                    "isRecurrentPayment" => $this->post["donationType"] == \Configuration::RECURRENT_DONATION,
                    "dictionary" => $this->getDictionary()));

                exit();
            }
        }
    }

    /**
     * Obtengo un cliente
     */
    private function getCustomer() {

        $customer = new \Customer();
        $customer->getCustomerByEmail($this->post["email"]);

        if (!$customer->getEmail()) {
            $this->createCustomer($customer);
        }

        return $customer;
    }

    /**
     * Crea un cliente nuevo
     */
    private function createCustomer(\Customer &$customer) {

        $parameters = array(
            \PayUParameters::CUSTOMER_NAME => "{$this->post["name"]} {$this->post["lastName"]}",
            \PayUParameters::CUSTOMER_EMAIL => $this->post["email"]
        );

        $response = \PayUCustomers::create($parameters);

        if ($response) {
            $customer->createCustomer([
                "customer_id" => $response->id,
                "name" => "{$this->post["name"]} {$this->post["lastName"]}",
                "email" => $this->post["email"]
            ]);
        }
    }

    /**
     * Obtiene las tarjetas del cliente
     * @param \Customer $customer
     * @return type
     */
    private function getCreditCard(\Customer $customer) {

        $curtomersCard = new \CustomersCard();
        $curtomersCard->getCustomersCardByCustomer($customer->getId());

        if (!$curtomersCard->getCard()) {
            $curtomersCard = $this->createCustomersCard($customer);
        }

        if (!is_null($curtomersCard)) {
            return (new \CreditCard())->getCreditCardById($curtomersCard->getCard());
        }

        return false;
    }

    /**
     * Crea una tarjeta de credito y la relaciona con el cliente
     */
    private function createCustomersCard(\Customer $customer) {

        try {

            $parameters = array(
                \PayUParameters::CUSTOMER_ID => $customer->getCustomer_id(),
                \PayUParameters::PAYER_NAME => "{$this->post["name"]} {$this->post["lastName"]}",
                \PayUParameters::CREDIT_CARD_NUMBER => $this->post["cardNumber"],
                \PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "{$this->post["cardExpirationYear"]}/{$this->post["cardExpirationMonth"]}",
                \PayUParameters::PAYMENT_METHOD => $this->post["cardType"],
                \PayUParameters::CREDIT_CARD_DOCUMENT => $this->post["documentNumber"],
                \PayUParameters::PAYER_DNI => $this->post["documentNumber"],
                \PayUParameters::PAYER_STREET => $this->post["address"],
                \PayUParameters::PAYER_CITY => $this->post["city"],
                \PayUParameters::PAYER_STATE => $this->post["department"],
                \PayUParameters::PAYER_COUNTRY => \Configuration::CODE_COLOMBIA,
                \PayUParameters::PAYER_POSTAL_CODE => \Configuration::POSTAL_CODE,
                \PayUParameters::PAYER_PHONE => $this->post["cellphone"]
            );

            $response = \PayUCreditCards::create($parameters);

            if ($response) {

                $franchise = new \Franchise();
                $franchise->getFranchiseByCode($this->post["cardType"]);

                if (!$franchise->getId()) {
                    throw new \Exception("No existe la franquicia {$this->post["cardType"]}");
                }

                $creditCard = $this->createCreditCard($response->token, $this->post["cardCode"], $franchise->getId());
                $customersCard = new \CustomersCard();
                $customersCard->createCustomersCard(["customer" => $customer->getId(), "card" => $creditCard->getId()]);

                return $customersCard;
            }
        } catch (\Exception $ex) {
            \Utility::printNotificationMessage($ex->getMessage());
        }
    }

    /**
     * Crea una tarjeta de credito con los parametros indicados
     * @param type $token Token enviado por PayU
     * @param type $cardCode Codigo de verificacion de la tarjeta
     * @param type $franchise Franquicia
     */
    private function createCreditCard($token, $cardCode, $franchise) {

        $creditCard = new \CreditCard();
        $creditCard->createCreditCard(["token" => $token, "code" => $cardCode, "franchise" => $franchise]);
        return $creditCard;
    }

    /**
     * Obtiene el plan
     * @return type
     */
    private function getPlan() {

        if (!empty($this->post["planCode"])) {

            $plan = new \Plan();
            $planSuffix = \Utility::getValueFromArray($this->post, "enrollmentTime", null);
            $planCode = !is_null($planSuffix) && $planSuffix != "none" ? "{$this->post["planCode"]}-{$planSuffix}" : $this->post["planCode"];
            $plan->getPlanByCode($planCode);

            if (!$plan->getRemote_id()) {
                $errorMessage = "Plan <strong>{$this->post["planCode"]}</strong> isn't in PayU";
                \Utility::writeLog($errorMessage, __LINE__, __FILE__);
                \Utility::loadView("views/donation/error.php", array(
                    "alertClass" => $this->alertClasses[self::STATUS_WARNING]["class"],
                    "alertMessage" => $errorMessage,
                    "transactionTime" => \Utility::getCurrentDate(),
                    "statusLabel" => $this->statusList[self::TRANS_DECLINED],
                    "isRecurrentPayment" => $this->post["donationType"] == \Configuration::RECURRENT_DONATION,
                    "dictionary" => $this->getDictionary()));
                exit();
            }

            return $plan;
        }
    }

    /**
     * Busca un plan en PayU a partir del codigo
     */
    private function getPayUPlan($planCode) {
        try {
            $parameters = array(\PayUParameters::PLAN_CODE => $planCode);
            return \PayUSubscriptionPlans::find($parameters)->id;
        } catch (\PayUException $exc) {
            \Utility::writeLog($exc->getMessage(), __LINE__, __FILE__);
        } catch (\Exception $exc) {
            \Utility::writeLog($exc->getMessage(), __LINE__, __FILE__);
        }
        return false;
    }

    /**
     * Create a PayUPlan
     * @param type $params
     * @return type
     */
    private function createPayUPlan($params) {

        try {

            $parameters = array(
                \PayUParameters::PLAN_DESCRIPTION => $params["name"],
                \PayUParameters::PLAN_CODE => $params["code"],
                \PayUParameters::PLAN_INTERVAL => \Configuration::PLAN_INTERVAL,
                \PayUParameters::PLAN_INTERVAL_COUNT => \Configuration::PLAN_INTERVAL_COUNT,
                \PayUParameters::PLAN_CURRENCY => $params["currency"],
                \PayUParameters::PLAN_VALUE => $params["value"],
                \PayUParameters::PLAN_TAX => \Configuration::PLAN_TAX,
                \PayUParameters::PLAN_TAX_RETURN_BASE => \Configuration::PLAN_TAX_RETURN_BASE,
                \PayUParameters::ACCOUNT_ID => \Configuration::API_ACCOUNT_ID,
                \PayUParameters::PLAN_ATTEMPTS_DELAY => \Configuration::PLAN_ATTEMPTS_DELAY,
                \PayUParameters::PLAN_MAX_PAYMENTS => \Configuration::PLAN_MAX_PAYMENTS,
                \PayUParameters::PLAN_MAX_PAYMENT_ATTEMPTS => \Configuration::PLAN_MAX_PAYMENT_ATTEMPTS,
                \PayUParameters::PLAN_MAX_PENDING_PAYMENTS => \Configuration::PLAN_MAX_PENDING_PAYMENTS,
                \PayUParameters::TRIAL_DAYS => \Configuration::PLAN_TRIAL_DAYS
            );

            $response = \PayUSubscriptionPlans::create($parameters);
            if ($response) {
                return $response->id;
            }
        } catch (\Exception $ex) {
            \Utility::printNotificationMessage($ex->getMessage());
        }
    }

    /**
     * Obtiene el plan relacionado al cliente
     * @param type $customerId
     * @param type $planId
     * @return type
     */
    private function getCustomersPlan($customerId, $planId) {
        $customersPlan = new \CustomersPlan();
        return $customersPlan->getCustomersPlanByCustomerAndPlan($customerId, $planId);
    }

    /**
     * Relaciona el plan con el cliente
     * @param type $customerId
     * @param type $planId
     */
    private function insertCustomersPlan($params) {
        (new \CustomersPlan())->createCustomersPlan($params);
    }

    /**
     * Devuelve los metodos de pago habilitados para las donaciones
     */
    public static function getPaymentMethods() {

        $paymentMethods = array();

        foreach ((new \Franchise())->getAllFranchise() as $franchise) {
            $paymentMethods[] = array(
                "id" => $franchise["remote_id"],
                "description" => $franchise["name"],
                "code" => $franchise["code"],
                "country" => $franchise["country"],
                "enable" => $franchise["enable"]
            );
        }

        return $paymentMethods;
    }

    /**
     * Obtengo la lista de tipos de monedas soportadas
     * @return string
     */
    private function getCurrencies() {
        $singleHasDefault = false;
        $single = "single";
        $recurrent = "recurrent";
        // Filtro las reglas por idioma
        $currencyRules = array_filter($this->getCurrencyRules($this->getCountryCode()), function($element) {
            if ($this->getLanguageCode() == \Utility::getValueFromArray($element, "language")) {
                return true;
            }
        });
        // Obtengo todos los tipos de moneda
        foreach ((new \Currency)->getAllCurrencies() as $currency) {
            $currencyCode = \Utility::getValueFromArray($currency, "code");
            $currencies[$single][$currencyCode] = array(
                "label" => $currencyCode,
                "value" => $currencyCode,
                "default" => false
            );
        }

        // Adiciono reglas - Obtengo moneda de recurrente
        foreach ($currencyRules as $rule) {

            $currencyCode = \Utility::getValueFromArray($rule, "currency");
            $isRecurrentRule = \Utility::getValueFromArray($rule, "is_recurrent");
            $level = $single;

            if (\Configuration::ENABLE_RECURRENT_CURRENCIES && $isRecurrentRule == \Rules::RECURRENT_NAME) {
                $level = $recurrent;
            } elseif ((Boolean) \Utility::getValueFromArray($rule, "is_default", false)) {
                $singleHasDefault = true;
            }

            $currencies[$level][$currencyCode] = array(
                "label" => $rule["currency"],
                "value" => $rule["currency"],
                "default" => (Boolean) $rule["is_default"]
            );
        }
        // Verifico que por lo menos venga uno por defecto
        if (!$singleHasDefault) {
            $currencies[$single][\Configuration::DEFAULT_CURRENCY]["default"] = true;
        }
        // Verifico que por lo menos valla una moneda por defecto
        usort($currencies[$single], function($a, $b) {
            return intval($a["default"]) < intval($b["default"]);
        });

        if (is_array(\Utility::getValueFromArray($currencies, $recurrent))) {

            usort($currencies[$recurrent], function($a, $b) {
                return intval($a["default"]) < intval($b["default"]);
            });
        }

        // Si no esta habilitada la opcion de monedas por recurrente, se toman 
        // las misma del simple sin euros
        if (!\Configuration::ENABLE_RECURRENT_CURRENCIES) {
            $currencies[$recurrent] = $currencies[$single];
            $currencies[$recurrent] = array_filter($currencies[$recurrent], array($this, "removeEuro"));
        }

        return $currencies;
    }

    /**
     * Remueve tipo de moneda euros
     * @param type $values
     * @param type $id
     * @return boolean}
     */
    private function removeEuro($values) {

        if (strcmp(\Configuration::CURRENCY_EURO, $values["label"]) === 0) {
            return false;
        }
        return true;
    }

    /**
     * Devuelve los metodos de pago habilitados para las donaciones
     */
    public function getDonationQuantities($currency = \Configuration::CURRENCY_COLOMBIA, $format = "php") {

        $result = array();

        $donationQuantity[] = array(
            "sign" => "$",
            "code" => \Configuration::PREFIX_PLAN . "35mil",
            "value" => 35000,
            "label" => "<span>35</span><span>mil</span>",
            "currency" => \Configuration::CURRENCY_COLOMBIA,
            "hide" => \Configuration::CURRENCY_COLOMBIA != $currency
        );

        $donationQuantity[] = array(
            "sign" => "$",
            "code" => \Configuration::PREFIX_PLAN . "50mil",
            "value" => 50000,
            "label" => "<span>50</span><span>mil</span>",
            "currency" => \Configuration::CURRENCY_COLOMBIA,
            "hide" => \Configuration::CURRENCY_COLOMBIA != $currency
        );

        $donationQuantity[] = array(
            "sign" => "$",
            "code" => \Configuration::PREFIX_PLAN . "100mil",
            "value" => 100000,
            "label" => "<span>100</span><span>mil</span>",
            "currency" => \Configuration::CURRENCY_COLOMBIA,
            "hide" => \Configuration::CURRENCY_COLOMBIA != $currency
        );

        $donationQuantity[] = array(
            "sign" => "",
            "code" => \Configuration::PREFIX_PLAN . "35USD",
            "value" => 30,
            "label" => "<span>30</span><span>USD</span>",
            "currency" => \Configuration::CURRENCY_USD,
            "hide" => \Configuration::CURRENCY_USD != $currency
        );

        $donationQuantity[] = array(
            "sign" => "",
            "code" => \Configuration::PREFIX_PLAN . "50USD",
            "value" => 50,
            "label" => "<span>50</span><span>USD</span>",
            "currency" => \Configuration::CURRENCY_USD,
            "hide" => \Configuration::CURRENCY_USD != $currency
        );

        $donationQuantity[] = array(
            "sign" => "",
            "code" => \Configuration::PREFIX_PLAN . "100USD",
            "value" => 100,
            "label" => "<span>100</span><span>USD</span>",
            "currency" => \Configuration::CURRENCY_USD,
            "hide" => \Configuration::CURRENCY_USD != $currency
        );

        $donationQuantity[] = array(
            "sign" => "&euro;",
            "code" => \Configuration::PREFIX_PLAN . "30&euro;",
            "value" => 30,
            "label" => "<span>30</span>",
            "currency" => \Configuration::CURRENCY_EURO,
            "hide" => \Configuration::CURRENCY_EURO != $currency
        );

        $donationQuantity[] = array(
            "sign" => "&euro;",
            "code" => \Configuration::PREFIX_PLAN . "50&euro;",
            "value" => 50,
            "label" => "<span>50</span>",
            "currency" => \Configuration::CURRENCY_EURO,
            "hide" => \Configuration::CURRENCY_EURO != $currency
        );

        $donationQuantity[] = array(
            "sign" => "&euro;",
            "code" => \Configuration::PREFIX_PLAN . "100&euro;",
            "value" => 100,
            "label" => "<span>100</span>",
            "currency" => \Configuration::CURRENCY_EURO,
            "hide" => \Configuration::CURRENCY_EURO != $currency
        );

        /* $result = array_filter($donationQuantity, function($arr) use ($currency) {
          if (\Utility::getValueFromArray($arr, "currency", null) == $currency) {
          return true;
          }
          }); */
        if ($format == \Configuration::JSON_FORMAT) {
            echo json_encode($donationQuantity);
        } else {
            return $donationQuantity;
        }
    }

    /**
     * Devuelve los tipos de identificacion disponibles
     * @return string
     */
    public function getIdentificationTypes() {
        $cardTypes = array();

        $cardTypes[] = array("id" => "CC", "label" => "C.C.");
        $cardTypes[] = array("id" => "CE", "label" => "C.E. (Cédula de Extranjería)");
        $cardTypes[] = array("id" => "NIT", "label" => "NIT (Número de Identificación Tributaria)");
        $cardTypes[] = array("id" => "PP", "label" => "Pasaporte");
        $cardTypes[] = array("id" => "OTHER", "label" => "Otro");

        return $cardTypes;
    }

    /**
     * Obtiene las fechas de expiracion
     * @return array
     */
    public function getExpirationDates() {

        $expirationDates = array("months" => array(), "years" => array());
        $startDate = \Utility::getCurrenTime();
        $endDate = strtotime("+ " . \Configuration::LIMIT_EXPIRATION_YEARS . " year", $startDate);
        $startDate = \Utility::formatDate($startDate, "Y");
        $endDate = \Utility::formatDate($endDate, "Y");

        // Filling Months
        for ($i = 1; $i <= 12; $i ++) {
            $expirationDates["months"][] = array("id" => str_pad($i, 2, 0, STR_PAD_LEFT), "label" => $i);
        }

        // Filling years
        for ($i = $startDate; $i <= $endDate; $i ++) {
            $expirationDates["years"][] = array("id" => $i, "label" => substr($i, 2, 2));
        }

        return $expirationDates;
    }

    /**
     * Obtiene los intervalos de tiempo de subscripcion a un plan recurrente
     * @return type
     */
    private function getEnrollmentTime() {

        $dictionary = $this->getDictionary();

        return [
            ["value" => 'indefinido', "years" => "", "label" => $dictionary["undefined"]],
            ["value" => 'none', "years" => "1", "label" => $dictionary["year"]],
            ["value" => '24meses', "years" => "2", "label" => $dictionary["years"]],
        ];
    }

    /**
     * Crea los planes que no estén creados en PayU y los actualiza en la base de datos
     */
    private function fillPayUPlans() {

        $this->startPayU();

        foreach ((new \Plan())->getAllPlans() as $plan) {
            if (empty($plan["remote_id"])) {
                $payUPlanId = $this->getPayUPlan($plan["code"]);
                if (!$payUPlanId) {
                    $payUPlanId = $this->createPayUPlan($plan);
                }
                $this->updatePlan($payUPlanId, $plan["id"]);

                \Utility::printNotificationMessage("Plan <strong>{$plan["name"]}</strong> created successfully!");
            } else {
                \Utility::printNotificationMessage("Plan <strong>{$plan["code"]}</strong> is already in PayU");
            }
        }
    }

    /**
     * Actualiza el plan en la base de datos local
     * @param type $payUPlanId
     * @param type $planId
     */
    private function updatePlan($payUPlanId, $planId) {
        (new \Plan())->updatePlan(["remote_id" => $payUPlanId, "id" => $planId]);
    }

    /**
     * Restaura la base de datos
     * @return type
     */
    private function restoreDatabase() {
        if (!\Configuration::PRODUCTION) {
            $sqlite = new \SQLiteStructure((new \SQLiteConnection())->getConnection());
            $sqlite->dropTable();
            $sqlite->createTables();
        } else {
            \Utility::printNotificationMessage("You <strong>can't</strong> restore the database in prodution!");
        }
    }

    /**
     * Imprime el resultado de las operaciones realizadas
     * en \PayU
     * @param type $response
     */
    private function printDebugResponse($response, $force = false) {

        if (\Configuration::DEBUG || $force) {
            \Utility::writeLog($response, __LINE__, __FILE__);
            echo "<pre>";
            print_r($response);
            echo "</pre>";
        }
    }

    /**
     * Envia al usuario de nuevo al formulario de pago
     */
    private function _goToForm() {
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }

}
