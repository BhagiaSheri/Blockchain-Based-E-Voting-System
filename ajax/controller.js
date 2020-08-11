function log_out(){
    // var log_me_out="true";
    $.post("../log_out.php",
    function(data){
      // alert("returned: "+data);
      //to redirect back to main page after logging out
      window.location.assign("admin.php");     
    });
}

