$(document).ready(function() {
	$( "#login-Form" ).validate({
		rules: {
			email: {
				required: true,
				email: true,
				remote: {
					url: BASE_URL+"/check-email",
					type: "post",
					data:{
						"_token": $('#csrf-token').val(),
					},
				},
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
				remote: "Email not register"
			},
			password: {
				required: 'Please enter password.',
				minlength: 'Please enter valid 6 digit password',
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").show();
			$.ajax({
				url  : BASE_URL+'/login-check',
				type : 'POST',
				data : $('#login-Form').serialize(),
				success : function(response) {
					$("#cover-spin").hide();
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
});