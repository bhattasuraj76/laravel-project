
$(document).ready(function () {
    setTimeout(function () {
        $('#messages').hide();

    },4000)

});

CKEDITOR.replace('description');

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#profile-img").change(function () {
    readURL(this);
});

