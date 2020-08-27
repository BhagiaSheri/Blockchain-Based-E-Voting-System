// on document ready
$(document).ready(function () {
  // when logout is clicked 
  $("#log-me-out").click(function (event) {
    swal({
      title: "Logging out...",
      icon: "success",
      buttons: true,
      dangerMode: false,
    })
      .then((willDelete) => {
        if (willDelete) {
           // get role
            let role = $(event.target).attr('class').split(' ')[1];
            log_out(role);
        } 
      });
  });

  //on click to edit candidate
  $(".edit-candidate").click(function (event) {
    editCandidate(event.target.id);
  });

  //on click to delete candidate 
  $(".dlt-candidate").click(function (event) {
    var modal = $("#deleteCandidateModal");
    modal.find('#delete-candidate-id').val(event.target.id);
    modal.modal();
  });

  //on click to delete user
  $(".dlt-user").click(function (event) {
    var modal = $("#deleteUserModal");
    modal.find('#delete-user-id').val(event.target.id);
    modal.modal();
  });

  //on click to delete vote schedule
  $(".dlt-schedule").click(function (event) {
    var modal = $("#deleteScheduleModal");
    modal.find('#delete-schedule-id').val(event.target.id);
    modal.modal();
  });

  // on click to edit profile
  $("#editProfile").click(function (event) {
    // get role
    let role = $(event.target).attr('class').split(' ')[1];

    editProfile(role);
  });

});