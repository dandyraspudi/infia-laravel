
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
                name: {
                    required: true
                },
                eventType: {
                    required: true
                },
                eventCategory: {
                    required: true
                },
                eventDate: {
                    required: true
                },
                eventDateCount: {
                    required: true
                },
                eventTimeCount: {
                    required: true
                },
                eventProvince: {
                    required: true
                },
                eventCity: {
                    required: true
                },
                eventAddress: {
                    required: true
                },
                eventTags: {
                    required: true
                },
                desc: {
                    required: true
                },
                question: {
                    required: true
                },
                answer: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter a Event Name",
                },
                eventType: {
                    required: "Please Provide a Event Type",
                },
                eventCategory: {
                    required: "Please Provide a Event Category",
                },
                eventDate: {
                    required: "Please Provide a Event Date",
                },
                eventDateCount: {
                    required: "Please Provide a Event date countdown",
                },
                eventTimeCount: {
                    required: "Please Provide a Event time countdown",
                },
                eventProvince: {
                    required: "Please Select a Province",
                },
                eventCity: {
                    required: "Please Select a City",
                },
                eventAddress: {
                    required: "Please Input Address",
                },
                eventTags: {
                    required: "Please Provide Event Tag(s)",
                },
                desc: {
                    required: "Please Provide Event Description",
                },
                question: {
                    required: "Please Provide Event FAQ",
                },
                answer: {
                    required: "Please Provide Event FAQ",
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
    
    initValidate('#event-edit');
});