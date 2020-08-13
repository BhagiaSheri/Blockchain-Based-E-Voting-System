//--------for adding user image------------
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
// for adding user image while signup & creating user
$("#profile-pic").change(function () {
    readURL(this);
});

//-------for adding image at user edit model------
function readUpdatedURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#user-profile-img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//for user edit model------
$("#user-profile").change(function () {
    readUpdatedURL(this);
});


