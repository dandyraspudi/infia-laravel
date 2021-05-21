var t;


function initSelect2(elSelector) {
	if ($(elSelector).length) {
		$(elSelector).select2();
	}
}

function initDropify(elSelector) {
	$(elSelector).dropify();
}

function city(elSelector, elChange) {
	$(elChange).change(function(){
		var sid = $(this).val();
		var url = $(this).data('url');

		if (sid) {
			$.ajax({
				type:"get",
				url: url,
				data: {
					province_id: sid
				},
				success:function(res)
				{
					if(res) {
						$(elSelector).empty();
						$(elSelector).append('<option>Select Kecamatan</option>');
						$.each(res,function(key,value){
							$(elSelector).append('<option value="'+value+'">'+key+'</option>');
						});
					}
				}
			});

		}
	});
}

function initTinyMce(elSelector) {
	if ($(elSelector).length) {
		tinymce.init({
		  selector: elSelector,
		  height: 400,
		  theme: 'silver',
		  menubar: false,
		  plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
		  ],
		  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons | help',
		  image_advtab: true,
		  templates: [{
			  title: 'Test template 1',
			  content: 'Test 1'
			},
			{
			  title: 'Test template 2',
			  content: 'Test 2'
			}
		  ],
		  content_css: []
		});
	  }
}

function initDatePicker(elSelector) {
	if($(elSelector).length) {
		var date = new Date();
		var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
		var dateSelected = $(elSelector).data('date');
		$(elSelector).datepicker({
			format: "dd-MM-yyyy",
			todayHighlight: true,
			autoclose: true
		});
		$(elSelector).datepicker('setDate', dateSelected);
	}
}

function initTimePicker(elSelector) {
	$(elSelector).datetimepicker({
		format: 'HH:mm'
	});
}

function initTagsInput(elSelector) {
	$(elSelector).tagsInput({
		'width': '100%',
		'height': '75%',
		'interactive': true,
		'defaultText': 'Add Tag',
		'removeWithBackspace': true,
		'minChars': 0,
		'maxChars': 20,
		'placeholderColor': '#666666'
	  });
}

function initDynamicForm() {
	var $faqCount = $('#faqs-table').data('faq');
	var count = $faqCount;

	if (count == 0) {
		dynamic_field(1);
	}

	$(document).on('click', '#add', function(){
		count++;
		dynamic_field(count);
	   });

	$(document).on('click', '.remove', function(){
		count--;
		$(this).closest("tr").remove();
	});
}

function dynamic_field(number) {
	html = '<tr>';
	html += '<td><input type="text" name="question[]" class="form-control" required /></td>';
	html += '<td><input type="text" name="answer[]" class="form-control" required /></td>';

	if(number > 1) {
		html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove"><i class="mdi mdi-minus"</button></td></tr>';
		$('tbody').append(html);
	} else {
		html += '<td><button type="button" name="add" id="add" class="btn btn-success"><i class="mdi mdi-plus"></i></button></td></tr>';
		$('tbody').html(html);
	}
}

function initSubmitForm(elSelector, formSelector) {
    $(elSelector).click(function () {
        $(formSelector).submit();
    })
}

function initSweetAlert() {

    showSwal = function(type, obj) {
        if (type === 'deleteCareer') {
            // console.log('idNew', obj.getAttribute('data-url'));
            let url = obj.getAttribute('data-url');
            let career_id = obj.getAttribute('data-id');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-2'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'mr-2',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url      : url,
                        type     : 'GET',
                        data	 : {
                            career_id: career_id
                        },
                        success: function(result) {
                            if(result['status'] === 'failed'){
                                swalWithBootstrapButtons.fire(
                                    'Failed',
                                    result['msg'],
                                    'error'
                                )
                            }else{
                                swalWithBootstrapButtons.fire({
                                    title: 'Deleted!',
                                    text: "Career has been deleted.",
                                    icon: 'success',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        tableInstance.ajax.reload(null, false);
                                    }
                                })
                            }
                        },
                        error: function () {
                            console.log('failed-ajax');
                            swalWithBootstrapButtons.fire(
                                'Failed',
                                'Delete Career Failed...',
                                'error'
                            )
                        },
                    });

                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary Career is safe :)',
                        'error'
                    )
                }
            })
        } else if (type === 'updatePublish'){
            // console.log(obj.getAttribute('id'));
            var url = obj.getAttribute('data-url');
            var news_id = obj.getAttribute('data-id');
            let attr_id = obj.getAttribute('id');
            let status = (obj.checked) ? 1 : 2;
            let reverseStatus = (!obj.checked);
            let msg = (obj.checked) ? "You will publish this news" : "You will Un-publish/hidden this news";
            let msgButton = (obj.checked) ? "Yes, publish it!" : "Yes, Hide it!";
            let msgText = (obj.checked) ? "Your news has been publish." : "Your news has been hidden.!";
            let msgTextHead = (obj.checked) ? "Published!" : "Hidden!";

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-2'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: msg,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'mr-2',
                confirmButtonText: msgButton,
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url      : url,
                        type     : 'GET',
                        data	 : {
                            news_id : news_id,
                            status	: status
                        },
                        success: function(result) {
                            if(result['status'] == 'failed'){
                                $('#'+attr_id).prop("checked", reverseStatus);
                                swalWithBootstrapButtons.fire(
                                    'Failed',
                                    result['msg'],
                                    'error'
                                )
                            }else{
                                swalWithBootstrapButtons.fire({
                                    title: msgTextHead,
                                    text: msgText,
                                    icon: 'success',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        tableInstance.ajax.reload(null, false);
                                    }
                                })
                            }
                        },
                        error: function () {
                            console.log('failed-ajax');
                            $('#'+attr_id).prop("checked", reverseStatus);
                            swalWithBootstrapButtons.fire(
                                'Failed',
                                'Change Status News Failed...',
                                'error'
                            )
                        },
                    });

                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    // console.log('#'+attr_id);
                    // console.log(reverseStatus);
                    $('#'+attr_id).prop("checked", reverseStatus);
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        "Your imaginary news doesn't change :)",
                        'error'
                    )
                }
            })
        }
    }

}

jQuery(document).ready(function () {
	'use strict';

	initTinyMce('#contents');
	initSelect2('.division-select');
	city('.kecamatan-select', '.province-select');
	initDynamicForm();
	initSweetAlert()

    initSubmitForm('#submitCareer', '#career-edit');

	initDropify('#uploadImage');
});
