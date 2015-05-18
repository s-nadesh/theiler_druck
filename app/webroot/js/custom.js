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
    
    //User Billing Address from checkout section
    $(".checkout-billing-address").validate({
        rules: {
            'data[BillingAddress][title]': {
                required: true,
            },
            'data[BillingAddress][first_name]': {
                required: true,
            },
            'data[BillingAddress][last_name]': {
                required: true,
            },
            'data[BillingAddress][street]': {
                required: true,
            },
            'data[BillingAddress][street_number]': {
                required: true,
            },
            'data[BillingAddress][city]': {
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
    $(".checkout-shipping-address").validate({
        rules: {
            'data[ShippingAddress][title]': {
                required: true,
            },
            'data[ShippingAddress][first_name]': {
                required: true,
            },
            'data[ShippingAddress][last_name]': {
                required: true,
            },
            'data[ShippingAddress][street]': {
                required: true,
            },
            'data[ShippingAddress][street_number]': {
                required: true,
            },
            'data[ShippingAddress][city]': {
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
    
    
}); 