<html class=" js flexbox canvas canvastext webgl no-touch 
      geolocation postmessage websqldatabase indexeddb hashchange history 
      draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage 
      borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients 
      cssreflections csstransforms csstransforms3d csstransitions fontface 
      generatedcontent video audio localstorage sessionstorage webworkers 
      applicationcache svg inlinesvg smil svgclippaths" lang="" style="">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?= $dictionary["oops"]; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styles.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script><style>@media print {#ghostery-purple-box {display:none !important}}</style>
    </head>
    <body class="success">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Main jumbotron for a primary marketing message or call to action -->

        <section class="hero-banner response response-error">
            <a href="<?= Configuration::URL_SITE; ?>" target="_blank" class="logo">
                <img src="img/logo.png" alt="Fundación pies descalzos">
            </a>
            <h1><?= $dictionary["oops"]; ?><span><?= $customersName; ?></span></h1>
        </section>
        <div class="container no-gutter">
            <!-- Example row of columns -->
            <div class="row">
                <div class="internal-copy error-copy">
                    <img src="img/icn_error.png" alt="fundación pies descalzos">
                    <h2><?= $dictionary["errorMessage"]; ?></h2>
                </div>
            </div>
            <!-- Example row of columns -->
            <div class="row">
                <div class="container top-copy error-response">
                    <h3><?= $transactionTime; ?></h3>
                    <ul>
                        <li><?= $dictionary["status"]; ?>: <strong><?= $statusLabel; ?></strong></li>
                        <?php if (isset($paymentResponse) && array_key_exists("transactionResponse", $paymentResponse)): ?>
                            <li><?= $dictionary["order"]; ?>: <?= $paymentResponse->transactionResponse->orderId; ?></li>
                            <li><?= $dictionary["transactionId"]; ?>: <?= $paymentResponse->transactionResponse->transactionId; ?></li>
                            <?php if (Configuration::DEBUG): ?>
                                <li>Response Code: <?= $paymentResponse->transactionResponse->responseCode; ?></li>
                                <li>Trazability Code: <?= Utility::getValueFromObject($paymentResponse->transactionResponse, "trazabilityCode"); ?></li>
                                <li>Authorization Code: <?= Utility::getValueFromObject($paymentResponse->transactionResponse, "authorizationCode"); ?></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li><?= $alertMessage; ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div> <!-- /container -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>


    </body>
</html>