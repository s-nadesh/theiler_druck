/* Add here all your JS customizations */
$(document).ready(function() {

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
}); 