
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
						$(elSelector).append('<option value="">Select Kecamatan</option>');
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
		$(elSelector).datepicker({
			format: "dd-MM-yyyy",
			todayHighlight: true,
			autoclose: true
		});
		$(elSelector).datepicker('setDate', today);
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
	var count = 1;

	dynamic_field(count);

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

jQuery(document).ready(function () {
	'use strict';

	initTinyMce('#contents');
	initDatePicker('#datePickerCountdown');
	initDatePicker('#datePickerEvent');
	initTimePicker('#datetimepickerExample');
	initTagsInput('#tags');
	initSelect2('.division-select');
	initSelect2('.type-select');
	initSelect2('.category-select');
	city('.kecamatan-select', '.province-select');
	initDynamicForm();

	initSubmitForm('#submitCareer', '#career-create');

	initDropify('#uploadImage');
});
