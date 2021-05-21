
var tableInstance;

function initTable(elSelector, search = '', status = '') {

	var table = $(elSelector);
	var url = $(elSelector).data('url');

	// begin first table
	tableInstance = table.DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: url,

		columns: [{
				data: null,
				orderable: false,
				searchable: false
			},
			{
				data: 'name',
				orderable: false,
				searchable: true
			},
			{
				data: 'email',
				orderable: true,
				searchable: false,
			},
			{
				data: 'created_at',
				orderable: true,
				searchable: true
			},
			{
				data: null,
				orderable: false,
				searchable: false,
			},
		],
		// order: [
		// 	[4, 'desc']
		// ],
		columnDefs: [
			{
				targets: -1,
				orderable: false,
				render: function (data, type, full, meta) {

					template =`
						<button type="button" class="btn btn-danger btn-xs" onclick="showSwal('deleteNews', this)" data-id="`+ data.news_id +`" data-url="`+ data.url_delete +`" title="Hapus">
							<i class="mdi mdi-delete"></i>
						</button>
					`;

					return template;

				},
			},
		],
	});

	tableInstance.on('draw.dt', function () {
        var PageInfo = table.DataTable().page.info();
        tableInstance.column(0, {
            page: 'current'
        }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
	});

	$(elSelector).each(function() {
		var datatable = $(this);
		// SEARCH - Add the placeholder for Search and Turn this into in-line form control
		var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
		search_input.attr('placeholder', 'Search');
		search_input.removeClass('form-control-sm');
		// LENGTH - Inline-Form control
		var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
		length_sel.removeClass('form-control-sm');
	});

}

function initSweetAlert() {

	showSwal = function(type, obj) {
		if (type === 'deleteNews') {
			// console.log('idNew', obj.getAttribute('data-url'));
			var url = obj.getAttribute('data-url');
			var news_id = obj.getAttribute('data-id');

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
							news_id: news_id
						},
						success: function(result) {
							if(result['status'] == 'failed'){
								swalWithBootstrapButtons.fire(
									'Failed',
									result['msg'],
									'error'
								)
							}else{
								swalWithBootstrapButtons.fire({
									title: 'Deleted!',
									text: "Your news has been deleted.",
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
								'Delete News Failed...',
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
						'Your imaginary news is safe :)',
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
			let reverseStatus = (obj.checked) ? false : true;
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

	initTable('#dataTableUser');
	initSweetAlert();
});
