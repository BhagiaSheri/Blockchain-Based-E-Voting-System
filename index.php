<?php
include_once("header.html");
?>
<title>VO-BLOK</title>
</head>

<body>
    <?php
    include_once("navbar.html");
    ?>

    <!--Carousel Wrapper-->
    <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
            <li data-target="#video-carousel-example2" data-slide-to="1"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
            <div class="carousel-item active">

                <div class="view">

                    <video class="video-fluid" width="100%" autoplay loop muted>

                        <source src="assets/videos/logo.mp4" type="video/mp4" />
                    </video>
                    <div class="mask rgba-indigo-light"></div>
                </div>

            </div>
            <!-- /.First slide -->

            <!-- Second slide -->
            <div class="carousel-item">

                <div class="view d-flex align-items-center justify-content-center">

                    <video class="video-fluid" width="100%" autoplay loop muted>
                        <source src="assets/videos/logo-name.mp4" type="video/mp4" />
                    </video>
                    <!-- <div class="mask rgba-purple-slight"></div> -->
                </div>


                <!--Caption-->
            </div>
            <!-- /.Second slide -->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>

    <!--Carousel Wrapper-->


    <div class="container-fluid mt-5 px-5" id="whywoblok">
        <h1 class="mb-5 vo_under">Why VO-BLOK</h1>

        <div class="row">
            <div class="col-lg-6 pb-3 why-vo-blok">
                In these days, We follow traditional voting system almost. In traditional voting system, we face many problems. Just like travel place to place waiting in long queues and very big problem of security. From this system peoples getting frustrated and and this is also very time consuming process or system.

                The consequences of traditional voting system are decrease the availability of voters. Political, social and economical issues are also increases. It also very costly.

                Now, we best solution of these problems. we have to converted to digitalize system. Replace manual work with digital system. But in digital system we also have thread of security which I main problem. How we make our digital system secure. Because in digital system we also face security issue jest like hacking etc.

                So, that why we are here with VO-BLOK. Vo-blok is blockchain based E-voting system. In this system we provide decentralize system, which is transparent, secure and immutable. The I no chances of security issues. Because we use blockchain technology which is highly secured. In this system, their is no chances for temper your vote.

                V0-blok is the best solution for e-voting system wit high security. You can give easily vote from your home without any thread.
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <video width="100%" controls>
                        <source src="assets/videos/why-vo-blok.mp4" type="video/mp4" />
                        Your browser does not support HTML5 video.
                    </video>
                </div>
            </div>

        </div>
    </div>
    <div class="container mb-5 mt-5" id="advantages">
        <h2>
            Advantages of Blockchain
        </h2>


        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                    <div class="hovereffect">
                        <img class="img-responsive advantages__img" src="assets/images/transparency.jpg" alt="">
                        <div class="overlay">
                            <p class="info">Transparency</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                    <div class="hovereffect">
                        <img class="img-responsive advantages__img" src="assets/images/security.jpg" alt="">
                        <div class="overlay">
                            <p class="info"> Security </p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                    <div class="hovereffect">
                        <img class="img-responsive advantages__img" src="assets/images/immutability.jpg" alt="">
                        <div class="overlay">
                            <p class="info"> Immutability </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid mt-3 px-5 hotovote">
        <h1>How to Vote</h1>
    </div>

    <div class="container-fluid pt-3 mt-5 howtovote" id="howtovote">

        <div class="container mt-5 mb-4">
            <h1 class="text-white">
                <a href="" class="typewrite text-white" data-period="2000" data-type='[ "Hi, Vo-Blok here.", "Block chain based E-Voting system", "Make your vote secure", "Make your vote transparent" ]'>
                    <span class="wrap"></span>
                </a>
            </h1>
        </div>

        <div class="container mt-1 ">

            <div class="row py-2 rel text-center">
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 py-3 hoverr wrapper">
                    <img src="assets/images/registration.png" width="=80%" class="hover_item mb-3" data-hover="hello">
                    <div class="overlay">
                        <div class="content">
                            <p> User has to register themselves <br>
                                <a href="signup.php"> Click here for register </a>
                            </p>
                        </div>
                    </div>
                    <p class="text-white mt-3">Registration</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 py-3 hoverr wrapper">
                    <img src="assets/images/authentication.png" width="=80%" class="hover_item mb-3" data-hover="hello">
                    <div class="overlay">
                        <div class="content">
                            <p>
                                Wait to be verified by admin, you will recieve an activation e-mail.
                            </p>
                        </div>
                    </div>
                    <p class="text-white mt-3 ">Users Authentication</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 py-3 hoverr wrapper">
                    <img src="assets/images/login.png" width="=80%" class="hover_item mb-3" data-hover="hello">
                    <div class="overlay">
                        <div class="content">
                            <p>
                                User will be login here, and start Voting <br>
                                <a href="login.php"> Click here for login </a>
                            </p>
                        </div>
                    </div>
                    <p class="text-white mt-3 ">Login</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 py-3 hoverr wrapper">
                    <img src="assets/images/vote-cast.png" width="=80%" class="hover_item mb-3" data-hover="hello">
                    <div class="overlay">
                        <div class="content">
                            <p>
                                Cast vote for your favourite candidate, and make impact.
                            </p>
                        </div>
                    </div>
                    <p class="text-white mt-3 ">Vote Cast</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 py-3 hoverr wrapper">
                    <img src="assets/images/verify-vote.png" width="=80%" class="hover_item mb-3" data-hover="hello">
                    <div class="overlay">
                        <div class="content">
                            <p>
                                After casting vote <a href="login.php"> Signin </a> and verify your vote.
                            </p>
                        </div>
                    </div>
                    <p class="text-white mt-3 ">Verify Vote</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 py-3 hoverr wrapper">
                    <img src="assets/images/winner.png" width="=80%" class="hover_item mb-3" data-hover="hello">
                    <div class="overlay">
                        <div class="content">
                            <p> Hurrah!</p>
                        </div>
                    </div>
                    <p class="text-white mt-3 ">Winner</p>
                </div>
                <div class="back-line"></div>
            </div>
        </div>
    </div>
    <?php
    include("footer.html");
    ?>

    <?php
    include_once("footer-script.html");
    ?>


</body>

</html>