// on document ready
$(document).ready(function () {
  // when logout is clicked 
  $("#log-me-out").click(function (event) {
    alert("Logging out!");
    log_out();
  });

  //on click to edit candidate
  $(".edit-candidate").click(function (event) {
    alert("edit!, id: " + event.target.id);
  });
  
  //on click to delete candidate 
  $(".dlt-candidate").click(function (event) {
    var modal = $("#deleteCandidateModal");
    modal.find('#delete-candidate-id').val(event.target.id);
    modal.modal();
    
  });


});