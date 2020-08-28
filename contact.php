<?php
include_once("header.html");
?>
    <title>Final Year Project</title>
    <link rel="stylesheet" href="assets/css/contact.css">

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
                    <h1 class="section-title" id="contact-title" style="color:  #e91d36;">Love to Hear From You</h1>
                </div>
            </div>
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                  <p class="mb-5  text-justify">We provide voting service you can ask for voting service. You can ask for voting setup of your organization, Feel free to send us message via our website, or social media. and your feedback and review also appreciated.</p>

                  <div class="social">
                    <a href="https://facebook.com" class="text-decoration-none text-dark"><i class="fa fa-facebook mr-3"></i> Facebook/voblok </a>
                  </div>
                  <div class="social">
                    <a href="https://twitter.com" class="text-decoration-none text-dark"><i class="fa fa-twitter mr-3"></i> twitter/voblok </a>
                  </div>
                  <div class="social">
                    <a href="https://instagram.com" class="text-decoration-none text-dark"><i class="fa fa-instagram mr-3"></i> instagram/voblok </a>
                  </div>
                  <div class="social">
                    <a href="mailto:EVoteCastingCoderBoost++@gmail.com" class="text-decoration-none text-dark"><i class="fa fa-google mr-3"></i> Gmail </a>
                  </div>
                  <div class="social">
                    <a href="https://linkedin.com" class="text-decoration-none text-dark"><i class="fa fa-linkedin mr-3"></i> linkedin/voblok </a>
                  </div>

                </div>
                <!-- contact form -->
                <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">

                    <!-- <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">

                        <div class="form-group label-floating">
                          <label class="control-label" for="name">Name</label>
                          <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                          <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group label-floating">
                          <label class="control-label" for="email">Email</label>
                          <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                          <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group label-floating">
                          <label class="control-label">Subject</label>
                          <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                          <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group label-floating">
                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-submit mt-5">
                            <button class="btn btn-outline-dark" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form> -->

                    <form class="contact1-form validate-form">
              				<div class="wrap-input1 validate-input" data-validate = "Name is required">
              					<input class="input1" type="text" name="name" placeholder="Name">
              					<span class="shadow-input1"></span>
              				</div>

              				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
              					<input class="input1" type="text" name="email" placeholder="Email">
              					<span class="shadow-input1"></span>
              				</div>

              				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
              					<input class="input1" type="text" name="subject" placeholder="Subject">
              					<span class="shadow-input1"></span>
              				</div>

              				<div class="wrap-input1 validate-input" data-validate = "Message is required">
              					<textarea class="input1" name="message" placeholder="Message"></textarea>
              					<span class="shadow-input1"></span>
              				</div>

              				<div class="container-contact1-form-btn">
              					<button class="contact1-form-btn">
              						<span>
              							Send Email
              							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              						</span>
              					</button>
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
