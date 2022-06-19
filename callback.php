<?php
require "./app/Database.php";


if (isset($_GET['txid']) and isset($_GET['value']) and isset($_GET['status']) and isset($_GET['addr']) and isset($_GET['secrite'])) {
    // $secret = "Mabcdastthrretyuuerthhherrrreeewbb5554olkdd";
    $value = htmlentities($_GET['value']);

    $txid = htmlentities($_GET['txid']);

    $status = htmlentities($_GET['status']);
    $addr = htmlentities($_GET['addr']);
        if ( $status == 2) {
             $bitc = Database::satochToBtc($value);
             DataBase::btc_tras_update1($status, $bitc, $txid, $addr);
             Database::updateAccout($addr,$bitc);
        }else{
            $bitc = Database::satochToBtc($value);
            Database::updateInvoiceStatus($status,$addr);
            DataBase::btc_tras_update1($status, $bitc, $txid, $addr);
        }

}

