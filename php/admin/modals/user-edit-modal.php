<script>
    let td1, td2, td3, td4, td5, td6, u_id;

    function addValues(element) {

        u_id = element.id;
        td1 = element.parentNode.parentNode.firstChild; // first td
        td2 = td1.nextSibling; // second td 
        td3 = td2.nextSibling;
        td4 = td3.nextSibling;
        td5 = td4.nextSibling;

        document.getElementById("user-profile-img").src = td1.firstChild.src;
        document.getElementById("uname").value = td2.innerHTML;
        document.getElementById("uemail").value = td3.innerHTML;
        document.getElementById("uage").value = td4.innerHTML;
        document.getElementById("uphone-no").value = td5.innerHTML;
        document.getElementById("user-id").value = u_id;
    }
</script>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="d-flex justify-content-center" method="POST" enctype="multipart/form-data" action="update-users.php">
                <div class="modal-body d-flex  justify-content-around row flex-column-reverse flex-lg-row">
                    <section>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="uname" id="uname" class="form-control input_user" value="" placeholder="Full Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" name="uemail" id="uemail" class="form-control input_user" value="" placeholder="Email Address" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="tel" name="uphone-no" id="uphone-no" class="form-control input_user" value="" placeholder="Contact No." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="number" id="uage" name="uage" class="form-control" placeholder="Age" required>
                            </div>
                        </div>

                    </section>

                    <section id="image-place-holder" class="d-flex flex-column align-items-center">
                        <div>
                            <img src="../../assets/images/user.png" id="user-profile-img" alt="Profile Picture" width="180px">
                        </div>
                        <div class="mt-3 ml-5 mb-3 profile_container">
                            <input type="file" name="user-profile" id="user-profile" class="file_btn" accept="image/*" />
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <input style="display: none;" id="user-id" name="user-id" value="" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" id="edit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once("footer-script.html");
?>
<script src="../../assets/script/image-holder.js"></script>