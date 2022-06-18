<?php
require("conf.php");
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>AloCryptoTrade:Resetpassword</title>
  <link href='#' rel='stylesheet'>
  <script src="https://www.momentcrm.com/embed"></script>
<script>
  MomentCRM('init', {
    'teamVanityId': 'alocryptotrade',
    'doChat': true,
    'doTracking': true,
  });
</script>
  <link href='#' rel='stylesheet'>
  <!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
  <style>
    ::-webkit-scrollbar {
      width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "poppins", sans-serif
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #000
    }

    .container {
      background: rgb(15, 15, 15);
      width: 350px;
      height: 350px;
      border-radius: 20px;
      display: flex;
      justify-content: center;
      flex-direction: column;
      color: #fff;
      padding: 2em
    }

    .heading {
      font-size: 2em;
      margin-bottom: 0.5em
    }

    .box {
      margin: 0.2em 0
    }

    .container .box p {
      color: rgba(255, 255, 255, 0.701)
    }

    .container .box div {
      position: relative;
      width: 100%;
      height: 40px;
      margin: 0.2em 0
    }

    .container .box input {
      position: absolute;
      width: 100%;
      height: 100%;
      background: rgba(19, 19, 19);
      color: #fff;
      border: none;
      outline: none;
      padding-left: 0.8em;
      border-radius: 10px;
      transition: all 0.5s
    }

    .container .box input:focus::placeholder {
      color: #fff
    }

    .container .box div::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 102%;
      height: 105%;
      border-radius: 10px;
      background: linear-gradient(to right, #ff416c, #ff4b2b)
    }

    .loginBtn {
      width: 102%;
      height: 40px;
      border-radius: 10px;
      margin: 0.2em 0;
      transform: translate(-1%);
      cursor: pointer;
      color: #fff;
      background: linear-gradient(to right, #ff416c, #ff4b2b);
      transition: all 0.5s
    }

    .loginBtn:hover {
      transform: translate(-1%, 5%);
      box-shadow: 0 0 10px #ff416d65
    }

    .text {
      font-size: 0.8em;
      margin-top: 0.5em;
      text-align: center;
      color: rgba(255, 255, 255, 0.625)
    }

    .text a {
      color: rgba(255, 255, 255, 0.911)
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body className='snippet-body'>
  <?php
  if (isset($_SESSION['message']) and !empty($_SESSION['message'])) {



  ?>
    <div class="alert alert-danger mt-4" role="alert">
      <?php
      echo @$_SESSION['message'];
      @$_SESSION['message'] = "";
      ?>
    </div>

  <?php
  }
  ?>
 
    <div class="container">
      <img src="<?php echo BASEURL ?>images/mylogo.jpeg" width="50px" height="50px" /> AlocryptoTrade
      <p class="heading mt-3">Reset Password</p>
      <form id="rdpassword" >
      <div class="box">
        <p>New Password</p>
        <div> <input required type="password" name="password" autocomplete="off" placeholder="Enter New Password"> </div>
      </div>
      <input type="hidden" value="<?php echo $_GET['code'] ?>" name="code" />
      <input type="hidden" value="<?php echo $_GET['email'] ?>" name="email" />
      <div class="box">
        <p>Password Again</p>
        <div>
           <input type="password" required autocomplete="off" name="passwordagain" placeholder="Enter Password again"> </div>
      </div> <button type="submit" class="loginBtn">Update</button>
      </form>
      <!-- <p class="text">Don't have an account? <a href="#">Signup</a></p> -->
    </div>
  <!-- </form> -->
  <script type='text/javascript'></script>
  <script type='text/javascript'>
    // var myLink = document.querySelector('a[href="#"]');
    // myLink.addEventListener('click', function(e) {
    //   e.preventDefault();
    // });
    // var form=document.getElementById("rdpassword");
    // form.addEventListener("submit",function(e){
    //   e.preventDefault();
    //     // var data=$(this).serialize()
    //     alert("data");
    // })
    $(document).ready(function () {
      $("#rdpassword").submit(function (e) { 
        e.preventDefault();
        var data=$(this).serialize();
         $.ajax({
           type: "POST",
           url: "handler",
           data: {
             setNewPassword:data
           },
           dataType: "text",
           success: function (response) {
            if(response==true){
              alert("successful");
              window.location.href="./signin";
            }else{
             alert(response);
            }
           }
         });

      });
    });
  </script>

</body>

</html>