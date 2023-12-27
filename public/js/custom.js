"use strict";

 $(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function () {
    if ($(".dataTable").length > 0) {
        $(".dataTable").dataTable({
            language: dataTabelLang,
        });
    }

    if ($(".datepicker").length > 0) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
            locale: date_picker_locale,
        });
    }

    if ($(".timepicker_format").length > 0) {
        $('.timepicker_format').timepicker({
            showMeridian: false,
            minuteStep: 5,

        });
    }

    if ($(".select2").length > 0) {
        $(".select2").select2({
            disableOnMobile: false,
            nativeOnMobile: false
        });
    }

    if ($(".summernote-simple").length) {
        $('.summernote-simple').summernote();
    }

    // for Choose file
    $(document).on('change', 'input[type=file]', function () {
        var fileclass = $(this).attr('data-filename');
        var finalname = $(this).val().split('\\').pop();
        $('.' + fileclass).html(finalname);
    });
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function show_toastr(title, message, type) {
    var o, i;
    var icon = '';
    var cls = '';

    if (type == 'success') {
        icon = 'fas fa-check-circle';
        cls = 'success';
    } else {
        icon = 'fas fa-times-circle';
        cls = 'danger';
    }

    $.notify({icon: icon, title: " " + title, message: message, url: ""}, {
        element: "body",
        type: cls,
        allow_dismiss: !0,
        placement: {
            from: 'top',
            align: toster_pos
        },
        offset: {x: 15, y: 15},
        spacing: 10,
        z_index: 1080,
        delay: 2500,
        timer: 2000,
        url_target: "_blank",
        mouse_over: !1,
        animate: {enter: o, exit: i},
        template: '<div class="alert alert-{0} alert-icon alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"><span class="alert-group-icon"><i data-notify="icon"></i></span></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
    });
}

$(document).on('click', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]', function () {

    // alert('asd');
    var title = $(this).data('title');
    var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
    var url = $(this).data('url');


    $("#commonModal .modal-title").html(title);
    $("#commonModal .modal-dialog").addClass('modal-' + size);
    $.ajax({
        url: url,
        success: function (data) {

            if (data.length) {
                $('#commonModal .modal-body').html(data);
                $("#commonModal").modal('show');
                common_bind();
            } else {
                show_toastr('Error', 'Permission denied', 'error');
                $("#commonModal").modal('hide');
            }
        },
        error: function (data) {

            data = data.responseJSON;
            show_toastr('Error', data.error, 'error');
        }
    });
});


function common_bind() {


    if ($(".datepicker").length) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
            locale: date_picker_locale,
        });
    }


    if (jQuery().select2) {
        $(".select2").select2({
            disableOnMobile: false,
            nativeOnMobile: false
        });
    }

    $('.timepicker').timepicker({
        showMeridian: false,
        minuteStep: 5,
    });


    if ($(".custom-datepicker").length) {
        $('.custom-datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'Y-MM',
            locale: {
                format: 'Y-MM'
            }
        });

    }
}

