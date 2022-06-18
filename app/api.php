<?php
session_start();
require "Database.php";
// history
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_REQUEST['isHistory']) and $_REQUEST['isHistory'] == true and isset($_REQUEST['history'])) {
        
        $_SESSION['history'] = $_REQUEST['history'];
        echo "ok";
    }

}

// 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // update forget password
    if (isset($_REQUEST['setNewPassword'])) {
        parse_str($_REQUEST['setNewPassword'],$data);
      
        if($data['password']==$data['passwordagain']){
       echo Database::updateForgetPasswordPassword($data);
        }else{
           echo"Password Not match";
        }

    }



    // sendforgetpassword
    if (isset($_REQUEST['forget_password'])) {
         parse_str($_REQUEST['forget_password'],$data);
        $email=$data['email'];
       echo Database::sendAuthRestPasswordEmail($email);
            
        
    }
    // cripto
    if (isset($_REQUEST['action']) and $_REQUEST['action'] == "currency") {
        $currency = htmlentities($_REQUEST['currency']);
        $_SESSION['currency'] = $currency;
    }
// crypto
    if (isset($_REQUEST['action']) and $_REQUEST['action'] == "crypto") {
        $crypto = htmlentities($_REQUEST['crypid']);
        $_SESSION['crypoid'] = $crypto;
    }
    // login
    if (isset($_REQUEST['signin_submit'])) {
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        $response = Database::signin_user($email, $pass);
        if ($response == true) {
            
            $_SESSION['message'] = "Verification Email as be sent to you check your inbox";
            header("location:signin");

        } else {
            $_SESSION['message'] = $response;
            header("location:signin");
    
        }

    }
// register
    if (isset($_REQUEST['signup_submit'])) {
        $username = htmlentities($_POST['uname']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $cpassword = htmlentities($_POST['confpassword']);
        $phone = htmlentities($_POST['phone']);
        $file = $_FILES['uimage'];

        $filename = $file['name'];
          $filesize = $file['size'];
        if ($filesize > 0 and $filesize < 8388608) {
            //  file explode
            $file_exe = explode('.', $filename);
            //  gettimg file exe
            $file_exe = strtolower(end($file_exe));
            //  file $fileAllow
            $fileAllow = array('jpg', 'jpeg', 'png');
 try {
    if (in_array($file_exe, $fileAllow)) {
        $dest = "./uploadimageF/" . $filename;
        if (move_uploaded_file($file['tmp_name'], $dest)) {
            $response = Database::register($email, $pass, $fname, $phone, $filename);
            if ($response == "true") {
                header("location:signin");
            } else {
                $_SESSION['message'] = $response;
                header("location:signup");

            }
        } else {
            $_SESSION['message'] = "file not moved";
         echo "not mmove";
            header("location:signup");

        }
    } else {
        $_SESSION['message'] = "invalid format";

        header("location:signup");

    }
 } catch (\Throwable $th) {
     echo $th;
 }
           
            // echo'am here sir';

        } else {
            $_SESSION['message'] = "file too large or too small";

            header("location:signup");

        }
    }

    // pages
    if (isset($_REQUEST['page']) and !empty($_REQUEST['page']) and isset($_REQUEST['action']) and $_REQUEST['action'] == "transform") {
        // header("Content-Type: application/json; charset=UTF-8");
        $_SESSION['page'] = $_REQUEST['page'];
        $_SESSION['title'] = $_REQUEST['title'];
        echo "ok";

    }
    // coverter

    if (isset($_REQUEST['converttobtc']) and !empty($_REQUEST['converttobtc'])) {
        // header("Content-Type: application/json; charset=UTF-8");
        $amt = htmlentities($_REQUEST['converttobtc']);
        $btcprice = $_REQUEST['btc'];
        $price = $amt / $btcprice;
        $price = $price * 100000000;
        // echo json_encode(array("code" => 200, "price" => $price), true);
        echo $price;


    }
    if (isset($_REQUEST['planid']) and !empty($_REQUEST['planid'])) {
        // header("Content-Type: application/json; charset=UTF-8");
        $_SESSION['page'] = $_REQUEST['page'];
        $_SESSION['title'] = $_REQUEST['title'];
        $id = $_REQUEST['planid'];
        $response = Database::subscribe($id);
        // echo json_encode(array("code" => 200, "message" => "set"));
        echo "ok";

    }
// set investment
    if (isset($_REQUEST['investamt']) and !empty($_REQUEST['investamt'])) {
        // header("Content-Type: application/json; charset=UTF-8");

        $amt = htmlentities($_REQUEST['investamt']);
        Database::updateAccout("investment", $amt);
        $id = $_SESSION["userid"];

        $conn = Database::getConn();
        $stm = $conn->prepare("UPDATE `account` SET `balance`=`balance`-:val WHERE `id`=:id");
        $stm->bindParam(":val", $amt);
        $stm->bindParam(":id", $id);
        $stm->execute();
        echo json_encode(array("code" => 200, "message" => "set"));

    }
// set deposit
    if (isset($_REQUEST['deposit']) and $_REQUEST['deposit'] == true) {
        header("Content-Type: application/json; charset=UTF-8");

        $_SESSION['amt'] = htmlentities($_REQUEST['amt']);
        $_SESSION['page'] = $_REQUEST['page'];
        $_SESSION['title'] = $_REQUEST['title'];
//    if(Database::cre)
        // echo json_encode(array("code" => 200, "message" => "set"));
        echo "ok";


    }

    if (isset($_REQUEST['getState']) and $_REQUEST['getState'] == true) {
        echo Database::getStatus();
    }

// invest
    if (isset($_REQUEST['investamt']) and !empty($_REQUEST['investamt'])) {
        // header("Content-Type: application/json; charset=UTF-8");

        $amt = htmlentities($_REQUEST['investamt']);
        Database::updateAccout("investment", $amt);
        $id = $_SESSION["userid"];

        $conn = Database::getConn();
        $stm = $conn->prepare("UPDATE `account` SET `balance`=`balance`-:val WHERE `id`=:id");
        $stm->bindParam(":val", $amt);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $_SESSION['page'] = $_REQUEST['page'];
        $_SESSION['title'] = $_REQUEST['title'];
echo "ok";


    }

// cashout

    if (isset($_REQUEST['withdrawamt']) and !empty($_REQUEST['withdrawamt'])) {
        // header("Content-Type: application/json; charset=UTF-8");

        $withdrawamt = htmlentities($_REQUEST['withdrawamt']);

        Database::updateAccout("withdraw", $amt);
        $id = $_SESSION["userid"];
        $addr = Database::getPayOutAddress();
        $moth = Database::getPayOutMethod();

        $conn = Database::getConn();
        $stm = $conn->prepare("UPDATE `account` SET `balance`=`balance`-:val WHERE `id`=:id");
        $stm->bindParam(":val", $amt);
        $stm->bindParam(":id", $id);
        $stm->execute();

        $stm = $conn->prepare("INSERT INTO `withdraw`(`id`, `method`, `address`,`amt`) VALUES (:id,:moth,:addr,:amt)");
        $stm->bindParam(":amt", $amt);
        $stm->bindParam(":id", $id);
        $stm->bindParam(":addr", $addr);
        $stm->bindParam(":moth", $moth);
        $_SESSION['page'] = $_REQUEST['page'];
        $_SESSION['title'] = $_REQUEST['title'];

        $stm->execute();

        echo "ok";

    }
// updating methods
    if (isset($_REQUEST['update-payment'])) {

        $method = htmlentities($_REQUEST['method']);
        $address = htmlentities($_REQUEST['address']);

        $response = Database::setPayoutMethod($address, $method);
        echo $response;

    }

    // updating password
    if (isset($_REQUEST['update-password'])) {

        $password = htmlentities($_REQUEST['password']);
        $cpassword = htmlentities($_REQUEST['cpassword']);

        $response = Database::updatePassword($password);
        echo $response;

    }

// update-user
    if (isset($_REQUEST['data'])) {

        parse_str($_REQUEST['data'],$datas);
        $response=Database::updateProfile($datas);
       print_r($response);

    }

    // recived mail
if (isset($_REQUEST['contactdata'])) {

    parse_str($_REQUEST['contactdata'], $datas);
   
    
    $response=Database::recived_mail($datas['email'],$datas['message'],$datas['subject'],$datas['name']);
    echo $response;

}


}
