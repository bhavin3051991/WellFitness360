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
                            location.href = BASE_URL + '/categoriesManagement/edit/' + id;
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
                                        location.href = BASE_URL + '/categoriesManagement/delete/' + id;
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

    $("#about-us-image").change(function() {
        readURL1(this);
        $('.image_preview').show();
    });
});
