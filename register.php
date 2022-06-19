<?php
require("conf.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>ALOCRYPTOTRADE|Registration</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
    <?php
    session_start();
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <center>
        <header class="l-header">
            <?php
            require("./components/navbar.php")

            ?>
        </header>
        <!-- ================================================  SECTION 41   ======================================================= -->
        <section class="sec41">
            <div class="h1stylisec41">
                <h1>Register</h1>
            </div>
        </section>

        <!-- ================================================  SECTION 42   ======================================================= -->
        <section class="sec42">
            <div class="overallflexxisec42">
                <form id="rform" action="handler" method="post" enctype="multipart/form-data">

                    <div class="colsec42">
                        <label for="uname">Username*</label>
                        <input type="text" id="uname" required name="uname" placeholder="Your Username..">

                        <label for="email">User Email</label>
                        <input type="email" id="email" name="email" required placeholder="Your Email..">
                    </div>
                    <?php $message = $_SESSION['message']; ?>
                    <div class="colsec42">
                        <label for="password">User Password*</label>
                        <input type="password" id="password" name="password" required placeholder="Your Password..">

                        <label for="confpassword">Confirm Password</label>
                        <input type="password" id="confpassword" name="confpassword" required placeholder="Confirm your Password..">
                    </div>

                    <div class="colsec42">
                        <label for="uimage">User Image*</label>
                        <input type="file" id="uimage" name="uimage" required placeholder="Upload Picture..">

                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" required name="phone" placeholder="Your Phone Number..">
                    </div>
                    <button type="submit" name="signup_submit" class="subm">SEND</button>

                </form>
                <br>

            </div>
        </section>

        <!-- ================================================== FOOTER ================================================================ -->
        <?php require("./components/footer.php") ?>
    </center>
    <script src="main.js"></script>
    <script>
        var message = "<?php echo $message;   ?>";
        if (message) {
            swal({
                title: "Verify Login",
                text: message,
                icon: "info",
            });
            // message="";
        }
        $(document).ready(function() {
            $("#rform").submit(function(e) {
                let pass = $.trim($("#password").val);
                let passc = $.trim($("#confpassword").val);
                if (pass == passc) {
                    return true;
                } else {
                    alert("password not match")
                    return false;
                }

            });
        });

    </script>
     <?php $_SESSION['message']="";   ?>
</body>

</html>