$(document).ready(function () {
    var all_error = $("#submit-all-error-box");
    var image = $("#image");

    image.change(function () {
        imageValid();
    });


    $('input#email').unbind().blur(function () {
        all_error.addClass('hidden');
        var val = $(this).val();
        var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
        if (val != '' && rv_email.test(val)) {
            $(this).removeClass('error').addClass('not_error');
            all_error.addClass('hidden');
        }
        else {
            $(this).removeClass('not_error').addClass('error');
            all_error.removeClass('hidden');
            all_error.html('Not correct email!!!');
        }
    });

    $('input#name').unbind().blur(function () {
        all_error.addClass('hidden');
        var val = $(this).val();
        if (val != '') {
            $(this).removeClass('error').addClass('not_error');
            all_error.addClass('hidden');
        }
        else {
            $(this).removeClass('not_error').addClass('error');
            all_error.removeClass('hidden');
            all_error.html('Name is empty!!!');
        }
    });


    $('#create-form').submit(checkForm);

    function checkForm() {
        if (($('.not_error').length == 2) && (image != '')) {
            if (!imageValid()) {
                return false;
            }
        } else {
            all_error.removeClass('hidden');
            all_error.html('Fill in all the fields');
            return false;
        }
    }

    $('#myModal').on('shown.bs.modal', function () {
        var name = $('#name').val();
        var text = $('#text').val();
        var email = $('#email').val();
        var image = $('#image')[0].files[0];
        $('#preview-name').html(name);
        $('#preview-text').html(text);
        $('#preview-Email').html(email);
    });

    var name=$('#admin-name');
    var text=$('#admin-text');
    var email=$('#admin-email');

    $('#myAdminModal').on('hide.bs.modal', function () {
        $('#admin-is-done').prop('checked', false);
    });
    
    $('#myAdminModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var data = {};
        data.name=button.find('.admin-name').text();
        data.text=button.find('.admin-text').text();
        data.email=button.find('.admin-email').text();
        data.id=button.find('.admin-id').text();
        data.is_done=button.find('.admin-is-done').text();

        $('#admin-name').text(data.name);
        $('#admin-email').text(data.email);
        $('#admin-text').val(data.text);
        $('#admin-id').val(data.id);
        if (data.is_done==1){
            $('#admin-is-done').prop('checked', true);
        }
    });

    function imageValid() {
        var ext = $('#image').val().split('.').pop().toLowerCase();
        all_error.html('image can only in PNG/GIF/JPG format!');
        if ($.inArray(ext, ['gif', 'png', 'jpg']) == -1) {
            all_error.removeClass('hidden');
            return false;
        } else {
            all_error.addClass('hidden');
            return true;
        }
    }
});

function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image").files[0]);
    oFReader.onload = function (oFREvent) {
        document.getElementById("preview-image").src = oFREvent.target.result;
    };
};