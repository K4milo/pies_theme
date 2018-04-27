<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Gracias</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <section class="hero-banner">
            <a href="http://www.fundacionpiesdescalzos.com/" target="_blank" class="logo">
                <img src="img/logo.png" alt="Fundación pies descalzos"/>
            </a>
            <h1><?= $alertMessage; ?></h1>
        </section>
        <?php
        if (Configuration::DEBUG) {
            echo "<pre>";
            print_r($paymentResponse);
            echo "</pre>";
        }
        ?>

        <?php if ($isRecurrentPayment): ?>
            <div class="resultMessage alert <?= $alertClass; ?> col-lg-10 col-lg-offset-1">
                <h4><?= $transactionTime; ?></h4>
                <div>
                    <ul>
                        <li>Estado: <?= $statusLabel; ?></li>
                        <li>Plan: <?= $paymentResponse->plan->description; ?></li>
                        <li>Client: <?= $paymentResponse->customer->fullName; ?></li>
                        <li>Subscription Id: <?= $paymentResponse->id; ?></li>
                    </ul>
                </div>
            </div>
        <?php else: ?>
            <div class="resultMessage alert <?= $alertClass; ?> col-lg-10 col-lg-offset-1">
                <h4><?= $transactionTime; ?></h4>
                <div>
                    <ul>
                        <li>Estado: <?= $statusLabel; ?></li>
                        <li>Orden: <?= $paymentResponse->transactionResponse->orderId; ?></li>
                        <li>Id de Transacción: <?= $paymentResponse->transactionResponse->transactionId; ?></li>
                        <?php if (Configuration::DEBUG): ?>
                            <li>Response Code: <?= $paymentResponse->transactionResponse->responseCode; ?></li>
                            <li>Trazability Code: <?= Utility::getValueFromObject($paymentResponse->transactionResponse, "trazabilityCode"); ?></li>
                            <li>Authorization Code: <?= Utility::getValueFromObject($paymentResponse->transactionResponse, "authorizationCode"); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

    </body>
</html>
