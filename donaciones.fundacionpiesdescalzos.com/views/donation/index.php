<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Formulario de Donaciones - Fundacion Pies Descalzos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="57x57" href="favicon.ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicon.ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicon.ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicon.ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicon.ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicon.ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicon.ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicon.ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon.ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="favicon.ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon.ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico/favicon-16x16.png">
        <link rel="manifest" href="favicon.ico/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="favicon.ico/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

    <p class="meta-payu" style="background:url(https://maf.pagosonline.net/ws/fp?id=$<?= $deviceSessionId ?><?= Configuration::API_USER_ID ?>)"></p>
    <img class="meta-payu" src="https://maf.pagosonline.net/ws/fp/clear.png?id=$<?= $deviceSessionId ?><?= Configuration::API_USER_ID ?>">
    <script src="https://maf.pagosonline.net/ws/fp/check.js?id=$<?= $deviceSessionId ?><?= Configuration::API_USER_ID ?>"></script>
    <object class="meta-payu" type="application/x-shockwave-flash" data="https://maf.pagosonline.net/ws/fp/fp.swf?id=$<?= $deviceSessionId ?><?= Configuration::API_USER_ID ?>" width="1" height="1" id="thm_fp">
        <param name="movie" value="https://maf.pagosonline.net/ws/fp/fp.swf?id=$<?= $deviceSessionId ?><?= Configuration::API_USER_ID ?>" />
    </object>

    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="css/styles.css" />

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
    <div class="form-error alert alert-danger alert-dismissible hide" role="alert">
        <strong>¡Error! </strong><span id="errorMessage"></span>
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Main jumbotron for a primary marketing message or call to action -->

    <section class="hero-banner">
        <a href="http://www.fundacionpiesdescalzos.com/" target="_blank" class="logo">
            <img src="img/logo.png" alt="Fundación pies descalzos"/>
        </a>
        <h1><?= $dictionary["bannerTitle"] ?></h1>
    </section>

    <div class="container no-gutter">
        <!-- Example row of columns -->
        <div class="row">
            <div class="impact-items">
                <header>
                    <h2><?= $dictionary["bannerSubTitle"]; ?></h2>
                </header>
                <div class="col-md-3 item">
                    <figure>
                        <img src="img/couple.png" alt="shakira impacto" />
                    </figure>
                    <div class="text-body">
                        <p><?= $dictionary["moreThan"]; ?></p>
                        <p><strong>77.000</strong></p>
                        <p><?= $dictionary["beneficiaries"]; ?></p>
                    </div>
                </div>

                <div class="col-md-3 item">
                    <figure>
                        <img src="img/tools.png" alt="shakira impacto">
                    </figure>
                    <div class="text-body">
                        <p><?= $dictionary["moreThan"]; ?></p>
                        <p><b>30.000</b></p>
                        <p><?= $dictionary["constructedMeters"]; ?></p>
                    </div>
                </div>

                <div class="col-md-3 item">
                    <figure>
                        <img src="img/give.png" alt="shakira impacto">
                    </figure>
                    <div class="text-body">
                        <p><?= $dictionary["moreThan"]; ?></p>
                        <p><strong>500</strong></p>
                        <p><?= $dictionary["donors"]; ?></p>
                    </div>
                </div>

                <div class="col-md-3 item">
                    <figure>
                        <img src="img/share.png" alt="shakira impacto">
                    </figure>
                    <div class="text-body">
                        <p><?= $dictionary["moreThan"]; ?></p>
                        <p><b>300</b></p>
                        <p><?= $dictionary["partners"]; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-container">
                <form id="formGateway" method="post" action="" class="no-gutter">
                    <input type="hidden" id="planCode" name="planCode" value="" />
                    <input type="hidden" name="deviceSessionId" value="<?= $deviceSessionId ?>" />
                    <fieldset class="form-left col-md-7">
                        <header>
                            <h3><?= $dictionary["formTitle"]; ?></h3>
                        </header>
                        <p>
                            <input type="text" name="name" placeholder="<?= $dictionary["name"]; ?>" class="field field-1" style="color: green" required />
                            <input type="text" name="lastName" placeholder="<?= $dictionary["lastName"]; ?>" class="field field-2"  required />
                        </p>
                        <p>
                            <input type="email" name="email" placeholder="<?= $dictionary["email"]; ?>" class="field field-3" style="color: green" required />
                            <input type="text" name="cellphone" placeholder="<?= $dictionary["phone"]; ?>" class="field field-4" />
                        </p>
                        <!--p>
                            <select class="field field-5" name="<?= $dictionary["documentType"]; ?>" >
                                <option value="" disabled selected><?= $dictionary["documentType"]; ?></option>
                                <?php foreach ($identificationTypes as $idTypes): ?>
                                    <option value="<?= $idTypes["id"]; ?>"><?= $idTypes["label"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="documentNumber" placeholder="Número de documento" class="field number field-6" minlength="9" />
                        </p-->
                        <p>
                            <label for="birthdate"><?= $dictionary["birthDate"]; ?></label>
                            <input type="text" name="birthdate" class="field field-7" placeholder="dd/mm/aaaa" min="<?= $limitDates["minDate"]; ?>" max="<?= $limitDates["maxDate"]; ?>"/>
                        </p>
                        <p>
                            <input type="text" name="address" placeholder="<?= $dictionary["address"]; ?>" class="field field-8" />
                        </p>
                        <p>
                            <input type="text" name="department" placeholder="<?= $dictionary["state"]; ?>" class="field field-9" />
                            <input type="text" name="city" placeholder="<?= $dictionary["city"]; ?>" class="field field-10" />
                        </p>
                        <p class="check-btn">
                            <input type="checkbox" name="acceptTerms" value="YES" class="field" required>
                            <label for="accept"><a href="<?= Configuration::URL_TERMS; ?>" target="_blank"><?= $dictionary["agreement"]; ?></a></label>
                        </p>
                    </fieldset>

                    <fieldset class="form-right col-md-5">

                        <div class="parent-radios the-first">
                            <strong><?= $dictionary["donationType"]; ?></strong>
                            <div class="don-type">
                                <input type="radio" name="donationType" value="<?= \Configuration::SINGLE_DONATION; ?>"  <?= !$autoFill["isRecurrent"] ? "checked" : ''; ?>/>
                                <label for="donationType" <?= !$autoFill["isRecurrent"] ? "class='active'" : ''; ?>><i></i><span><?= $dictionary["leave"]; ?></span><b><?= $dictionary["once"]; ?></b></label>
                            </div>

                            <div class="don-type">
                                <input type="radio" name="donationType" value="<?= \Configuration::RECURRENT_DONATION; ?>"  <?= $autoFill["isRecurrent"] ? "checked" : ''; ?> data-enabled-recurrent="<?= (int) $enableRecurrent; ?>"/>
                                <label for="donationType" <?= $autoFill["isRecurrent"] ? "class='active'" : ''; ?> ><i></i><span><?= $dictionary["leave"]; ?></span><b><?= $dictionary["monthly"]; ?></b></label>
                            </div>
                        </div>

                        <p class="currency">
                            <strong><?= $dictionary["currency"]; ?></strong>
                            <select class="field field-sm single valid" name="currency" aria-invalid="false">
                                <?php foreach ($currencies["single"] as $currency => $info): ?>
                                    <option value="<?= $info["value"]; ?>"><?= $info["label"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if ($enableRecurrent): ?>
                                <select class="field field-sm valid recurrent hide" name="currency" aria-invalid="false" disabled>
                                    <?php foreach ($currencies["recurrent"] as $currency => $info): ?>
                                        <option value="<?= $info["value"]; ?>"><?= $info["label"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else: ?>
                            <div class="field field-sm valid recurrent hide donation-not-available" data-name="currency">
                                <span><?= $dictionary["donationNotAvailable"]; ?></span>
                            </div>
                        <?php endif; ?>
                        </p>

                        <div class="parent-radios">
                            <strong><?= $dictionary["donationAmount"]; ?></strong>
                            <div class="ammount-container">
                                <?php foreach ($donationQuantities as $donationQt): ?>
                                    <div class="ammount-type <?= $donationQt["currency"]; ?> <?= $donationQt["hide"] ? 'hide' : ''; ?>">
                                        <input type="radio" data-code="<?= $donationQt["code"]; ?>" name="donationQuantity" value="<?= $donationQt["value"]; ?>"  />
                                        <label for="donationType"><i><?= $donationQt["sign"]; ?></i>
                                            <div class="the-numbers">
                                                <?= $donationQt["label"]; ?>
                                            </div>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                                <div class="ammount-type another">
                                    <input type="radio" name="donationQuantity" class="other" value="other"  <?= $autoFill["isRecurrent"] ? "disabled" : ''; ?>/>
                                    <label for="donationType"><?= $dictionary["anotherValue"]; ?></label>
                                </div>
                            </div>
                        </div>

                        <p class="other-value">
                            <strong><?= $dictionary["specifyValue"]; ?></strong>
                            <input type="text" class="field number" name="anotherQuantity" >
                        </p>

                        <p class="logo-field">
                            <strong><?= $dictionary["paymentMethod"]; ?></strong>
                            <select class="payment-method-select field" name="cardType"  aria-invalid="false">
                                <?php foreach ($paymentMethods as $payment): ?>
                                    <option value="<?= $payment["code"] ?>"><?= $payment["description"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <p>
                            <strong><?= $dictionary["cardNumber"]; ?></strong>
                            <input type="text" class="field number creditCard" name="cardNumber" style="color: #003399"  size="17" maxlength="16" autocomplete="off" <?= Configuration::PRODUCTION ? 'onpaste="return false;"' : ''; ?> required>
                        </p>

                        <p>
                            <strong><?= $dictionary["cardHolder"]; ?></strong>
                            <input type="text" class="field" tyle="color: #003399" name="cardOwner" required>
                        </p>

                        <p>
                            <strong><?= $dictionary["verificationNumber"]; ?></strong>
                            <input type="text" class="field number" name="cardCode"  size="4" maxlength="4" required>
                        </p>

                        <p>
                            <strong class="single"><?= $dictionary["feesNumber"]; ?></strong>
                            <select class="field single field-sm valid" name="creditDues" aria-invalid="false" required>
                                <option value="" disabled selected><?= $dictionary["fees"]; ?></option>
                                <?php for ($j = 1; $j <= Configuration::MAX_CREDIT_DEUS; $j++): ?>
                                    <option value="<?= $j ?>"><?= $j ?></option>
                                <?php endfor; ?>
                            </select>
                            
                            <input type="hidden" value="1" name="creditDues" class="recurrent" disabled/>
                        </p>

                        <p>
                            <strong><?= $dictionary["dueDate"]; ?></strong>
                            <select class="field field-sm" name="cardExpirationMonth" required>
                                <option value="" disabled selected><?= $dictionary["month"]; ?></option>
                                <?php foreach ($expirationDates["months"] as $month): ?>
                                    <option value="<?= $month["id"] ?>"><?= $month["label"] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="field field-sm" name="cardExpirationYear" required>
                                <option value="" disabled selected><?= $dictionary["year"]; ?>-</option>
                                <?php foreach ($expirationDates["years"] as $year): ?>
                                    <option value="<?= $year["id"] ?>"><?= $year["label"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <p>
                            <strong class="recurrent hide"><?= $dictionary["subscriptionTime"]; ?></strong>
                            <select class="field field-md recurrent hide" name="enrollmentTime"  disabled>
                                <?php foreach ($enrollmentTime as $enrollment): ?>
                                    <option value="<?= $enrollment["value"] ?>"><?= "{$enrollment["years"]} {$enrollment["label"]}" ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <p>
                            <input type="submit" value="<?= $dictionary["submitLabel"]; ?>">
                        </p>

                    </fieldset>
                </form>
            </div>
        </div>
    </div> <!-- /container -->

    <?php Utility::loadView("views/donation/footer.php"); ?>
</body>
</html>
