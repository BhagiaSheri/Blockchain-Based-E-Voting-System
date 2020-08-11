<?php
include_once("header.html");
?>
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Final Year Project</title>
    <link rel="stylesheet" href="./assets/css/contact.css">

</head>

<body>
<?php
include_once("navbar.html");
?>

          <!-- Contact Us Section -->
    <section class="Material-contact-section section-padding section-dark">
        <div class="container">
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">Love to Hear From You</h1>
                </div>
            </div>
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content.</p>

                  <div class="find-widget">
                   Company:  <a href="https://hostriver.ro">HostRiver</a>
                  </div>
                  <div class="find-widget">
                   Address: <a href="#">4435 Berkshire Circle Knoxville</a>
                  </div>
                  <div class="find-widget">
                    Phone:  <a href="#">+ 879-890-9767</a>
                  </div>

                  <div class="find-widget">
                    Website:  <a href="https://uny.ro">www.uny.ro</a>
                  </div>
                  <div class="find-widget">
                     Program: <a href="#">Mon to Sat: 09:30 AM - 10.30 PM</a>
                  </div>
                </div>
                <!-- contact form -->
                <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                    <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                        <!-- Name -->
                        <div class="form-group label-floating">
                          <label class="control-label" for="name">Name</label>
                          <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                          <div class="help-block with-errors"></div>
                        </div>
                        <!-- email -->
                        <div class="form-group label-floating">
                          <label class="control-label" for="email">Email</label>
                          <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                          <div class="help-block with-errors"></div>
                        </div>
                        <!-- Subject -->
                        <div class="form-group label-floating">
                          <label class="control-label">Subject</label>
                          <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                          <div class="help-block with-errors"></div>
                        </div>
                        <!-- Message -->
                        <div class="form-group label-floating">
                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Form Submit -->
                        <div class="form-submit mt-5">
                            <button class="btn btn-outline-dark" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </section>

    </div>


    <?php

     include("footer.html");
include_once("footer-script.html");
?>
</body>
</html>
