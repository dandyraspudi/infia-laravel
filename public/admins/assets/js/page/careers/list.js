// $(function() {
//     'use strict';

//     var url = $('#dataTableEvent').data('url');

//     $(function() {
// 		$('#dataTableEvent').DataTable({
// 			"aLengthMenu": [
// 				[10, 30, 50, -1],
// 				[10, 30, 50, "All"]
// 			],
// 			"iDisplayLength": 10,
// 			"columnDefs": [
// 				{"className": "dt-center", "targets": "total_registered"}
// 			],
// 			"language": {

// 			},
// 			"processing": true,
// 			"serverSide": true,
// 			"ajax": url,
// 			"columns": [
// 				{ data: 'id', name: 'no' },
// 				{ data: 'name', name: 'name' },
// 				{ data: 'cat', name: 'cat' },
// 				{ data: 'start_date_at', name: 'countdown' },
// 				{ data: 'event_user_count', name: 'total_registered' },
// 				{ data: 'created_at', name: 'created_at' },
// 				{ data: 'action', name: 'action', orderable: false, searchable: false }
// 			]
// 		});
// 		$('#dataTableEvent').each(function() {
// 			var datatable = $(this);
// 			// SEARCH - Add the placeholder for Search and Turn this into in-line form control
// 			var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
// 			search_input.attr('placeholder', 'Search');
// 			search_input.removeClass('form-control-sm');
// 			// LENGTH - Inline-Form control
// 			var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
// 			length_sel.removeClass('form-control-sm');
// 		});
//     });

//   });
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
				data: 'title_full',
				orderable: false,
				searchable: false
			},
			{
				data: 'division',
				orderable: false,
				searchable: true
			},
			{
				data: 'applicants_count',
				orderable: true,
				searchable: true,
				className: 'text-center'
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
						<a role="button" class="btn btn-warning btn-xs" target="_blank" title="Preview" href="`+ data.preview_url +`">
							<i class="mdi mdi-eye"></i>
						</a>
						<a role="button" class="btn btn-primary btn-xs" title="Edit" href="`+ data.edit_url +`">
							<i class="mdi mdi-lead-pencil"></i>
						</a>
						<button type="button" class="btn btn-danger btn-xs" onclick="showSwal('deleteEvent', this)" data-id="`+ data.career_id +`" data-url="`+ data.title +`" title="Hapus">
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
