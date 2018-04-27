var jq = jQuery.noConflict();
var RADIO_TYPE = "radio";
var ERROR_CLASS = "error";
var SUCCESS_CLASS = "success";
var PAYMENT_FORM = "#formGateway";
var CHECK_DONATIONTYPE = "donationType";
var RECURRENT_PAYMENT = "recurrente";
var CLASS_HIDE = "hide";
var CLASS_ANOTHER = "another";
var DEFAULT_DONATION_VALUE = 100000;

(function ($) {
    // evento de ckecked para labels
    var theCheck = jq('input[type="radio"]');
    //var theCheck = jq("input[name='donationType']");

    theCheck.each(function (index, el) {
        var thisCheck = jq(this);
        var parentRadio = thisCheck.parent().parent().find('input[type="radio"]');

        thisCheck.on('change', function (event) {
            //event.preventDefault();
            var $this = jq(this);
            validateRestrictions($this);
            var tempPlanCode = $this.attr("data-code");
            
            if(typeof tempPlanCode != 'undefined'){
                jq("#planCode").val(tempPlanCode);
            }
            
            if ($this.is(':checked') && $this.hasClass('other')) {
                jq('.other-value').show(300);
            } else {
                jq('.other-value').hide(300);
            }

            parentRadio.next('label').removeClass('active');
            if (jq(this).is(':checked')) {
                jq(this).next('label').addClass('active');
            }
        });

        if (jq(this).is(":checked")) {
            thisCheck.trigger("change");
            setTimeout(function () {
                jq("select[name='currency']:enabled").trigger("change");
            },500);
        }

    });
    jq("button.close").click(function () {
        jq(this).parents(".alert").addClass("hide");
    });
    if (jq(PAYMENT_FORM).length > 0) {
        setFormValidation();
    }

    jq("input.number, input.numberonly").keypress(function (event) {
        return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 0;
    });
    jq("select[name='currency']").change(function () {

        var currency = jq(this).val();
        jq(".ammount-type").each(function () {
            if (!jq(this).hasClass(currency) && !jq(this).hasClass(CLASS_ANOTHER)) {
                jq(this).addClass(CLASS_HIDE);
            } else {
                jq(this).removeClass(CLASS_HIDE);
            }
        });
    });
    jq("select[name='cardExpirationMonth']").change(function () {
        var selectedMonth = jq(this).val();
        var enableCurrentMonth = true;
        if (parseInt(selectedMonth) < parseInt(new Date().getMonth() + 1)) {
            enableCurrentMonth = false;
        }

        enableDisableYear(new Date().getFullYear(), enableCurrentMonth);
    });
})(jQuery);

function enableDisableYear(year, enable) {
    jq("select[name='cardExpirationYear'] > option").each(function () {

        if (jq(this).val().length > 0 && parseInt(jq(this).val()) === parseInt(year)) {

            if (!enable) {
                jq(this).attr("disabled", "disabled").prop("disabled", true);
            } else {
                jq(this).removeAttr("disabled").prop("disabled", false);
            }
            return false;
        }
    });
}

function validateRestrictions(component) {

    if (component.attr("name") == CHECK_DONATIONTYPE) {
        if (component.val() == RECURRENT_PAYMENT) {

            var enabledRecurrent = component.attr("data-enabled-recurrent");
            if (typeof enabledRecurrent != 'undefined') {
                if (parseInt(enabledRecurrent) === 0) {
                    jq(PAYMENT_FORM + " input:not(input[name='" + CHECK_DONATIONTYPE + "'])")
                            .attr("disabled", "disabled")
                            .prop("disabled", true);
                }
            }

            jq(".recurrent, select[class*='recurrent'][name='currency'], div[class*='recurrent'][data-name='currency']")
                    .removeAttr("disabled")
                    .prop("disabled", false)
                    .removeClass("hide");
            jq(".single, select[class*='single'][name='currency']")
                    .attr("disabled", "disabled")
                    .prop("disabled", true)
                    .addClass("hide");
            jq("input[name='donationQuantity'][class='other']")
                    .attr("disabled", "disabled")
                    .prop("disabled", true)
                    .parent().addClass("hide");
            jq("input[name='donationQuantity'][value='" + DEFAULT_DONATION_VALUE + "']")
                    .trigger("click");
        } else {

            jq("input[name='donationQuantity'][class='other']")
                    .removeAttr("disabled")
                    .prop("disabled", false)
                    .parent().removeClass("hide");
            jq(".single, select[class*='single'][name='currency']")
                    .removeAttr("disabled")
                    .prop("disabled", false)
                    .removeClass("hide");
            jq(PAYMENT_FORM + " input:not(input[name='" + CHECK_DONATIONTYPE + "'])")
                    .removeAttr("disabled")
                    .prop("disabled", false);
            jq(".recurrent, select[class*='recurrent'][name='currency'], div[class*='recurrent'][data-name='currency']")
                    .attr("disabled", "disabled")
                    .prop("disabled", true)
                    .addClass("hide");
        }
    }
}

function swichtClass(element, oldClass, newClass) {
    jq(element).removeClass(oldClass).addClass(newClass);
}

function setFormValidation() {

    jq(PAYMENT_FORM).validate({
        ignore: ":not(:visible)",
        highlight: function (element, errorClass) {

            jq(".form-error").removeClass("hide");
            if (jq(element).attr("type") == RADIO_TYPE) {
                if (jq(element).parents(".ammount-container").length > 0) {
                    element = jq(".ammount-container");
                } else {
                    element = jq(".don-type");
                }
            }
            swichtClass(element, SUCCESS_CLASS, ERROR_CLASS);
        },
        unhighlight: function (element, errorClass, validClass) {

            if (jq(element).attr("type") == RADIO_TYPE) {
                if (jq(element).parents(".ammount-container").length > 0) {
                    element = jq(".ammount-container");
                } else {
                    element = jq(".don-type");
                }
            }
            swichtClass(element, ERROR_CLASS, SUCCESS_CLASS);
        },
        errorPlacement: function (error, element) {
            jq("#errorMessage").html(error.text());
        },
        submitHandler: function (form) {
            jq(form).prepend(jq("<input type='hidden' value='makeDonation' name='operation' />"));
            jq(form).attr("action", "thankYou.php");
            form.submit();
        }
    });
    jQuery.validator.addMethod("creditCard", function (value, options) {
        var regExp = null;
        var franchise = jq("select[name='cardType']").val();
        switch (franchise) {
            case 'VISA':
                regExp = /^4(?:[0-9]{12}|[0-9]{15})$/;
                break;
            case 'MASTERCARD':
                regExp = /^5[1-5]{1}[0-9]{14}$/;
                break;
            case 'AMEX':
                regExp = /^3(4|7){1}[0-9]{13}$/;
                break;
            case 'DISCOVER':
                regExp = /^6011[0-9]{12}$/;
                break;
            case 'DINERSCLUB':
                regExp = /^3(?:(0[0-5]{1}[0-9]{11})|(6[0-9]{12})|(8[0-9]{12}))$/;
                break;
            default:
                regExp = /^[3-6]{1}[0-9]{12,18}$/;
                break;
        }

        if (!regExp.test(value)) {
            return false;
        }
        var digits = [];
        var j = 1, digit = '';
        for (var i = value.length - 1; i >= 0; i--) {
            if ((j % 2) == 0) {
                digit = parseInt(value.charAt(i), 10) * 2;
                digits[digits.length] = digit.toString().charAt(0);
                if (digit.toString().length == 2) {
                    digits[digits.length] = digit.toString().charAt(1);
                }
            } else {
                digit = value.charAt(i);
                digits[digits.length] = digit;
            }
            j++;
        }
        var sum = 0;
        for (i = 0; i < digits.length; i++) {
            sum += parseInt(digits[i], 10);
        }
        if ((sum % 10) == 0) {
            return true;
        }
        return false;
    }, "Numero de tarjeta invalido");
    jQuery.validator.addMethod("letters", function (value, element) {
        var regex_letters = new RegExp($("#regex_letters").val());
        return this.optional(element) || regex_letters.test(value);
    }, "Solo son permitidos caracteres");
    jQuery.validator.addMethod("numberonly", function (value, element) {
        return this.optional(element) || /[0-9.,]+/.test(value);
    }, "Solo son permitidos numeros");
}