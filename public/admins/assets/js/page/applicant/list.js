
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
				searchable: false
			},
			{
				data: 'email',
				orderable: false,
				searchable: true
			},
			{
				data: 'phone',
				orderable: true,
				searchable: true,
				className: 'text-center'
			},
            {
                data: 'current_company',
                orderable: true,
                searchable: true,
                className: 'text-center'
            },
            {
                data: 'link',
                orderable: true,
                searchable: true,
                className: 'text-center'
            },
            {
                data: 'cv_download_link',
                orderable: true,
                searchable: true,
                className: 'text-center'
            },
			{
				data: 'letter',
				orderable: true,
				searchable: true
			},
			{
				data: 'created_at',
				orderable: false,
				searchable: false,
			},
		],
		// order: [
		// 	[4, 'desc']
		// ],
		columnDefs: [
			{}
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
		if (type === 'deleteEvent') {
			// console.log('idNew', obj.getAttribute('data-url'));
			var url = obj.getAttribute('data-url');
			var event_id = obj.getAttribute('data-id');

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
							event_id: event_id
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
									text: "Your event has been deleted.",
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
								'Delete Event Failed...',
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
						'Your imaginary event is safe :)',
						'error'
					)
				}
			})
		}
	}

}

jQuery(document).ready(function () {
	'use strict';

	initTable('#dataTableEvent');
	initSweetAlert();
});
