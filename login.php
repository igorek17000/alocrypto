<?php
session_start();
?>
<?php
require("conf.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>ALOCRYPTOTRADE|Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/mylogo.jpg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://www.momentcrm.com/embed"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        MomentCRM('init', {
            'teamVanityId': 'alocryptotrade',
            'doChat': true,
            'doTracking': true,
        });
    </script>
</head>

<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <center>
        <?php
        require("./components/navbar.php")
        ?>
        <!-- ===============SECTION 1================== -->

        <section class="regsec1">

            <div class="midd">
                <div class="boxx">
                    <div class="icon-area">
                        <img src="./images/cryptofooter.jfif" class="imggsty">
                        <img src="./images/Padlock-Transparent-PNG.png" class="boximgg">
                    </div>

                    <div class="logup">
                        <h3 class="text-info">WELCOME!. <small>Kindly login.</small></h3>
                    </div>
                    <form id="loginsubmit" action="handler" method="post">

                        <div class="logindiv ">

                            <div class="mb-3 mt-3 ms-auto me-auto">
                                <label for="email" class="form-label text-white">Email address</label>
                                <input type="email" name="email" class="form-control w-100" id="email" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="password" class="form-label text-white">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <?php $message = $_SESSION['message']; ?>

                            <button type="submit" name="signin_submit" class="loginbutton">Log in</button>

                            <div class="forggclaz">
                                <a href="forgetpassword" class="forgstyle">Forgot your password?</a>
                            </div>


                        </div>
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



                                $("#loginsubmit").submit(function(e) {

                                    var email = $("#email").val()
                                    var password = $("#password").val()
                                    if (email && password) {
                                        return true;
                                    } else {
                                        e.preventDefault();
                                        alert("All fileds are required")

                                        return false;
                                    }
                                });

                            });
                        </script>
                    </form>
                    <!-- <div class="forggclaz">
                       

                        <a href="/" class="forgstyle4">Back to home page</a>

                    </div> -->
                    <?php $_SESSION['message']="";   ?>
                </div>
            </div>
        </section>


        <!-- ================================================== FOOTER ================================================================ -->

        <?php require("./components/footer.php") ?>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>