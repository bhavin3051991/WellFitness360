$(document).ready(function () {

    /**
     * USE : Validate login form
     */
    $( "#login" ).validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength:6,
            }
        },
        messages: {
            email: {
                required: 'Email is required',
                email: 'Please enter valid email',
            },
            password: {
                required: 'Password field is required',
                minlength: 'Please enter valid 6 digit password',
            }
        },
        submitHandler: function (form) {
            $("#cover-spin").css("display", "block");
            form.submit();
        }
    });

    /**
     * USE : Validate login form
     */
    $( "#registerForm" ).validate({
        rules: {
            roles:{
                required:true,
            },
            name:{
                required:true,
            },
            surname:{
                required:true,
            },
            email: {
                required: true,
                email: true,
            },
            contact_no:{
                required:true,
                number:true,
                minlength : 6,
            },
            password: {
                required: true,
                minlength:6,
            },
            gender:{
                required:true,
            }
        },
        messages: {
            roles:{
                required:'Please select register type',
            },
            name:{
                required:'Please enter name',
            },
            surname:{
                required: 'Please enter surname',
            },
            email: {
                required: 'Email is required',
                email: 'Please enter valid email',
            },
            password: {
                required: 'Password field is required',
                minlength: 'Please enter valid 6 digit password',
            },
            contact_no:{
                required:'please enter contact no',
                number:'Allewd only numeric value',
                minlength : 'Please enter 10 digits mobile number'
            },
            gender:{
                required: 'Please select gender',
            }
        },
        submitHandler: function (form) {
            $("#cover-spin").css("display", "block");
            form.submit();
        }
    });

    /**
     * USE : validate forgot password
     */
    $( "#forgotpassword" ).validate({
        rules: {
            email: {
                required: true,
                email: true,
            }
        },
        messages: {
            email: {
                required: 'Email is required',
                email: 'Please enter valid email',
            }
        }
    });

    /**
     * USE : Validate update password
     */
    $( "#resetPassword" ).validate({
        rules: {
            password:{
                required:true,
                minlength:6,
            },
            confirm_password:{
                required:true,
                minlength:6,
                equalTo: "#password",
            }
        },
        messages: {
            password:{
                required: 'Please enter password',
                minlength: 'Please enter atleast 6 digits',
            },
            confirm_password:{
                required: 'Please enter confirm password',
                minlength: 'Please enter atleast 6 digits',
                equalTo: "Password and confirm password does not match",
            }
        },
    });

    /* Addition method using check validation */
    //custom validation rule
    $.validator.addMethod("email", function (value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, "Please enter valid email");

});
