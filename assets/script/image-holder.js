function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#profile-pic").change(function () {
    readURL(this);
});

// For manage candidates
function readCandidateURL(elem, tagId) 
{
      if (elem.files && elem.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(tagId).attr('src', e.target.result);
        }
        reader.readAsDataURL(elem.files[0]);
    }
}

// for create candidate
$("#create-candidate-pic").change(function () {
    readCandidateURL(this, "#create-candidate-profile-imgTag");
});

// for edit candidate
$("#edit-candidate-img-container.form-group").on("change", "#edit-candidate-pic",function () {
    readCandidateURL(this, "#edit-candidate-profile-imgTag")
});
