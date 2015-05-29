/* Add here all your JS customizations */
$(document).ready(function() {

    $('.quantity_number').bootstrapNumber();

    //User Register form Validation
    $(".user_register").validate({
        rules: {
            'data[User][user_name]': {
                required: true,
            },
            'data[User][user_email]': {
                required: true,
                email: true
            },
            'data[User][user_password]': {
                required: true,
            },
        },
        highlight: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error");
        },
        success: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find("label.error")
                    .remove();
        }
    });

    //User Login Form
    $(".user_login").validate({
        rules: {
            'data[User][user_email]': {
                required: true,
                email: true
            },
            'data[User][user_password]': {
                required: true,
            },
        },
        highlight: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error");
        },
        success: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find("label.error")
                    .remove();
        }
    });

    //User Register from checkout section
    $(".checkout-register").validate({
        rules: {
            'data[UserAddress][address_company_name]': {
                required: function() {
                    return $('#UserAddressAddressCompanyType').val() == 'Company';
                },
            },
            'data[UserAddress][address_firstname]': {
                required: true,
            },
            'data[UserAddress][address_lastname]': {
                required: true,
            },
            'data[User][user_email]': {
                required: true,
                email: true
            },
            'data[UserAddress][address_street]': {
                required: true,
            },
            'data[UserAddress][address_city]': {
                required: true,
            },
            'data[UserAddress][address_post_code]': {
                required: true,
            },
            'data[UserAddress][address_phone]': {
                required: true,
            },
            'data[User][user_password]': {
                required: true,
            },
            'data[User][repeat_password]': {
                required: true,
                equalTo: "#UserUserPassword",
            },
        },
        highlight: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error");
        },
        success: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find("label.error")
                    .remove();
        }
    });

    //User Billing Address from checkout section
    $(".checkout-billing").validate({
        rules: {
            'data[BillingAddress][address_company_name]': {
                required: function() {
                    return $('#BillingAddressAddressCompanyType').val() == 'Company';
                },
            },
            'data[BillingAddress][address_firstname]': {
                required: true,
            },
            'data[BillingAddress][address_lastname]': {
                required: true,
            },
            'data[BillingAddress][address_street]': {
                required: true,
            },
            'data[BillingAddress][address_city]': {
                required: true,
            },
            'data[BillingAddress][address_post_code]': {
                required: true,
            },
            'data[BillingAddress][address_phone]': {
                required: true,
            },
        },
        highlight: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error");
        },
        success: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find("label.error")
                    .remove();
        }
    });

    //User Shipping Address from checkout section
    $(".checkout-shipping").validate({
        rules: {
            'data[ShippingAddress][address_company_name]': {
                required: function() {
                    return $('#ShippingAddressAddressCompanyType').val() == 'Company';
                },
            },
            'data[ShippingAddress][address_firstname]': {
                required: true,
            },
            'data[ShippingAddress][address_lastname]': {
                required: true,
            },
            'data[ShippingAddress][address_street]': {
                required: true,
            },
            'data[ShippingAddress][address_city]': {
                required: true,
            },
            'data[ShippingAddress][address_post_code]': {
                required: true,
                min: $('#ShippingAddressAddressPostCode').data('from-zip'),
                max: $('#ShippingAddressAddressPostCode').data('to-zip'),
            },
            'data[ShippingAddress][address_phone]': {
                required: true,
            },
        },
        highlight: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error");
        },
        success: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find("label.error")
                    .remove();
        }
    });

    //User Shipping Address from checkout section
    $(".checkout-payment-method").validate({
        rules: {
            'data[PaymentMethod][id]': {
                required: true,
            },
        },
        highlight: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error");
        },
        success: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find("label.error")
                    .remove();
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "data[PaymentMethod][id]") {
                error.appendTo($('#payment-method-error'));
            } 
        }
    });
    
    //My Account Change Password
    $(".profile_change_password").validate({
        rules: {
            'data[User][new_password]': {
                required: true,
            },
            'data[User][confirm_password]': {
                required: true,
                equalTo: "#UserNewPassword",
            },
        },
        highlight: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error");
        },
        success: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find("label.error")
                    .remove();
        },
    });
    
    //My Account Profile Update
    $(".profile_update").validate({
        rules: {
            'data[User][user_name]': {
                required: true,
            },
            
        },
        highlight: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-success")
                    .addClass("has-error");
        },
        success: function(element) {
            $(element)
                    .parent()
                    .removeClass("has-error")
                    .addClass("has-success")
                    .find("label.error")
                    .remove();
        },
    });
    
}); 