<?php
session_start();

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Database
{

    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function getBTCPrice($currency)
    {
        try {
            $content = file_get_contents("https://www.blockonomics.co/api/price?currency=" . $currency);
            $content = json_decode($content);
            $price = $content->price;
            if ($price > 0) {
                $_SESSION['btcprice'] = $price;
                return $price;
            } else if (isset($_SESSION['btcprice']) and !empty($_SESSION['btcprice'])) {
                return $_SESSION['btcprice'];
            }
            return $price;
        } catch (Exception $e) {
            print $e;
        }
    }




    public static function updateInvoiceStatus($status, $address)
    {
        $myconn = self::getConn();
        $code = self::GetCode($address);
        $sql = "UPDATE `invoices` SET `status`='$status' WHERE `code`='$code'";
        $stm = $myconn->prepare($sql);
        $stm->execute();
    }

    public static function get_contry()
    {
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $country = $geo["geoplugin_countryName"];
        $city = $geo["geoplugin_city"];
        return $country;
    }

    public static function satochToBtc($satoshi)
    {
        return ($satoshi * 0.00000001);
    }

    public static function updateAccout($address, $balance)
    {
        $bbt = "SELECT * FROM `invoices` WHERE `address`=:addr";
        $stm = self::getConn()->prepare($bbt);
        $stm->bindParam("addr", $address);
        $stm->execute();

        if ($stm->rowCount() > 0) {
            $res = $stm->fetch();
            $id = $res->uid;
            $qry = "UPDATE `account` SET `balance`=`balance`+:bal  WHERE `id`=:id";
            $stm = self::getConn()->prepare($qry);
            $stm->bindParam(":bal", $balance);
            $stm->bindParam(":id", $id);
            $stm->execute();
            //  echo $id;
            if ($stm->rowCount() > 0) {
                $qry = "DELETE FROM `invoices` WHERE `address`=:addr OR uid=:id";
                $stm = self::getConn()->prepare($qry);
                $stm->bindParam(":addr", $address);
                $stm->bindParam(":id", $id);
                $stm->execute();



                // 

                return true;
            } else {
                return false;
            }
        } else {
            echo "empty";
            //  self::send_mail()
            //  mail
        }
    }
    private static function EmailMessage($title, $btntext, $link, $body, $logourl): string
    {
$message = '<!DOCTYPE html><html>

<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <style type="text/css">
    @media screen {
      @font-face {
        font-family: \'Montserrat\';
        font-style: normal;
        font-weight: 400;
        src: local(\'Montserrat\'), local(\'Montserrat\'), url(https://fonts.google.com/share?selection.family=Montserrat:ital,wght@1,200);
      }

      @font-face {
        font-family: \'Montserrat\';
        font-style: normal;
        font-weight: 700;
        src: local(\'Montserrat Bold\'), local(\'Montserrat-Bold\'), url(https://fonts.google.com/share?selection.family=Montserrat%20Subrayada:wght@700%7CMontserrat:ital,wght@1,200);
      }

      /* CLIENT-SPECIFIC STYLES */
      body,
      table,
      td,
      a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
      }

      table,
      td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
      }

      img {
        -ms-interpolation-mode: bicubic;
      }

      /* RESET STYLES */
      img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
      }

      table {
        border-collapse: collapse !important;
      }

      body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
      }

      /* iOS BLUE LINKS */
      a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
      }

      /* MOBILE STYLES */
      @media screen and (max-width:600px) {
        h1 {
          font-size: 32px !important;
          line-height: 32px !important;
        }
      }

      /* ANDROID CENTER FIX */
      div[style*="margin: 16px 0;"] {
        margin: 0px !important;
      }
    }
  </style>
</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
  <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: \'Montserrat\'Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Go anywhere with anywheel!</div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
      <td bgcolor="#f4f4f4" align="center">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr>
            <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr>
            <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 2px 2px 0px 0px; color: #AADB1E; font-family: \'Londrina Solid\'Helvetica, Arial, sans-serif; font-size: 45px; font-weight: 700; letter-spacing: 2px; line-height: 48px;">
              <h1 style="font-size: 40px; font-weight:700; margin: w-50;"><img src="https://firebasestorage.googleapis.com/v0/b/bundle-money.appspot.com/o/mylogo.jpeg?alt=media&token=d0e5444a-18ca-4292-a9ef-052917678741" alt="logo" width="30px" height="30px"/>AlocryptoTrade</h1>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 40px 30px; color: #000000; font-family:\'Montserrat bold\' Helvetica, Arial, sans-serif; font-size: 16px; font-weight:600; line-height: 25px;">
              <p>'.$body.'</p>
            </td>
          </tr>
          <tr>
            <td bgcolor="#ffffff" align="left">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" style="border-radius: 30px;" bgcolor="#000000"><a href="'.$link.'" target="_blank" style="font-size: 20px; font-family: \'Montserrat Bold\'Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 10px 55px; border-radius: 2px; display: inline-block;">'.$btntext.'</a></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr> <!-- COPY -->
          <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #000000; font-family:\'Montserrat\'Helvetica, Arial, sans-serif; font-size: 14px; font-weight:550; line-height: 25px;">
              <p style="margin: 0;">Alternatively, you can copy this URL to your browser:</p>
            </td>
          </tr> <!-- COPY -->
          <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 20px 30px; color: #666666; font-family:\'Montserrat\'Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 550; line-height: 25px;">
              <p style="margin: 0;"><a href="'.$link.'" target="_blank" style="color: #29ABE2;">'.$link.'/</a></p>
            </td>
          </tr>
          <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 20px 30px; color: #000000; font-family:\'Montserrat\'Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
              <p style="margin: 0;">The link will be valid for the next 2 hours.</p>
            </td>
          </tr>
          <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #000000; font-family:\'Montserrat\'Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
              <p style="margin: 0;">Contact us at <a href="mailto:support@alocryptotrade.com" target="_blank" style="color: #29ABE2;">support@alocryptotrade.com</a></p>
            </td>
          </tr>
          <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #333333; font-family:\'Montserrat\'Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
            <!--  <img src="https://img.icons8.com/ios-glyphs/30/000000/facebook-new.png" /> 
                <img src="https://img.icons8.com/material-outlined/30/000000/instagram-new.png" />-->
                 </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>';
        return $message;
    }

    public static function createInvoice($amt, $address)
    {
        try {
            $myconn = self::getConn();
            $code = self::generateRandomString(25);
            $_SESSION['code'] = $code;

            // $address = self::generateAddress();
            $status = -1;
            $ip = self::getIp();
            $uid = $_SESSION["userid"];

            $sql = "INSERT INTO `invoices` (`code`, `address`, `price`, `status`, `uid`,`ip`)
    VALUES (:code, :address, :amt, :status, :uid, :ip)";
            $stm = $myconn->prepare($sql);
            $stm->bindParam('status', $status);
            $stm->bindParam('address', $address);
            $stm->bindParam('amt', $amt);
            $stm->bindParam('code', $code);
            $stm->bindParam('uid', $uid);
            $stm->bindParam('ip', $ip);

            if ($stm->execute()) {
                return $code;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            $th;
        }
    }
    public $url = "https://www.blockonomics.co/api/";

    public static function signin_user($email, $pass)
    {
        require("../conf.php");
        $pass = md5($pass);
        
        $myconn = self::getConn();
        $qury = "SELECT `id` FROM `users` WHERE `email`=:email AND `password`=:pass";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":email" => $email, ":pass" => $pass));
        if ($stm->rowCount() >= 1) {
            
            $code = self::generateRandomString(25);
            $ep = date("Y-m-d h:i:s", strtotime(date("Y-m-d h:i:s") . " +30 minutes"));
            //  $mess="just texting";
            $mess = self::EmailMessage("Login Verification","Autorize Login",BASEURL."loginverify.php?code=".$code,"we discover login attempt in you alocrytoTrade Accout. if you are the one click the following below to continue. else do password reset.","") ;
            
            $sel = "SELECT * FROM `users` WHERE `email`=:em";
            $stmm = self::getConn()->prepare($sel);
            $stmm->bindParam("em", $email);
            $stmm->execute();
          
            if ($stmm->rowCount() > 0) {
                
                $sel = "SELECT * FROM `authorization` WHERE `email`=:em";
                $stmm = self::getConn()->prepare($sel);
                $stmm->bindParam("em", $email);
                $stmm->execute();
                if ($stmm->rowCount() > 0) {
    
                    $sel1 = "UPDATE `authorization` SET `code` =:cd , `exp_data`=:dp WHERE `email`=:em";
                    $stmm = self::getConn()->prepare($sel1);
                    $stmm->bindParam("em", $email);
                    $stmm->bindParam("cd", $code);
                    $stmm->bindParam("dp", $ep);
                    $stmm->execute();
                    if ($stmm->rowCount() > 0) {
                         
                        self::send_mail($email, $mess, "Login Attempt");
                        return true;
                    }else{

                        return "something went wrong Contact Support";
                    }
                } else {
    
                    $ee = "INSERT INTO `authorization`( `code`, `email`, `exp_data`) VALUES (:co,:em,:ep)";
                    $stm = self::getConn()->prepare($ee);
                    $stm->bindParam("co", $code);
                    $stm->bindParam("em", $email);
                    $stm->bindParam("ep", $ep);
                    if ($stm->execute()) {
                        // $mess = " <center> <h3>  click the below to continue</h3>  <a href='http://localhost/alocryto/resetpassword.php?code=$code&email={$email}><button type='button' style='width:fit-content; min-width:150px; padding:10px; background-color:green;color:white; border-radius:15px;'>Verify</button></center>";
                        self::send_mail($email, $mess, "resetpassword");
                        return true;
                    }else{

                        return "something went wrong Contact Support";
                    }
                }
            }else{
                return "Unrecorgnized Email";
            }
            
        }else{

            return "Invalid Login details";
        }
    }
    public static function generateRefferCode()
    {
        $t = "" . time();
        $lent = strlen($t);
        $reffer = 'CTG_' . substr($t, ($lent / 2), $lent);

        return $reffer;
    }

    public static function getRefferCode()
    {
        $myconn = self::getConn();
        $id = $_SESSION["userid"];
        $qury = "SELECT * FROM `users` WHERE id=:id";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":id" => $id));
        if ($stm->rowCount() >= 1) {
            $res = $stm->fetch();
            return $res->referer_code;
        } else {
            return null;
        }
    }




    public static function GetQuery($query, $param = array())
    {
        $myconn = self::getConn();
        $stm = $myconn->prepare($query);
        $stm->execute($param);
        if ($stm->rowCount() >= 1) {
            $res = $stm->fetch();
            return $res;
        } else {
            return null;
        }
    }
    public static function RefBy()
    {
        $id = $_SESSION["userid"];

        $q = "SELECT * FROM `users` WHERE `id`=:id";
        $param = array(":id" => $id);
        $res = self::GetQuery($q, $param);
        return $res->ref_by;
    }

    public static function SetQuery($query, $param = array())
    {
        $myconn = self::getConn();
        $stm = $myconn->prepare($query);
        $stm->execute($param);
        if ($stm->rowCount() >= 1) {
            $res = $stm->fetch();
            return true;
        } else {
            return false;
        }
    }

    public static function getbonus()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT  `bonus` FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch();
            return $res->bonus;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public static function getConn()
    {

        // $host = "156.67.74.101";
        // $username = "u538836443_alocryptotrade";
        // $password = "Adedamolarioland2222@gmail.com";
        $host = "localhost";
        $username = "root";
        $password = "";
        // db=sql5440458

        try {
            $conn = new PDO("mysql:host=$host;dbname=u538836443_alocrypto", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $conn;
        } catch (PDOException $e) {
            // echo $e;
            echo json_encode(array("message" => $e->getMessage(), "code" => "404"));
        }
    }

    public static function getUserDetails($uid)
    {
        $myconn = self::getConn();
        $id = $uid ?? $_SESSION["userid"];
        $qury = "SELECT * FROM `users` WHERE id=:id";
        $stm = $myconn->prepare($qury);
        $stm->bindParam(":id", $id);
        $stm->execute();
        // if($stm->rowCount()>0){
        //   $row=
        return $stm->fetch();

        // }
        // return array();
    }

    public static function getEmail($uid)
    {
        $myconn = self::getConn();
        $id = $uid ?? $_SESSION["userid"];
        $qury = "SELECT * FROM `users` WHERE id=:id";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":id" => $id));
        if ($stm->rowCount() >= 1) {
            $res = $stm->fetch();
            return $res->email;
        } else {
            return "";
        }
    }
    // public static function getEmail()
    // {
    //     $myconn = self::getConn();
    //     $id = $_SESSION["userid"];
    //     $qury = "SELECT * FROM `users` WHERE id=:id";
    //     $stm = $myconn->prepare($qury);
    //     $stm->execute(array(":id" => $id));
    //     if ($stm->rowCount() >= 1) {
    //         $res = $stm->fetch();
    //         return $res->email;
    //     } else {
    //         return "";
    //     }
    // }

    public static function getPayOutAddress(): string
    {
        $myconn = self::getConn();
        $id = $_SESSION["userid"];

        $sql = "SELECT * FROM `address` WHERE `id`='$id' ";
        $result = $myconn->prepare($sql);
        $result->execute();
        if ($result->rowCount() > 0) {
            $row = $result->fetch();
            return $row->address;
        } else {
            return "no address";
        }
    }

    //    public static $id = $_SESSION["userid"];

    public static function setPayoutMethod($addr, $meth): string
    {
        $myconn = self::getConn();
        $id = $_SESSION["userid"];
        $stm = $myconn->prepare("SELECT * FROM `address` WHERE `id`=:id");
        $stm->bindParam(":id", $id);
        $stm->execute();

        if ($stm->rowCount() > 0) {

            $stm = $myconn->prepare("UPDATE `address` SET `address`=:addr,`method`=:meth WHERE `id`=:id");
            $stm->bindParam(":id", $id);
            $stm->bindParam(":addr", $addr);
            $stm->bindParam(":meth", $meth);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                return "Succeessful";
            } else {
                return "Noting to change";
            }
        } else {

            $stm = $myconn->prepare("INSERT INTO `address`(`id`, `address`, `method`)
           VALUES (:id,:addr,:meth)");
            $stm->bindParam(":id", $id);
            $stm->bindParam(":addr", $addr);
            $stm->bindParam(":meth", $meth);

            if ($stm->execute()) {
                return "Succeessful";
            } else {
                return "something went wrong: cant save for now, contact the costomer care";
            }
        }
    }

    public static function getPayOutMethod(): string
    {
        $myconn = self::getConn();
        $id = $_SESSION["userid"];

        $sql = "SELECT * FROM `address` WHERE `id`='$id' ";
        $result = $myconn->prepare($sql);
        $result->execute();
        if ($result->rowCount() > 0) {
            $row = $result->fetch();
            return $row->method;
        } else {
            return "no Method";
        }
    }

    public static function updateForgetPasswordPassword($data = array())
    {

        $p1 = "SELECT * FROM `authorization` WHERE `code`=:co ";
        $stm = self::getConn()->prepare($p1);
        $stm->bindParam("co", $data['code']);
        // $stm->bindParam("em",$data['email']);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            $usersdetaile = $stm->fetch();
            $expdate = $usersdetaile->exp_data;
            $expdate = date("Y-m-d h:i:s", strtotime($expdate));
            $nowdate = date('d-m-y h:i:s');
            if ($expdate > $nowdate) {
                $result = self::updatePassword1($data['password'], $usersdetaile->email);
                if ($result == true) {
                    return true;
                } else {
                    return "Something went wrong contact support";
                }
            } else {
                return "token time as expaired try again";
            }
           
        } else {
            return "invalid link refrence try again";
        }
    }

    public static function updatePassword($pass): string
    {
        $myconn = self::getConn();
        $id = $_SESSION["userid"];
        $stm = $myconn->prepare("UPDATE `users` SET `password`=:pass WHERE `id`=:id");
        $stm->bindParam(":pass", md5($pass));
        $stm->bindParam(":id", $id);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return "succussful";
        } else {
            return "noting to chage";
        }
    }

    public static function updatePassword1($pass, $email): bool
    {
        $myconn = self::getConn();

        $stm = $myconn->prepare("UPDATE `users` SET `password`=:pass WHERE `email`=:em");
        $stm->bindParam("pass", md5($pass));
        $stm->bindParam("em", $email);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateProfile($data): string
    {
        $myconn = self::getConn();
        $id = $_SESSION["userid"];
        $qry = "UPDATE `users` SET `email`=:em,`country`=:ctry,
        `name`=:fn,`phone`=:ph,`gender`=:gen,`last_name`=:ln,`address1`=:add1,
        `address2`=:add2,`poster_code`=:pcode,`state`=:st,`city`=:cty WHERE `id`=:id";
        $stm = $myconn->prepare($qry);
        $stm->bindParam(":em", $data['email']);
        $stm->bindParam(":ctry", $data['ctry']);
        $stm->bindParam(":fn", $data['fname']);
        $stm->bindParam(":ln", $data['lname']);
        $stm->bindParam(":ph", $data['phone']);
        $stm->bindParam(":gen", $data['gender']);
        $stm->bindParam(":add1", $data['address1']);

        $stm->bindParam(":add2", $data['address2']);
        $stm->bindParam(":pcode", $data['pcode']);
        $stm->bindParam(":st", $data['state']);
        $stm->bindParam(":cty", $data['city']);

        $stm->bindParam(":id", $id);

        $stm->execute();
        if ($stm->rowCount() > 0) {
            return "succussful";
        } else {
            return "noting to chage";
        }
    }

    public static function GetCode($address)
    {
        $myconn = self::getConn();
        $sql = "SELECT * FROM `invoices` WHERE `address`='$address'";
        $result = $myconn->prepare($sql);
        $result->execute();
        $code = "Error, try again";
        while ($feedback = $result->fetch()) {
            $code = $feedback->code;
            $_SESSION['code'] = $code;
        }
        return $code;
    }

    public static function getStatus()
    {
        $myconn = self::getConn();
        $code = $_SESSION['code'];
        $sql = "SELECT * FROM `invoices` WHERE `code`=:code";
        $stm = $myconn->prepare($sql);
        $stm->execute(array(":code" => $code));

        $status = "Error, try again";
        while ($feedback = $stm->fetch()) {
            $status = $feedback->status;
        }
        return $status;
    }

    public static function is_login(): bool
    {

        if (isset($_SESSION["user"]) and !empty($_SESSION["user"]) and isset($_SESSION['userid']) and !empty($_SESSION['userid'])) {
            return true;
        }
        return false;
    }

    public static function getApiPrivate($name)
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $qury = "SELECT * FROM `apis` WHERE `name`=:name";
            $stm = $myconn->prepare($qury);
            $stm->execute(array(":name" => $name));
            $feedback = $stm->fetch();
            return $feedback->private;
        } catch (\Throwable $th) {
        }
        return "";
    }

    public static function getApiPublic($name)
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $qury = "SELECT * FROM `apis` WHERE `name`=:name";
            $stm = $myconn->prepare($qury);
            $stm->execute(array(":name" => $name));
            $feedback = $stm->fetch();
            return $feedback->public;
        } catch (\Throwable $th) {
        }
        return "";
    }
    public static function getBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch();
            return $res->balance;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getApiredirect($name)
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $qury = "SELECT * FROM `apis` WHERE `name`=:name";
            $stm = $myconn->prepare($qury);
            $stm->execute(array(":name" => $name));
            $feedback = $stm->fetch();
            return $feedback->redirect;
        } catch (\Throwable $th) {
        }
        return "";
    }

    public static function getEarnsBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->earns;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getWithdrawBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->withdraw;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getInvestmentBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->investment;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function getRefererBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->referer;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function getPicture()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `users` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->picture;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function get_token($table, $auth_token)
    {

        $myconn = self::getConn();
        $qury = "SELECT * FROM `users` WHERE $table=:token";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":token" => $auth_token));
        if ($stm->rowCount() >= 1) {
            return true;
        } else {
            return "invalid login details";
        }
    }

    public static function get_time($auth_token)
    {

        $myconn = self::getConn();
        $qury = "SELECT * FROM `users` WHERE `reset_pass_token` =:token";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":token" => $auth_token));
        if ($stm->rowCount() >= 1) {
            $res = $stm->fetch();
            return $res->token_date;
        }
        return "";
    }

    public static function ip_visitor_country()
    {

        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];
        $country = "Unknown";

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);

        $ip_data = json_decode($ip_data_in, true);
        $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

        if ($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }

        // return $ip;
        return $country;
    }

    public static function generate_token()
    {
        return str_shuffle("1234567890");
    }
    public static function generate_token_code($length)
    {
        $output = "1234567890";
        for ($i = 0; $i < $length; $i++) {
            $output = str_shuffle($output);
        }
        return substr($output, 0, $length);
    }

    public static function google_register($name, $email, $pass, $country, $pic, $gender, $id): bool
    {
        $pass = md5($pass);
        $country = self::ip_visitor_country();
        $token = self::generate_token();
        $myconn = self::getConn();
        $qury = "INSERT INTO `users`(`email`, `password`, `country`,`auth_token`,`id`,`name`,`gender`,`picture`) VALUES (:email,:password,:country,:token,:id,:name,:gend,:pic)";
        $stm = $myconn->prepare($qury);
        $feildback = $stm->execute(array(":email" => $email, ":password" => $pass, ":country" => $country, ":token" => $token, ":id" => $id, ":name" => $name, ":gend" => $gender, ":pic" => $pic));
        $qury1 = "INSERT INTO `account`(`id`, `balance`, `investment`, `earns`, `withdraw`,`referer`)
         VALUES (:uid,:bal,:investment,:earns,:withdraw,:referer)";

        $stm1 = $myconn->prepare($qury1);
        $balance = "0";
        $investment = "0";
        $earns = "0";
        $withdraw = "0";
        $referer = "0";
        $feildback1 =
            $stm1->execute(array(
                ":uid" => $id,
                ":bal" => $balance,
                ":investment" => $investment,
                ":earns" => $earns,
                ":referer" => $referer,
                ":withdraw" => $withdraw
            ));

        if ($feildback and $feildback1) {
            $sub = "Welcome to CryptoTradeGain";
            $mess = "
              <img src='https://cryptogaintrade.com/assets/img/brand/blue.png' width='100px' height='50px' />

              <br>
            <h2>
             Welcome " . $name . "
            </h2>
            <p>To Start Earning, you need to make a deposit, Choose an investment plan, Invest and Earn. </p>
            <br>
            <br>
            <br>
            <p><a href='mailto:riotech2222@gmail.com'>riotech2222@gmail.com</a></p>

             ";
            // $mess = "please click on the following link to verify your account http://" . $_SERVER['SERVER_NAME'] . '/verify.php?token=' . $token;
            self::send_mail($email, $mess, $sub);

            return true;
        } else {
            return false;
        }
    }

    public static function register($email, $pass, $name, $ph, $pic): string
    {

        $country = self::ip_visitor_country();
        $myconn = self::getConn();
        $qury = "SELECT `id` FROM `users` WHERE `email`=:email ";
        $stm = $myconn->prepare($qury);

        $stm->execute(array(":email" => $email));
        if ($stm->rowCount() >= 1) {

            return "User already exist please login";
        } else {

            $id = str_shuffle(time());
            $token = self::generate_token();
            $qury = "INSERT INTO `users`(`email`, `password`, `country`,`auth_token`,`id`,`name`,`picture`,`phone`) VALUES (:email,:password,:country,:token,:id,:name,:pic,:ph)";
            $stm = $myconn->prepare($qury);
            $stm->bindParam(":email", $email);
            $stm->bindParam(":password", md5($pass));
            $stm->bindParam(":country", $country);
            $stm->bindParam(":token", $token);
            $stm->bindParam(":id", $id);
            $stm->bindParam(":name", $name);
            $stm->bindParam(":pic", $pic);
            $stm->bindParam(":ph", $ph);

            // $feildback
            //  $stm->execute(array(":email" => $email, ":password" => md5($pass), ":country" => $country, ":token" => $token, ":id" => $id, ":name" => $name,":pic"=>$pic,":ph"=>$ph));

            $qury1 = "INSERT INTO `account`(`id`, `balance`, `investment`, `earns`, `withdraw`,`referer`)
            VALUES (:id,:bal,:investment,:earns,:withdraw,:referer)";

            $stm1 = $myconn->prepare($qury1);
            $balance = "0";
            $investment = "0";
            $earns = "0";
            $referer = "0";
            $withdraw = "0";
            $stm1->bindParam(":id", $id);
            $stm1->bindParam(":bal", $balance);
            $stm1->bindParam(":investment", $investment);
            $stm1->bindParam(":earns", $earns);
            $stm1->bindParam(":withdraw", $withdraw);
            $stm1->bindParam(":referer", $referer);

            // $feildback1 =
            // $stm1->execute(array(":uid" => $id, ":bal" => $balance, ":investment" => $investment,
            //  ":earns" => $earns, ":withdraw" => $withdraw, ":referer" => $referer));

            if ($stm->execute() and $stm1->execute()) {
                $sub = "Welcome to CryptoTradeGain";
                $mess = "
              <img src='https://cryptogaintrade.com/assets/img/brand/blue.png' width='100px' height='50px' />
            <br>
            <h2>
             Welcome " . $name . "
            </h2>
            <p>To Start Earning, you need to make a deposit, Choose an investment plan, Invest and Earn. </p>
            <br>
            <br>
            <br>
            <p><a href='mailto:riotech2222@gmail.com'>riotech2222@gmail.com</a></p>

             ";
                // $mess = "please click on the following link to verify your account http://" . $_SERVER['SERVER_NAME'] . '/verify.php?token=' . $token;
                self::send_mail($email, $mess, $sub);

                return "true";
            } else {
                return "Error in registeration contact the admin";
            }
        }
    }

    public static function recived_mail($email, $mess, $sub, $name)
    {

        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.hostinger.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'customercare@jameswilliamsinvestigations.com'; //SMTP username
            $mail->Password = 'Adedamolarioland2222@gmail.com'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom("customercare@jameswilliamsinvestigations.com", "Crytotradegain");
            $mail->addAddress("customercare@jameswilliamsinvestigations.com", "$name"); //Add a recipient
            // $mail->addAddress('customercare@erect1.org'); //Name is optional
            $mail->addReplyTo($email, $name);
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $sub;
            $mail->Body = $mess;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return "message Sent";
        } catch (Exception $e) {
            // exit();
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // return false;
        }
    }

    public static function send_mail($email, $mess, $sub)
    {

        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.hostinger.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'support@alocryptotrade.com'; //SMTP username
            $mail->Password = 'Adedamolarioland2222@gmail.com'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('support@alocryptotrade.com', 'AlocryptoTrade');
            $mail->addAddress($email, $email); //Add a recipient
            // $mail->addAddress('customercare@erect1.org'); //Name is optional
            $mail->addReplyTo('support@alocryptotrade.com', 'AlocryptoTrade');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $sub;
            $mail->Body = $mess;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            // die($e);
             echo "Message could not be sent. Mailer Error: {$e}";
            return false;
        }
    }

    public static function btc_tras_update1($status, $value, $txid, $addr)
    {
        try {

            $bbt = "SELECT * FROM `invoices` WHERE `address`=:addr";
            $stm = self::getConn()->prepare($bbt);
            $stm->bindParam("addr", $addr);
            $stm->execute();

            if ($stm->rowCount() > 0) {
                $res = $stm->fetch();
                $id = $res->uid;
                //   echo $value;
                $myconn = self::getConn();
                $qury = "INSERT INTO `payments_trasact`(`txid`, `addr`, `value`, `status`, `uid`)
               VALUES (:txid,:addr,:va,:stat,:id)";
                $stm = $myconn->prepare($qury);
                $stm->bindParam('stat', $status);
                $stm->bindParam('va', $value);
                $stm->bindParam('txid', $txid);
                $stm->bindParam('addr', $addr);
                $stm->bindParam('id', $id);

                $stm->execute();

                echo "Transaction in processing";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public static function btc_tras_update($res)
    {
        try {

            $myconn = self::getConn();
            $qury = "INSERT INTO `btc_transaction`(`status`, `emailid`, `satoshi`, `description`, `xpub`, `timestamp`, `uuid`, `value`, `txid`,
    `currency`, `code`, `address`, `paid_satoshi`,`myid`)
    VALUES (:status,:emailid,:satoshi,:description,:xpub,:timestamp,:uuid,:value,:txid,:currency,:code,:address,:paid_satoshi,:myid)";
            $id = $_SESSION["userid"];
            $stm = $myconn->prepare($qury);
            $stm->bindParam('status', $res['status']);
            $stm->bindParam('emailid', $res['emailid']);
            $stm->bindParam('satoshi', $res['satoshi']);
            $stm->bindParam('description', $res['description']);
            $stm->bindParam('xpub', $res['xpub']);
            $stm->bindParam('timestamp', $res['timestamp']);
            $stm->bindParam('uuid', $res['uuid']);
            $stm->bindParam('value', $res['value']);
            $stm->bindParam('txid', $res['txid']);
            $stm->bindParam('currency', $res['currency']);
            $stm->bindParam('code', $res['code']);
            $stm->bindParam('paid_satoshi', $res['paid_satoshi']);
            $stm->bindParam('address', $res['address']);
            $stm->bindParam('myid', $id);

            $stm->execute();
            if ($res['status'] == '2' or $res['status'] == 2) {
                $amount = self::USDtoBTC($res['value']);
                $qury = "UPDATE account SET `bit`=`bit`+$amount WHERE `id`=$id";
                $stm = $myconn->prepare($qury);
                $stm->execute();
                return "success";
            }
            return "Transaction in processing";
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function sendAuthRestPasswordEmail($email)
    {
        require("../conf.php");
        $code = self::generateRandomString(25);
        $ep = date("Y-m-d h:i:s", strtotime(date("Y-m-d h:i:s") . " +30 minutes"));

        $mess = self::EmailMessage("Password Reset Mail", "Reset Password", BASEURL . "resetpassword.php?code={$code}", "<center>You requested for your Alocryptotrade account password reset, if you did not request the change just ignore.Just press the button below to reset your password</center>", BASEURL . "images/mylogo.jpeg");
        // $mess = " <center> <h3>  click the below to continue</h3><a href=http://localhost/alocryto/resetpassword.php?code={$code}&email={$email}><button type='button' style='width:fit-content; min-width:150px; padding:10px; background-color:green;color:white; border-radius:15px;'>Verify</button></a></center>";
        $sel = "SELECT * FROM `users` WHERE `email`=:em";
        $stmm = self::getConn()->prepare($sel);
        $stmm->bindParam("em", $email);
        $stmm->execute();
        if ($stmm->rowCount() > 0) {

            $sel = "SELECT * FROM `authorization` WHERE `email`=:em";
            $stmm = self::getConn()->prepare($sel);
            $stmm->bindParam("em", $email);
            $stmm->execute();
            if ($stmm->rowCount() > 0) {

                $sel1 = "UPDATE `authorization` SET `code` =:cd , `exp_data`=:dp WHERE `email`=:em";
                $stmm = self::getConn()->prepare($sel1);
                $stmm->bindParam("em", $email);
                $stmm->bindParam("cd", $code);
                $stmm->bindParam("dp", $ep);
                $stmm->execute();
                if ($stmm->rowCount() > 0) {

                    self::send_mail($email, $mess, "resetpassword");
                    return "Verification Email as be sent to you check your inbox";
                }
                return "something went wrong Contact Support";
            } else {

                $ee = "INSERT INTO `authorization`( `code`, `email`, `exp_data`) VALUES (:co,:em,:ep)";
                $stm = self::getConn()->prepare($ee);
                $stm->bindParam("co", $code);
                $stm->bindParam("em", $email);
                $stm->bindParam("ep", $ep);
                if ($stm->execute()) {
                    // $mess = " <center> <h3>  click the below to continue</h3>  <a href='http://localhost/alocryto/resetpassword.php?code=$code&email={$email}><button type='button' style='width:fit-content; min-width:150px; padding:10px; background-color:green;color:white; border-radius:15px;'>Verify</button></center>";
                    self::send_mail($email, $mess, "resetpassword");
                    return "Verification Email as be sent to your you check your inbox";
                }
                return "something went wrong Contact Support";
            }
        }
        return "Unrecorgnized Email";
    }
    public static function  makePayment($amount = 0)
    {
        // try {
        //code...
        $seleaddress = "SELECT * FROM `invoices` WHERE `uid`=:id";
        $uid = $_SESSION["userid"];
        $conn = self::getConn();
        $stm = $conn->prepare($seleaddress);
        $stm->bindParam("id", $uid);
        $stm->execute();
        $result = $stm->fetch();
        if (empty($result)) {
            $address = self::generateAddress();
            $inBtc = self::USDtoBTC($amount);
            $hash = self::generateQR($address);

            self::createInvoice($amount, $address);
            $status = self::getStatus();
            $output = array("status" => $status, "hash" => $hash, "inBtc" => $inBtc, "address" => $address);
            return $output;
        } else {
            $inBtc = self::USDtoBTC($amount);
            $hash = self::generateQR($result->address);
            $output = array("status" => $result->status, "hash" => $hash, "inBtc" => $inBtc, "address" => $result->address);
            return $output;
        }
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
        // return array();
    }

    public static function generateAddress()
    {
        $address = "";
        $api_key = self::getApiPrivate('block') ?? "2KgicsP3iWhaWBNjtgSmNRK7zMWYT4yeHvDQUKfINqU";
        $url = 'https://www.blockonomics.co/api/new_address';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        $header = "Authorization: Bearer " . $api_key;
        $headers = array();
        $headers[] = $header;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $contents = curl_exec($ch);
        if (curl_errno($ch)) {
            echo "Error:" . curl_error($ch);
        }

        $responseObj = json_decode($contents);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status == 200) {
            $address = $responseObj->address;
            return $address;
        } else {
            echo $responseObj->message;
            return null;
        }
    }

    public static function BTCtoUSD($amount)
    {
        $price = self::getBTCPrice("USD");
        return intval($amount) * $price;
    }

    public static function USDtoBTC($amount)
    {
        $price = self::getBTCPrice("USD");
        return ((int) $amount / $price);
    }

    public static function getIp()
    {
        // if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //     //ip from share internet
        //     $ip = $_SERVER['HTTP_CLIENT_IP'];
        // } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //     //ip pass from proxy
        //     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        // } else {
        //     $ip = $_SERVER['REMOTE_ADDR'];
        // }
        // return $ip;

        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];
        $country = "Unknown";

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);

        $ip_data = json_decode($ip_data_in, true);
        $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

        if ($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }

        return $ip;
    }

    public static function getBTCTransaction($tid)
    {

        $url = "https://www.blockonomics.co/api/tx_detail?txid=" . $tid;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "X-Custom-Header: value",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public static function getBitcoinResponsDetail($apikey, $address)
    {
        $url = "https://www.blockonomics.co/api/merchant_order/$address";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "X-Custom-Header: value",
            "Authorization: Bearer $apikey",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        return $resp;
        curl_close($curl);
    }

    public static function generateQR($address)
    {
        $cht = "qr";
        $chs = "300x300";
        $chl = $address;
        $choe = "UTF-8";

        $qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;
        return $qrcode;
    }
    public static function subscribe($pid)
    {
        $stm = Database::getConn()->prepare("SELECT * FROM `plans` WHERE `sn`=:pid");
        $stm->bindParam(":pid", $pid);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            $_SESSION['newplans'] = $stm->fetch();
        }
        echo $_SESSION['newplans'];
    }
}
