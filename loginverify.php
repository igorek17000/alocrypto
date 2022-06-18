<?php
require("app/Database.php");
// require("./conf.php");
$message = "";
$errorr = false;
if (isset($_GET['code']) and !empty($_GET['code'])) {
    $code = htmlentities($_GET['code']);
    $p1 = "SELECT * FROM `authorization` WHERE `code`=:co ";
    $stm = Database::getConn()->prepare($p1);
    $stm->bindParam("co", $code);

    $stm->execute();
    if ($stm->rowCount() > 0) {
        $usersdetaile = $stm->fetch();
        $expdate = $usersdetaile->exp_data;
        $expdate = date("Y-m-d h:i:s", strtotime($expdate));
        $nowdate = date('d-m-y h:i:s');
        if ($expdate > $nowdate) {
            $myconn = Database::getConn();
            $qury = "SELECT `id` FROM `users` WHERE `email`=:email";
            $stm = $myconn->prepare($qury);
            $stm->execute(array(":email" => $usersdetaile->email));
            if ($stm->rowCount() >= 1) {
                $res = $stm->fetch();
                $_SESSION['userid'] = $res->id;
                $_SESSION['user'] = $res;
                // header("location:./dashboard");
                $errorr = false;
                $message = "Authentication Autorized";
            } else {
                $message = "Can not Autorized Login";
                $errorr = true;
            }
        } else {
            $message = "token time as expaired try again";
            $errorr = true;
        }
    } else {
        $message = "invalid link refrence try again";
        $errorr = true;
    }
} else {
    $message = "Verification Token Code not set";
    $errorr = true;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alocryptotrade</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <div class="card-body">
        <!-- <div class="wrapper text-center">
            <h4 class="card-title">Alerts Popups</h4>
            <p class="card-description">A success message!</p> 
            <button class="btn btn-outline-success" onclick="showSwal('success-message')">Click here!</button>
        </div> -->
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var message = "<?php echo $message ?>";
        var error = "<?php echo $errorr  ?>";
        if (error == false) {
            swal({
                title: "Authorized",
                text: message,
                icon: "success",
                button: "Continue",
            }).then(()=>{
               window.location.href="./dashboard"
            });

        } else {
            swal({
                title: "Error occour!",
                text: message,
                icon: "error",
                button: "Back ",
            }).then(()=>{
               window.location.href="./signin"
            });

        }
    </script>
</body>

</html>