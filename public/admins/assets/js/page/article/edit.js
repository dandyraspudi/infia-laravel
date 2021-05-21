var t;

function initTable(elSelector, search = '', status = '') {
	var table = $(elSelector);

	// begin first table
	t = table.DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: window.App.siteUrl + 'approval/bl/list_datatable',

		columns: [{
				data: null,
				orderable: false,
				searchable: false
			},
			{
				data: 'checker_name',
				orderable: false,
				searchable: false
			},
			{
				data: 'description',
				orderable: false,
				searchable: true
			},
			{
				data: 'approval_name',
				orderable: false,
				searchable: true
			},
			{
				data: 'created_date',
				orderable: true,
				searchable: true
			},
			{
				data: 'updated_date',
				orderable: true,
				searchable: true
			},
			{
				data: 'status',
				orderable: false,
				searchable: true,
			},
			{
				data: null,
				orderable: false,
				searchable: false,
			},
		],
		order: [
			[4, 'desc']
		],
		columnDefs: [{
				targets: -2,
				orderable: false,
				render: function (data, type, full, meta) {
					if (data) {
						return '<span class="m-badge m-badge--' + data.class + ' m-badge--wide">' + data.name + '</span>';
					}

					return '';
				},
			},
			{
				targets: -1,
				orderable: false,
				render: function (data, type, full, meta) {
					var id = full.id;
					var permission = full.permission;
					var status = full.status;
					var template = '';

					if (permission.indexOf('process') != -1) {
						var actionText = (status.id == 1) ? 'Proses' : 'Detail';

						template = template + `
								<a href="` + window.App.siteUrl + full.uri + `" class="m-portlet__nav-link" title="` + actionText + `">
									` + actionText + `
								</a>
							`;
					}

					return template;

				},
			},
		],
	});

}

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

jQuery(document).ready(function () {
	'use strict';
	
	initTinyMce('#newsContent');
	initDropify('#uploadImage');
	// initDatePicker('#datePickerCountdown');
	// initDatePicker('#datePickerEvent');
	// initTimePicker('#datetimepickerExample');
	// initTagsInput('#tags');
	// initSelect2('.province-select');
	// initSelect2('.kecamatan-select');
	// initSelect2('.type-select');
	// initSelect2('.category-select');
	// city('.kecamatan-select', '.province-select');
	// initDynamicForm();

});