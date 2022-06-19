<?php
require("conf.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
 <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="withdraw.css">
    
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="shortcut icon" href="images/mylogo.jpg" type="image/x-icon">
    <title>ALOCRYPTOTRADE|Forgot Password</title>
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
    //  require("./components/navbar.php")
    ?>
    <center>
        <div class="padlockimg">
            <img src="<?php echo BASEURL?>images/Padlock-Transparent-PNG.png" alt="">
        </div>

        <div class="wordingscent">
            <h1>Forgot Password ?</h1>
         <?php
         
    //   echo $newTime = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +30 minutes"));

         ?>
            <p>You can reset your password here</p>
        </div>

        <div class="buttons">
            <form id="forget-password" >
            <!-- <label for="newpassword">New Password</label><br>
            <input type="password" id="newpassword" name="newpassword"><br><br><br>

            <label for="confmpassword"> Confirm Password</label><br>
            <input type="password" id="confmpassword" name="confmpassword"><br><br><br> -->

            <label for="emaili">Email</label><br><br>
            <button type="button" class="buttt1">
            <i class="fas fa-envelope"></i>
             <input required type="hidden"  required value="forget-password" class="inputtbutt" id="forget-password" name="forget-password"></button>   <br><br><br>
            <input required type="email" required class="inputtbutt" id="email" name="email"></button>   <br><br><br>
            <img style="display: none;" id="loading" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/b6e0b072897469.5bf6e79950d23.gif" alt="" srcset="" width="50px" height="50px" >

            <button id="fbtn" type="submit" class="buttti2"  >Send My Password</button>
            </form>
        </div>
    </center>
      <script>
   $(document).ready(function () {
       $("#forget-password").submit(function (e) {
           e.preventDefault();
           let forget_password =$(this).serialize();
           $("#loading").css("display","block");
           $("#fbtn").css("display","none");
           $.ajax({
               type: "POST",
               url: "handler",
               data: {
                   "forget_password":forget_password
               },
               dataType: "text",
               success: function (response) {
                  alert(response);
                    $("#loading").css("display","none");
                   $("#fbtn").css("display","block");
               }
           });

       });
   });
    </script>
</body>
</html>