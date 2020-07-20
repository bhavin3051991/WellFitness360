$(window).load(function() {
    $(".loader").fadeOut("slow");
});

$(document).ready(function () {
    //$("#overlay").fadeIn(300);
	/**
	 * USE : Validate login form
	 */
	$( "#login" ).validate({
		rules: {
			email: {
				required: true,
				email: true,
				// remote: {
				// 	url: BASE_URL+"/check-email-not-register",
				// 	type: "post",
				// 	data:{
				// 		"_token": $('#csrf-token').val(),
				// 		"email":$("#email").val()
				// 	},
				// },
			},
			password: {
				required: true,
				minlength:6,
			}
		},
		messages: {
			email: {
				required: 'Please enter email.',
				email: 'Please enter valid email',
				//remote: "Email not register"
			},
			password: {
				required: 'Please enter password.',
				minlength: 'Please enter valid 6 digit password',
			}
		},
		submitHandler: function (form) {
			$("#overlay").fadeIn(300);
			$.ajax({
				url  : BASE_URL+'/admin/login',
				type : 'POST',
				data : $('#login').serialize(),
				success : function(response) {
                    $("#overlay").fadeOut(300);
					var data = JSON.parse(JSON.stringify(response));
					if(data.status){
						toastr.success(data.message);
						window.location = BASE_URL+data.redirecturl;
					}else{
						toastr.error(data.message);
					}
				}
			});
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
				// remote: {
				// 	url: BASE_URL+"/check-email-register",
				// 	type: "post",
				// 	data:{
				// 		"_token": $('#csrf-tokens').val(),
				// 		"emailaddress":$("#email").val()
				// 	},
				// },
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
				required: 'Please enter your email.',
				email: 'Please enter valid email',
				//remote: "Email already exists."
			},
			password: {
				required: 'Please enter password.',
				minlength: 'Please enter valid 6 digit password',
			},
			contact_no:{
				required:'Please enter contact no',
				number:'Allewd only numeric value',
				minlength : 'Please enter 10 digits mobile number'
			},
			gender:{
				required: 'Please select gender',
			}
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "gender") {
				error.appendTo('.genderclass');
			}else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#overlay").fadeIn(300);
			$.ajax({
				url  : BASE_URL+'/admin/register',
				type : 'POST',
				data : $('#registerForm').serialize(),
				success : function(response) {
                    $("#overlay").fadeOut(300);
					var data = JSON.parse(JSON.stringify(response));
					if(data.status){
                        toastr.success(data.message);
                        console.log(BASE_URL+data.redirecturl)
                        window.location = BASE_URL+data.redirecturl;
					}else{
						toastr.error(data.message);
					}
				}
			});
		}
	});

	/**
	 * USE : validate forgot password
	 */
	$( "#forgotePassword" ).validate({
		rules: {
			email: {
				required: true,
				email: true,
			}
		},
		messages: {
			email: {
				required: 'Please enter email',
				email: 'Please enter valid email',
			}
        },
        submitHandler: function (form) {
            $(".forgotr-btn").attr("disabled", true);
            $("#overlay").fadeIn(300);
			$.ajax({
				url  : BASE_URL+'/admin/forgetPassword',
				type : 'POST',
				data : $('#forgotePassword').serialize(),
				success : function(response) {
                    $("#overlay").fadeOut(300);
                    $(".forgotr-btn").attr("disabled", false);
					var data = JSON.parse(JSON.stringify(response));
					if(data.status){
                        toastr.success(data.message);

					}else{
						toastr.error(data.message);
					}
				}
			});
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
        submitHandler: function (form) {
            $("#overlay").fadeIn(300);
            $(".reset-pwd-btn").attr("disabled", true);
			$.ajax({
				url  : BASE_URL+'/admin/resetPassword',
				type : 'POST',
				data : $('#resetPassword').serialize(),
				success : function(response) {
                    $(".reset-pwd-btn").attr("disabled", false);
                    $("#overlay").fadeOut(300);
					var data = JSON.parse(JSON.stringify(response));
					if(data.status){
                        toastr.success(data.message);
                        window.location = BASE_URL + data.redirecturl;
					}else{
						toastr.error(data.message);
					}
				}
			});
		}
	});
});
