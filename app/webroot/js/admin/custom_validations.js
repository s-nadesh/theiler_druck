$(document).ready(function() {

    //Admin Login form Validation
    $(".admin_login_form").validate({
        rules: {
            'data[Admin][admin_email]': {
                required: true,
                email: true
            },
            'data[Admin][admin_password]': {
                required: true,
            },
        },
    });
    
    //Admin Login form Validation
    $(".admin_forgot_password_form").validate({
        rules: {
            'data[Admin][admin_email]': {
                required: true,
                email: true
            },
        },
    });

    //Admin Profile Validation
    $(".admin_profile").validate({
        rules: {
            'data[Admin][admin_name]': {
                required: true,
            },
            'data[Admin][admin_email]': {
                required: true,
                email: true
            },
        },
        success: function(label) {
            label.text('Success!').addClass('valid');
        }
    });
    
    //Admin Change Password
    $(".admin_change_password").validate({
        rules: {
            'data[Admin][admin_new_password]': {
                required: true,
            },
            'data[Admin][admin_confirm_password]': {
                required: true,
                equalTo: "#AdminAdminNewPassword"
            },
        },
        success: function(label) {
            label.text('Success!').addClass('valid');
        }
    });

    //Admin Product Form
    $.validator.addMethod("pages_regx", function(value, element, regexpr) {
        return regexpr.test(value);
    }, "Please enter a No.of Pages Like(4|8|12).");

    $.validator.addMethod("copies_regx", function(value, element, regexpr) {
        return regexpr.test(value);
    }, "Please enter a No.of Copies Like(5000|6000|7000).");

    //Admin Product Form - Add
    $(".admin_product_form_add").validate({
        errorPlacement: function(error, element) {
            if (element.parent().parent().attr("class") == "input file") {
                error.appendTo(element.parent().parent().parent());
            }
            else {
                error.insertAfter(element);
            }
        },
        rules: {
            'data[Product][product_name]': {
                required: true,
                minlength: 3
            },
            'data[Product][product_description]': {
                required: true,
                minlength: 20
            },
            'data[Product][product_factor]': {
                required: true,
                number: true,
            },
            'data[Product][product_image]': {
                required: true,
                accept: "jpg|jpeg|png"
            },
            'data[Product][product_no_of_pages]': {
                required: true,
                pages_regx: /^[0-9|]+$/
            },
            'data[Product][product_no_of_copies]': {
                required: true,
                copies_regx: /^[0-9|]+$/
            }
        },
        success: function(label) {
            label.text('Success!').addClass('valid');
        }
    });
    
    //Admin Pages
    var $form = $(".admin_add_page");
     $form.validate().settings.ignore = [];
    $(".admin_add_page").validate({
        
        rules: { 
            
            'data[Page][1][page_title]': {
                required: true,
            },
            'data[Page][1][page_description]': {
                required: true,
            },
             'data[Page][2][page_title]': {
                required: true,
            },
            'data[Page][2][page_description]': {
                required: true,
            }
        },
        success: function(label) {
            label.text('Success!').addClass('valid');
        }
    });
    
    //Admin Product Form - Edit
    $(".admin_product_form_edit").validate({
        errorPlacement: function(error, element) {
            if (element.parent().parent().attr("class") == "input file") {
                error.appendTo(element.parent().parent().parent());
            }
            else {
                error.insertAfter(element);
            }
        },
        rules: {
            'data[Product][product_name]': {
                required: true,
                minlength: 3
            },
            'data[Product][product_description]': {
                required: true,
                minlength: 20
            },
            'data[Product][product_factor]': {
                required: true,
                number: true,
            },
            'data[Product][product_image]': {
                required: false,
                accept: "jpg|jpeg|png"
            },
            'data[Product][product_no_of_pages]': {
                required: true,
                pages_regx: /^[0-9|]+$/
            },
            'data[Product][product_no_of_copies]': {
                required: true,
                copies_regx: /^[0-9|]+$/
            }
        },
        success: function(label) {
            label.text('Success!').addClass('valid');
        }
    });
    
    //Admin Paper Variants
    $(".admin_paper_variants").validate({
        rules: {
            'data[PaperVariant][paper_name]': {
                required: true,
            },
            'data[PaperVariant][paper_rang_mgrm]': {
                required: true,
                number: true
            }
        },
        success: function(label) {
            label.text('Success!').addClass('valid');
        }
    });
    
    //Admin Shipping Costs
    $(".admin_shipping_cost").validate({
        rules: {
            'data[ShippingCost][sh_cost_zip_from]': {
                required: true,
                number: true
            },
            'data[ShippingCost][sh_cost_zip_to]': {
                required: true,
                number: true
            },
            'data[ShippingCost][sh_cost_basic_weight_price]': {
                required: true,
                number: true
            },
            'data[ShippingCost][sh_cost_additional_weight_price]': {
                required: true,
                number: true
            }
        },
        success: function(label) {
            label.text('Success!').addClass('valid');
        }
    });
    
    //Admin Static Pages
    $(".admin_static_page_form").validate({
        rules: {
            'data[StaticPage][page_title]': 'required',
            'data[StaticPage][page_lang]': 'required',
            'data[StaticPage][page_content]': 'required',
        },
        success: function(label) {
            label.text('Success!').addClass('valid');
        }
    });

});