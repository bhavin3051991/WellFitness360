$(window).load(function() {
	$(".loader").fadeOut("slow");
});

$(document).ready(function () {
	$("#cover-spin").css("display", "none");

	/** USE : Delete Modules */
	$(document).on("click",".deletModule",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/module/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}else{
			return false
		}
	});

	/** USE : Delete Roles & Permission */
	$(document).on("click",".deletRolesPermission",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/rolepermission/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}else{
			return false
		}
	});
	/* USE : Add roles Form Validation */
	$('#rolesPermissionForm').validate({
		rules: {
			name:{
				required:true,
			},
			// 'permission[]':{
			//     required:true,
			// }
		},
		messages: {
			name:{
				required: 'Please enter name',
			},
			// 'permission[]':{
			//     required: 'Please select atleast one permission'
			// }
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "permission[]") {
				error.appendTo('.permissionError');
			}else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	/* USE : Add roles Form Validation */
	$('#moduleForm').validate({
		rules: {
			name:{
				required:true,
			},
			display_name:{
				required:true,
			}
		},
		messages: {
			name:{
				required: 'Please enter name',
			},
			display_name:{
				required: 'Please enter display name'
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	$('#userForm').validate({
		rules: {
			name:{
				required:true,
			},
			surname:{
				required:true,
			},
			email:{
				required:true,
				email:true,
			},
			contact_no:{
				required:true,
				number:true
			},
			gender:{
				required:true,
			},
			status:{
				required:true,
			},
		},
		messages: {
			name:{
				required: 'Please enter name.',
			},
			surname:{
				required: 'Please enter Sur name.'
			},
			email:{
				required: 'Please enter email.',
				email : 'Please enter valid email.'
			},
			contact_no:{
				required: 'Please enter contact number.',
				number:'Please enter valid contact number'
			},
			gender:{
				required: 'Please select gender.'
			},
			status:{
				required: 'Please select status.'
			}
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "gender") {
				error.appendTo('.Gendererror');
			}else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/** USE : Delete User */
	$(document).on("click",".deletUser",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/UserManagement/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}
		else{
			return false;
		}
	});
	$('#trainerForm').validate({
		rules: {
			name:{
				required:true,
			},
			surname:{
				required:true,
			},
			email:{
				required:true,
				email:true,
			},
			contact_no:{
				required:true,
				number:true
			},
			gender:{
				required:true,
			},
			status:{
				required:true,
			},
		},
		messages: {
			name:{
				required: 'Please enter name.',
			},
			surname:{
				required: 'Please enter Sur name.'
			},
			email:{
				required: 'Please enter email.',
				email : 'Please enter valid email.'
			},
			contact_no:{
				required: 'Please enter contact number.',
				number:'Please enter valid contact number'
			},
			gender:{
				required: 'Please select gender.'
			},
			status:{
				required: 'Please select status.'
			}
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "gender") {
				error.appendTo('.Gendererror');
			}else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/** USE : Delete Trainer */
	$(document).on("click",".deleteTrainer",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/trainerManagement/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}
		else{
			return false;
		}
	});

	/** USE : category form validation */
	$('#categoryForm').validate({
		rules: {
			categoryList:{
				required:true,
			},
			cat_name:{
				required:true,
			},
			status:{
				required:true,
			},
		},
		messages: {
			categoryList:{
				required: 'Please select parent categories.',
			},
			cat_name:{
				required: 'Please enter categories name.'
			},
			status:{
				required: 'Please select status.'
			}
		},
		errorPlacement: function (error, element) {
			error.insertAfter(element);
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/**
	* USE : Listing set tree view category module
	**/
   if($('#tree_1').length > 0){
		$('#tree_1').jstree({
				"core" : {
					"themes" : {
						"responsive": true
					}
				},
				"types" : {
					"default" : {
						"icon" : "fa fa-folder icon-state-warning icon-lg"
					},
					"file" : {
						"icon" : "fa fa-file icon-state-warning icon-lg"
					}
				},
				"plugins": ["types"]
			});
		$(document).on('click','#tree_1 a',function(){
			var id = $(this).closest('li').attr('dataid');
			$.confirm({
				title: 'Action',
				content: 'Click to get your action',
				theme: 'modern',
				closeIcon: true,
				closeIconClass: 'fa fa-close',
				buttons: {
					edit: {
						btnClass: 'btn-green',
						action:function(){
							location.href = BASE_URL + '/trainercategoriesManagement/edit/' + id;
						}
					},
					delete:{
						btnClass: 'btn-red',
						action: function(){
							$.confirm({
								title: 'Delete',
								content: 'Are You Sure Delete this Category?',
								theme: 'modern',
								closeIcon: true,
								closeIconClass: 'fa fa-close',

								buttons: {
									confirm: function (){
										location.href = BASE_URL + '/trainercategoriesManagement/delete/' + id;
									},
									cancel: function () {
									},
								}
							})
						}
					}
				}
			});
		});
	}

	/**
	* USE : Confirm-box set in category module
	**/
	if ($('a.lightcase').length > 0) {
		$('a.lightcase').lightcase();
	}

	/**
	* USE : Edit category selected dropdown
	**/
	if($('.edit-category').length > 0){
		$('.edit-category > option').each(function() {
			if($(this).val() == categoryid){
				$(this).attr('selected','selected');
			}
		});
	}

	/** USE : Selected image Perview **/
	function readURL1(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#ImagePreview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	/** USE : Preview Image about-us */
	$("#about-us-image").change(function() {
		readURL1(this);
		$('.image_preview').show();
	});

	/** USE : Preview image E-shop Management */
	$("#shop-image").change(function() {
		readURL1(this);
		$('.image_preview').show();
	});

	/** USE : E-Shop Management form validation */
	$('#addEshopForm').validate({
		rules: {
			Name:{
				required:true,
			},
			Image:{
				required:true,
				extension: "JPG|JPEG|PNG",
			},
			Shop_URL:{
				required:true,
				url: true,
			}
		},
		messages: {
			Name:{
				required: 'Please enter shop name',
			},
			Image:{
				required: 'Please select shop image',
				extension: "Allowed only JPG|JPEG|PNG files extension",
			},
			Shop_URL:{
				required: 'Please enter website url',
			}
		},
		errorPlacement: function (error, element) {
			error.insertAfter(element);
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	/** USE : E-Shop Management form validation */
	$('#editEshopForm').validate({
		rules: {
			Name:{
				required:true,
			},
			Image:{
				extension: "JPG|JPEG|PNG",
			},
			Shop_URL:{
				required:true,
				url: true,
			}
		},
		messages: {
			Name:{
				required: 'Please enter shop name',
			},
			Image:{
				extension: "Allowed only JPG|JPEG|PNG files extension",
			},
			Shop_URL:{
				required: 'Please enter website url',
			}
		},
		errorPlacement: function (error, element) {
			error.insertAfter(element);
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	/** USE : Delete Trainer */
	$(document).on("click",".deleteShop",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/E_shopManagement/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					if(object.status){
						toastr.success(object.message);
						location.reload(true);
					}else{
						toastr.error(object.message);
					}
				}
			});
		}
		else{
			return false;
		}
	});

	$('#feesForm').validate({
		rules: {
			trainername:{
				required:true,
			},
			trainerfee:{
				required:true,
				number:true,
			},
			admidfee:{
				required:true,
				number:true,
			},
		},
		messages: {
			trainername:{
				required: 'Please select trainer name.',
			},
			trainerfee:{
				required: 'Please enter trainer fee.',
				number: 'Please enter valid trainer fee.'
			},
			admidfee:{
				required: 'Please enter admin fee.',
				number : 'Please enter valid admin fee.'
			},
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/* USE : Delete Fees */
	$(document).on("click",".deleteFees",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/FeesManagement/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}
		else{
			return false;
		}
	});

	/**
	 * USE : Validate form change password
	 */
	$('#changePassword').validate({
		rules: {
			old_password:{
				required:true,
				minlength:6,
			},
			new_password:{
				required:true,
				minlength:6,
			},
			confirm_password:{
				required:true,
				minlength:6,
				equalTo: "#new_password",
			},
		},
		messages: {
			old_password:{
				required:'Please enter old password',
				minlength: 'Required minimum 6 character | digits | special character',
			},
			new_password:{
				required:'Please enter new password',
				minlength: 'Required minimum 6 character | digits | special character',
			},
			confirm_password:{
				required:'Please enter confirm password',
				minlength: 'Required minimum 6 character | digits | special character',
				equalTo: "New password & confirm password does not match",
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	$('input[type=checkbox]').change(function(e){
	   if ($('input[type=checkbox]:checked').length > 5) {
	        $(this).prop('checked', false);
	        toastr.error("Allowed only five User or Trainer Select.");
	   }
	})
	
	$(".usertrainer-cls").click(function() {
		var val = [];
		$(':checkbox:checked').each(function(i){
			val[i] = $(this).val();
		});
		if(val != ''){
			$("#cover-spin").css("display", "block");
			$.ajax({
				type: 'POST',
				url: BASE_URL+'/save-user-trainer-activity',
				data:{
					"_token": $('#csrf-tokens').val(),
					id:val,
				},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					if(object.status){
						toastr.success(object.message);
						//location.reload(true);
					}else{
						toastr.error(object.message);
					}
				}
			});
		}else{
			toastr.error("Please Select at list one user or trainer.");
		}
	});

});
