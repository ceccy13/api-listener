$(document).ready(function() {
    /*Header Include*/
    var title = $("#title").val().trim();
    switch(title) {
        case 'home':
            $('li:contains("Home")').addClass('active');
            $('title').text('Home');
            break;
        case 'orders':
            $('li:contains("Orders")').addClass('active');
            $('title').text('Orders');
            break;
        case 'products':
            $('li:contains("Products")').addClass('active');
            $('title').text('Products');
            break;
        default:
        // code block
    }
    /*Header Include*/

    /*Page Home*/
    $("#submit").click(function(){
        $('#is_active_listener').val(1);
        $('#form-token').submit();
    });

    $("#stop").click(function(){
        $('#is_active_listener').val(0);
        $('#form-token').submit();
    });

    /*Validate Form Token*/
   /* $("#form-token").validate({
        onkeyup: false,
        onfocusout: false,
        rules: {
            token: {
                required: true,
                minlength: 779,
                maxlength: 779,
            }
        },
        messages: {
            token: {
                required: "Token is required",
                minlength: "Token must be exact 779 characters",
                maxlength: "Token must be exact 779 characters",
            }
        },
        errorPlacement: function (error, element) {
            if(error.text()) {
                alert(error.text());
                $(element).closest('div').addClass('has-error');
                $(element).next('div').html($(error).html());
            }
        },
        success: function(error, element) {
             $(element).removeClass("has-error");
             $(element).closest('div').addClass('has-success');
        },
        submitHandler: function (form) {
            form.submit();

        }
    });*/
    /*Validate Form Token*/

    /*Page Home*/

});