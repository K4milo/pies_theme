<?php

/**
 * Configuracion del proyecto de pago
 *
 * @author Fabian Acero Garcia  acero01@gmail.com
 */
class Configuration {

    // WARNING: Variable que controla si el cambiente es o no produccion
    const PRODUCTION = true;
    const TEST = !self::PRODUCTION;
    const DEBUG = false;
    // PayU Url Parameters
    const API_TEST_URL = "https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi";
    const API_URL = self::PRODUCTION ? "https://api.payulatam.com/payments-api/4.0/service.cgi" : self::API_TEST_URL;
    const API_TEST_URL_QUERY = "https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi";
    const API_URL_QUERY = self::PRODUCTION ? "https://api.payulatam.com/reports-api/4.0/service.cgi" : self::API_TEST_URL_QUERY;
    const API_TEST_RECURRENT_PAYMENT = "https://sandbox.api.payulatam.com/payments-api/rest/v4.3/";
    const API_RECURRENT_PAYMENT = self::PRODUCTION ? "https://api.payulatam.com/payments-api/rest/v4.3/" : self::API_TEST_RECURRENT_PAYMENT;
    // PayU Auth Parameters
    // Nemoestudio
    /* const API_KEY = !self::PRODUCTION ? "4Vj8eK4rloUd272L48hsrarnUA" : "ES1y8W7bOfbPe7BEEF77dx8u3Z";
      const API_LOGIN = !self::PRODUCTION ? "pRRXKOl8ikMmt9u" : "6hCBvq94rA3Ddal";
      const API_PUBLIC_KEY = "PK6333j7Ux5w26Tl29E98u8nfa";
      const API_ID_COMMERCE = !self::PRODUCTION ? "508029" : "666247";
      const API_ACCOUNT_ID = !self::PRODUCTION ? "512321" : "668850"; // Colombia */
    // Pies Descalzos
    const API_KEY = !self::PRODUCTION ? "4Vj8eK4rloUd272L48hsrarnUA" : "10d85400b81";
    const API_LOGIN = !self::PRODUCTION ? "pRRXKOl8ikMmt9u" : "l1awqi845sK3LlW";
    const API_PUBLIC_KEY = "PK58eC7QhD3u341444RvU000yx";
    const API_ID_COMMERCE = !self::PRODUCTION ? "508029" : "12665";
    const API_ACCOUNT_ID = !self::PRODUCTION ? "512321" : "16635"; // Colombia 
    const API_USER_ID = !self::PRODUCTION ? "80200" : "80200";
    // Proyect params
    const LIMIT_EXPIRATION_YEARS = 16; // Limit Creditcard expiration years list
    const MIN_BIRTH_YEAR = 90; // Minimun limit to the birthdate
    const MAX_BIRTH_YEAR = 18; // Maximum limit to the birthdate
    const CURRENCY_COLOMBIA = "COP";
    const CURRENCY_USD = "USD";
    const CURRENCY_EURO = "EUR";
    const CODE_COLOMBIA = "CO";
    const CREDIT_CARD_DUES = 1;
    const POSTAL_CODE = "000000";
    const PATH_TO_SQLITE_FILE = 'db/phpsqlite.db';
    const PREFIX_PLAN = "plan-huellas-";
    const JSON_FORMAT = "json";
    // Subscription params
    const TRIAL_DAYS = 0;
    const INSTALLMENTS_NUMBER = 1;
    const IMMEDIATE_PAYMENT = true;
    // Plan params
    const PLAN_INTERVAL = "MONTH";
    const PLAN_TRIAL_DAYS = 0;
    const PLAN_INTERVAL_COUNT = "1";
    const PLAN_TAX = "0";
    const PLAN_TAX_RETURN_BASE = "0";
    const PLAN_ATTEMPTS_DELAY = "1";
    const PLAN_MAX_PAYMENTS = "12";
    const PLAN_MAX_PAYMENT_ATTEMPTS = "3";
    const PLAN_MAX_PENDING_PAYMENTS = "1";
    // View Params
    const URL_SITE = "http://www.fundacionpiesdescalzos.com/";
    const URL_TERMS = "http://fundacionpiesdescalzos.com/politica-de-tratamiento-de-datos/";
    const MAX_CREDIT_DEUS = 24;
    const SINGLE_DONATION = "unico";
    const RECURRENT_DONATION = "recurrente";
    const DEFAULT_LANGUAGE = "ES";
    const ENGLIGH_LANGUAGE = "EN";
    const DEFAULT_COUNTRY = "CO";
    const DEFAULT_CURRENCY = "USD";
    // Geolocalizacion file
    // Si es habilitado tomara las reglas creadas en la bd para pagos recurrentes.
    const ENABLE_RECURRENT_CURRENCIES = false; 
    const IP2LOCATION_FILE = "IP2LOCATION-LITE-DB1.BIN";

}
