// on document ready
$(document).ready(function () {
  // when logout is clicked 
  $("#log-me-out").click(function (event) {
    alert("Logging out!");
    log_out();
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
  


});