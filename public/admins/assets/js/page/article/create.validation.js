
function initValidate(elSelector) {

    // $.validator.setDefaults({
    //     submitHandler: function() {
    //         alert("submitted!");
    //     }
    // });

    $(function() {
        // validate signup form on keyup and submit
        $(elSelector).validate({
            ignore: [],
            rules: {
                newsImage: {
                    required: true,
                },
                title: {
                    required: true
                },
                newsContent: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Please enter a News Title",
                },
                newsImage: {
                    required: "Please Provide a News Banner",
                },
                newsContent: {
                    required: "Please Provide News Content",
                }
            },
            errorPlacement: function(label, element) {
                label.addClass('mt-2 text-danger');
                label.appendTo( element.parent() );
                // label.insertAfter(element);
            },
            highlight: function(element, errorClass) {
                // $(element).parent().addClass('has-danger')
                // $(element).addClass('form-control-danger')
            }
        });
    });
}


jQuery(document).ready(function () {
	'use strict';
    
    initValidate('#event-create');
});