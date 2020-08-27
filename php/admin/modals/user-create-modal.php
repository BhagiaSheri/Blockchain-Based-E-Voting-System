<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="d-flex justify-content-center" method="POST" enctype="multipart/form-data" action="../user-signup.php">
                <div class="modal-body d-flex  justify-content-around row flex-column-reverse flex-lg-row">
                    <section>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="uname" class="form-control input_user" value="" placeholder="Full Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" name="uemail" class="form-control input_user" value="" placeholder="Email Address" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="tel" name="uphone-no" class="form-control input_user" value="" placeholder="Contact No." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="udob" class="form-control input_user" value="" placeholder="Date Of Birth" title="Enter Date of Birth" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="upass" class="form-control input_pass" value="" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="uconfirm_pass" class="form-control input_user" value="" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </section>

                    <section id="image-place-holder" class="d-flex flex-column align-items-center">
                        <div>
                            <img src="../../assets/images/user.png" id="profile-img-tag" alt="Profile Picture" width="180px">
                        </div>
                        <div class="mt-3 ml-5 mb-3 profile_container">
                            <input type="file" name="profile-pic" id="profile-pic" class="file_btn" accept="image/*" required />
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once("footer-script.html");
?>
<script src="../../assets/script/image-holder.js"></script>