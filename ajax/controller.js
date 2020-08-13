function log_out(){
    $.post("../log_out.php",
    function(data){
      // alert("returned: "+data);
      //to redirect back to main page after logging out
      window.location.assign("admin.php");     
    });
}

// edit candidate data
function editCandidate(id)
{
  $.post("edit-candidate.php",{id:id},
  function(data){
    // var s = JSON.stringify(data);
    var a = JSON.parse(data);
    
    // set valued to edit modal and render it on page
  
    var modal = $("#editCandidateModal");
    $("#edit-candidate-id").val(a.c_id);
    $("#edit-candidate-name").val(a.name);
    $("#edit-candidate-email").val(a.email);
    $("#edit-candidate-contact").val(a.contact);
    $("#edit-candidate-designation").val(a.designation);
    $("#edit-candidate-age").val(a.age);

    $("#edit-candidate-name").html(a.name);

    modal.find('#edit-candidate-img-container').html(a.profile);
    modal.modal();
    
  });
}

