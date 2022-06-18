<?php
require("conf.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>Contact Us</title>
    <link rel="shortcut icon" href="images/mylogo.jpg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://www.momentcrm.com/embed"></script>
<script>
  MomentCRM('init', {
    'teamVanityId': 'alocryptotrade',
    'doChat': true,
    'doTracking': true,
  });
</script>
</head>

<body>
    <center>
       <?php
        require("./components/navbar.php")
       ?>
        <!-- ================================================  SECTION 31   ======================================================= -->
        <section class="sec31">
            <div class="h1stylisec31">
                <h1>Contact Us</h1>
            </div>
        </section>
        <!-- ================================================  SECTION 42   ======================================================= -->
        <section class="sec41">
            <div class="overallflexxsec">
                <div class="columnn">
                    <h3 class="h3styli">Contact Form</h3>

                    <form id="sendmail">
                        <div class="container">

                            <label for="name"><b>Your Name (required)</b></label>
                            <input type="text" placeholder="Enter Name" required name="name" required>

                            <label for="email"><b>Your Email (required)</b></label>
                            <input type="email" placeholder="Enter Email" required name="email" required>

                            <label for="subject"><b>Subject</b></label>
                            <input type="text" placeholder="Enter Subject" required name="subject" required>

                            <label for="message"><b>MESSAGE*</b></label>
                            <textarea name="message" id="message" cols="55" required rows="15"></textarea>

                            <button id="cbtn" type="submit" class="subm">SEND</button>
                            <img style="display: none;" id="loading" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/b6e0b072897469.5bf6e79950d23.gif" alt="" srcset="" width="50px" height="50px">
                        </div>
                    </form>
                </div>

                <div class="columnn">
                    <div class="enve22">
                        <img src="./images/envelope">
                    </div>

                    <div class="wordyy">
                        <p>Got a question? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================================================== FOOTER ================================================================ -->

        <section class="sec9">
            <div class="rowsec9">
                <div class="colsec9">
                    <img src="./images/cryptofooter.jfif" class="logosec9">
                    <p>Alocryptotrade ltd is a btc investmeny companyfounded by commercial traders with five years
                        experience of successful activity in the Forex market, as well as cryptocurrency exchanges</p>
                </div>
                <div class="colsec9">
                    <h3>Office <div class="underline"><span></span></div>
                    </h3>
                    <p>Cardiff City</p>
                    <p>CF14 8LH, United Kingdom</p>
                    <p class="email-id"> cryptotrade@gmail.com</p>
                    <h4>+44 -20 -1372 -6758 </h4>
                </div>
                <div class="colsec9">
                    <h3>Links <div class="underline"><span></span></div>
                    </h3>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="dashboard">My account</a></li>
                        <li><a href="about">About Us</a></li>
                        <li><a href="contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="colsec9">
                    <h3>Newsletter <div class="underline"><span></span></div>
                    </h3>
                    <form action="">
                        <i class="far fa-envelope"></i>
                        <input type="email" placeholder="Enter your email id" required>
                        <button type="submit"><i class="fas fa-arrow-right"></i></button>
                    </form>
                    <div class="social-icons">
                        <a href="https://t.me/annfranz"><i class="fab fa-telegram"></i></a>
                        <a href="https://api.WhatsApp.com/send?phone=+14136794148"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <p class="copyright">Cryptotradegain @ 2021 - All Rights Reserved</p>
        </section>
    </center>
    <script src="main.js"></script>
    <script>
        $(document).ready(function() {
            $("#sendmail").submit(function(e) {
                e.preventDefault();
                $("#loading").css("display", "block");
                $("#cbtn").css("display", "none");
                let contactdata = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "handler",
                    data: {
                        contactdata: contactdata
                    },
                    // dataType: "dataType",
                    success: function(response) {
                        alert(response);
                        $("#loading").css("display", "none");
                        $("#cbtn").css("display", "block");
                    }
                });

            });
        });
    </script>

</body>

</html>