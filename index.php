<?php
$id = $_SESSION["userid"];
if (!empty($id)) {
    header("location:dashboard");
}
require("conf.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="external.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>Alocryptotrade</title>
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
        <div style="height:62px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:62px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;">
            <div style="height:40px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1508&invert_hover=no" width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div>
            <div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Riotech</div>
        </div>
        <!-- ========================================     SECTION 1   ======================================================= -->
        <header>

            <h2 class="wordings">Maximium Profits From Crypto Trade</h2>
            <div class="buttss">
                <a href="signup"> <button class="butt1">Register</button></a>
                <a href="signin"> <button class="butt2">Login</button></a>
            </div>

        </header>

        <!--============================================  SECTION 2   =========================================================-->
        <section class="sec2">
            <div class="youtbtab">
                <div class="side1">
                    <h1>We maintain the trade pattern</h1>
                    <iframe width="500" height="345" src="https://www.youtube.com/embed/YYcwS98_L8s?autoplay=0&mute=1&loop=1"> </iframe>
                </div>
                <div class="side2" style="height: 400px;overflow-x: scroll; width: 400px;">
                    <h1>Listing the actual prices.</h1>
                    <?php
                    require("./vendor/autoload.php");

                    use Codenixsv\CoinGeckoApi\CoinGeckoClient;

                    $client = new CoinGeckoClient();
                    $data = $client->ping();
                    $data = $result = $client->coins()->getMarkets('usd');

                    ?>
                    <table class="tabularr">
                        <tr class="tr1sec2">
                            <!--<th>Logo</th>-->
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>24H (%)</th>
                            <!--<th></th>-->
                        </tr>
                        ======COLUMN FOR BITCOIN=======
                        <?php
                        foreach ($data as $key => $va) {
                            //   print($data[$key]["id"]);


                        ?>
                            <tr class="tr2sec2">
                                <td class="tr2tdsec2"> <img src="<?php echo $data[$key]["image"]  ?>" width="50px" height="50px">
                                    <p><?php echo $data[$key]["name"]  ?></p>
                                </td>
                                <td class="colordsec2">$<?php echo $data[$key]["current_price"]  ?></td>
                                <td class="colordsec2"><i class="fas fa-arrow-up">
                                        <p> <?php

                                            $cc = round($data[$key]["price_change_percentage_24h"], 2);
                                            if ($cc > 0) {

                                            ?>
                                                <span style="color:green;">
                                                    <?php echo $cc ?>
                                                </span>
                                            <?php
                                            } else {
                                            ?>
                                                <span style="color:red;">
                                                    <?php echo $cc ?>
                                                    <?php
                                                }


                                                    ?>%
                                        </p>
                                    </i> </td>
                            </tr>

                        <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
        </section>

        <!--============================================  SECTION 3   =========================================================-->
        <section class="sec3">
            <h1>Basic Features and services.</h1>

            <div class="overallflex">

                <div class="flexbasis">
                    <div class="flex1">
                        <img src="./images/sec3 img.png" alt="">
                    </div>
                </div>

                <div class="flexbasis">
                    <div class="flex2">
                        <i class="fas fa-database"></i>
                        <h3>Data Protection</h3>
                        <p> All investment data on our systems including user personal data are highly encrypted using top level codes and
                            metrics.. </p>
                    </div>
                </div>

                <div class="flexbasis">
                    <div class="flex2">
                        <i class="fas fa-headset"></i>
                        <h3>Excellent Service Delivery</h3>
                        <p> We have consistently delivered over 2000 contract farming projects to our registered members and are all
                            appreciated. </p>
                    </div>
                </div>

            </div><br><br>
            <!-- =============== LINE 2 for Sec2============== -->
            <div class="overallflex2">

                <div class="flexbasis2">
                    <div class="flex22">
                        <i class="fas fa-laptop-house"></i>
                        <h3>Registered Company</h3>
                        <p>Always work with a registered company. We are 100% registered under the uk companies house. </p>
                    </div>
                </div>

                <div class="flexbasis2">
                    <div class="flex22">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Security Protected</h3>
                        <p> Proper measures have been taken to ensure maximum security of our servers, users dashboard and login details. </p>
                    </div>
                </div>

                <div class="flexbasis2">
                    <div class="flex22c">
                        <i class="fab fa-bitcoin"></i>
                        <h3>Payment Methods</h3>
                        <p>We have a very unique payment method for sending and receiving payments automatically. </p>
                    </div>
                </div>

            </div><br><br><br>

            <!-- =============== LINE 3 for Sec2============== -->

            <div class="overallflex">

                <div class="flexbasis">
                    <div class="flex2">
                        <i class="fas fa-fingerprint"></i>
                        <h3>Secured Company</h3>
                        <p> All our activities are checkmated, licensed and
                            regulated by matured group of individuals. </p>
                    </div>
                </div>

                <div class="flexbasis">
                    <div class="flex2">
                        <i class="fas fa-chart-bar"></i>
                        <h3>Mt4/Mt5 Tool</h3>
                        <p> We also enable bots that help us place good forex trades,
                            to ensure maximum profits for all investors trading with us. </p>
                    </div>
                </div>

                <div class="flexbasis">
                    <div class="flex1">
                        <img src="<?php echo BASEURL ?>images/sec3 img.png" alt="">
                    </div>
                </div>

            </div><br><br><br>
        </section><br><br>
        <?php
        //  $root=$_SERVER["SERVER_NAME"];
        require "./coinshow.php";
        ?>
        <!--============================================  SECTION 4   =========================================================-->
        <h1 class="sec4h1">INVESTMENT PLANS</h1>

        <section class="sec4"><br>
            <p>Say goodbye to low-interest savings accounts. Grow your wealth with profitable bitcoin investment.</p>
            <div class="overallflexsec4">
                <div class="boxxiplan2">
                    <div class="flexbasisboxxi">
                        <img src="<?php echo BASEURL ?> /images/borderadd.jpg">
                        <div class="textti">
                            <h3>STARTER PLAN</h3>
                        </div>
                        <div class="boxxi2">
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Minimum: $50</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Maximum: $500</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Referral: 5%</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Duration: 9hrs</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Profit: 10% + Investment</p>
                            </div>
                        </div>
                        <button id="sta" class="buttsec4">Get Started</button>
                    </div>
                </div>

                <!--========================== plan 2 ============================== -->

                <div class="boxxiplan2">
                    <div class="flexbasisboxxi">
                        <img src="<?php echo BASEURL ?>images/borderadd.jpg">
                        <div class="texttioinge">
                            <h3>PREMIUM PLAN</h3>
                        </div>
                        <div class="boxxi2oinge">
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Minimum: $100</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Maximum: $1000</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Referral: 10%</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Duration: 8hrs</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Profit: 15% + Investment</p>
                            </div>
                        </div>
                        <button id="pre" class="buttsec4oinge">Get Started</button>
                    </div>
                </div>


                <!--========================== plan 3 ============================== -->
                <div class="boxxiplan2">
                    <div class="flexbasisboxxi">
                        <img src="<?php echo BASEURL ?>images/borderadd.jpg">
                        <div class="texttioinge">
                            <h3>SILVER PLAN</h3>
                        </div>
                        <div class="boxxi2oinge">
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Minimum: $200</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Maximum: $2000</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Referral: 15%</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Duration: 6hrs</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Profit: 20% + Investment</p>
                            </div>
                        </div>
                        <button id="sil" class="buttsec4oinge">Get Started</button>
                    </div>
                </div>



                <!--========================== plan 4 ============================== -->
                <div class="boxxiplan2">
                    <div class="flexbasisboxxi">
                        <img src="<?php echo BASEURL ?>images/borderadd.jpg">
                        <div class="textti">
                            <h3>GOLD PLAN</h3>
                        </div>
                        <div class="boxxi2">
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Minimum: $500</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Maximum: $10000</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Referral: 20%</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Duration: 4hrs</p>
                            </div>
                            <div class="flexboxxi2">
                                <i class="fas fa-arrow-right"></i>
                                <p>Profit: 30% + Investment</p>
                            </div>
                        </div>
                        <button id="gol" class="buttsec4">Get Started</button>
                    </div>
                </div>
            </div><br>

            <!-- ========================================== MAXWIDTH ======================================================= -->
            <div class="maxxiwidth">
                <div class="plans2a">
                    <div class="boxxi">
                        <div class="flexbasisboxxi">
                            <img src="<?php echo BASEURL ?>images/borderadd.jpg">
                            <div class="textti">
                                <h3>STARTER PLAN</h3>
                            </div>
                            <div class="boxxi2">
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Minimum: $50</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Maximum: $500</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Referral: 5%</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Duration: 9hrs</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Profit: 10% + Investment</p>
                                </div>
                            </div>
                            <button id="sta" class="buttsec4">Get Started</button>
                        </div>
                    </div>

                    <!--========================== plan 2 ============================== -->

                    <div class="boxxiplan22">
                        <div class="flexbasisboxxi">
                            <img src="<?php echo BASEURL ?>images/borderadd.jpg">
                            <div class="texttioinge">
                                <h3>PREMIUM PLAN</h3>
                            </div>
                            <div class="boxxi2oinge">
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Minimum: $100</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Maximum: $1000</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Referral: 10%</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Duration: 8hrs</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Profit: 15% + Investment</p>
                                </div>
                            </div>
                            <button id="pre" class="buttsec4oinge">Get Started</button>
                        </div>
                    </div>
                </div><br><br>


                <!--========================== plan 3 ============================== -->
                <div class="plans2b">
                    <div class="boxxiplan2">
                        <div class="flexbasisboxxi">
                            <img src="<?php echo BASEURL ?>images/borderadd.jpg">
                            <div class="texttioinge">
                                <h3>SILVER PLAN</h3>
                            </div>
                            <div class="boxxi2oinge">
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Minimum: $200</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Maximum: $2000</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Referral: 15%</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Duration: 6hrs</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Profit: 20% + Investment</p>
                                </div>
                            </div>
                            <button id="sil" class="buttsec4oinge">Get Started</button>
                        </div>
                    </div>



                    <!--========================== plan 4 ============================== -->
                    <div class="boxxiplan24">
                        <div class="flexbasisboxxi">
                            <img src="<?php echo BASEURL ?>images/borderadd.jpg">
                            <div class="textti">
                                <h3>GOLD PLAN</h3>
                            </div>
                            <div class="boxxi2">
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Minimum: $500</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Maximum: $10000</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Referral: 20%</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Duration: 4hrs</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Profit: 30% + Investment</p>
                                </div>
                            </div>
                            <button id="gol" class="buttsec4">Get Started</button>
                        </div>
                    </div>
                </div>
            </div><br><br><br>
        </section>

        <!--==============================================  SECTION 5   ================================================================-->
        <section class="sec5">
            <h1>Concise Explainer</h1>
            <div class="flexsec5">
                <div class="col">
                    <img src="<?php echo BASEURL ?>images/abstract-blockchain-2t-scaled-600x350.jpg">
                </div>
                <div class="col">
                    <p>Alocryptotrade is a leading provider of online bitcoin foreign exchange (FX) trading located in west London,
                        England.
                        We focus more on CFD trading, spread betting and related services. The company’s mission is to provide global
                        traders
                        with access to the world’s largest and most liquid market by offering innovative trading tools, hiring excellent
                        trading
                        educators, investing, meeting strict financial standards and striving for the best online trading experience in the
                        market. Clients have the advantage of mobile trading, one-click order execution and trading from real-time charts
                        also
                        from your dashboard it was designed to cash out to your wallet automatically at a fixed basis which depends on your
                        investment package you registered on. In addition, Cryptotradegain offers educational courses on Crypto FX trading
                        and
                        provides trading tools, proprietary data and premium resources.</p>
                </div>
            </div>
            <p class="p1">We also provides retail brokers, small hedge funds and emerging market banks access to wholesale execution and
                liquidity, while providing high and medium frequency funds access to prime brokerage services</p><br>

            <div class="h1p">
                <h3>NO CRYPTO WALLET OR COLD STORAGE</h3>
                <p>Trading Alocryptotrade means that no physical delivery of the coin is required and profits are credited to your account instantly</p>
            </div><br>

            <div class="h2p">
                <h3>POWERFUL TRADING DASHBOARD</h3>
                <p>Micronized CFD located at your dashboard helps trades to be placed in fractions and each with profits are sent to your account instantly.</p>
            </div><br>

            <div class="h3p">
                <h3>WE HAVE EXPERTS TO ASSIST YOU</h3>
                <p>Whether the price of the cryptocurrency goes up or down, you can take part of the action by investing with us and have us monitor the market for you.</p>
            </div> <br><br>

            <div class="pp">
                <p>Alocryptotrade is committed to continuously obtaining the best possible outcome for client orders. It is essential for
                    us to enable our clients and the public to evaluate the quality of execution practices and to identify the top five
                    execution venues where client orders are executed in terms of trading volumes</p>
            </div><br><br>

        </section>

        <!-- ================================================== SECTION 6 ================================================================ -->
        <section class="sec6">
            <div class="sec6msg">
                <h1>Join Over 20,000 Registered Members Making Profits On Alocryptotrade</h1><br>
                <a href="contact"><button type="button" class="sec6msgbutt">CONTACT US</button></a>
            </div>
        </section>

        <!-- ================================================== SECTION 7 ================================================================ -->
        <section class="sec7">
            <h1>Our members Testimonials</h1><br><br>
            <div class="leftalign">
                <div class="backgdlf">
                    <div class="imgtxtflexxi">
                        <div class="imgjustfy">
                            <img src="./images/pexeluser2.jpg" alt="member picture">
                        </div>
                        <div class="backgtexxti">
                            <div class="icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="wordsup">
                                <p>The ground breaking functionality of this site coupled with the designs motivated me to invest, and now my smiles
                                    looks like my bitcoin wallet balance. </p>
                            </div>

                            <hr>

                            <div class="nameie">
                                <h3>Jack Warren</h3>
                                <p>Member</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rightalign">
                <div class="backgdrght">
                    <div class="imgtxtflexxi">
                        <div class="backgtexxtirght">
                            <div class="icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="wordsup22">
                                <p>The moment i began investing with Alocryptotrade.com, ii is believable that my account balance has increased rapidly </p>
                            </div>

                            <hr>

                            <div class="nameie22">
                                <h3>Jesse Boshart</h3>
                                <p>Member</p>
                            </div>
                        </div>
                        <div class="imgjustfyright">
                            <img src="<?php echo BASEURL ?>images/pexels-matheus-mmk-9331292.jpg" alt="member picture">
                        </div>
                    </div>
                </div>
            </div>

            <div class="leftalign3">
                <div class="backgdlf">
                    <div class="imgtxtflexxi">
                        <div class="imgjustfy">
                            <img src="<?php echo BASEURL ?>images/pexels-andrea-piacquadio-3782164.jpg" alt="member picture">
                        </div>
                        <div class="backgtexxti">
                            <div class="icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="wordsup">
                                <p>I feel like singing a song about Alocryptotrade.com. I want to draw a painting of my bitcoin balance, cause my balance looks very good </p>
                            </div>

                            <hr>

                            <div class="nameie">
                                <h3>Ray Babin</h3>
                                <p>Member</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rightquowords">
                <div class="rightquotes">
                    <i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i>
                </div>

                <div class="ahref">
                    <a href="testimony" class="lihover">check out more Testimonials</a>
                </div>

            </div>
        </section>

        <!-- ================================================== SECTION 8 ================================================================ -->
        <section class="sec8">
            <h1>Instant Payout History</h1>
            <div class="overallmaxwidthyy">
                <div class="visacolmn">
                    <table>
                        <tr class="tr1">
                            <th>USERNAME</th>
                            <th>INVESTMENT PLAN</th>
                            <th>AMOUNT INVESTED</th>
                            <th>TOTAL PROFITS</th>
                            <th>DATE</th>
                            <th>PAYOUT STATUS</th>
                        </tr>

                        <tr class="tr2">
                            <td class="colord">David</td>
                            <td class="colord">Starter Plan</td>
                            <td class="colord">$400</td>
                            <td class="colord">$3000</td>
                            <td class="colord">3 June 2022</td>
                            <td>
                                <span class="ppppt2">Paid</span> <br>
                                <div class="tdbackgd">
                                    <p>Successful</p>
                                    <p>100%</p>
                                </div>
                            </td>
                        </tr>

                        <!-- ======COLUMN FOR MASTERCARD======= -->
                        <tr class="tr4">
                            <td class="colord">Jason</td>
                            <td class="colord">Premium Plan</td>
                            <td class="colord">$900</td>
                            <td class="colord">$6400</td>
                            <td class="colord">3 June 2022</td>
                            <td>
                                <span class="ppppt4">Paid</span> <br>
                                <div class="tdbackgd">
                                    <p>Successful</p>
                                    <p>100%</p>
                                </div>
                            </td>
                        </tr>

                        <!-- ======COLUMN FOR SWIFT======= -->
                        <tr class="tr2">
                            <td class="colord">Charlotte</td>
                            <td class="colord">Premium Plan</td>
                            <td class="colord">$700</td>
                            <td class="colord">$4000</td>
                            <td class="colord">3 June 2022</td>
                            <td>
                                <span class="ppppt2">Paid</span> <br>
                                <div class="tdbackgd">
                                    <p>Successful</p>
                                    <p>100%</p>
                                </div>
                            </td>
                        </tr>

                        <!-- ======COLUMN FOR ACH======= -->
                        <tr class="tr4">
                            <td class="colord">Gary</td>
                            <td class="colord">Gold Plan</td>
                            <td class="colord">$2500</td>
                            <td class="colord">$10300</td>
                            <td class="colord">3 June 2022</td>
                            <td>
                                <span class="ppppt4">Paid</span> <br>
                                <div class="tdbackgd">
                                    <p>Successful</p>
                                    <p>100%</p>
                                </div>
                            </td>
                        </tr>

                        <!-- ======COLUMN FOR DOMESTIC WIRE TRANSFER======= -->
                        <tr class="tr2">
                            <td class="colord">Scott</td>
                            <td class="colord">Premium Plan</td>
                            <td class="colord">$1000</td>
                            <td class="colord">$7200</td>
                            <td class="colord">3 June 2022</td>
                            <td>
                                <span class="ppppt2">Paid</span> <br>
                                <div class="tdbackgd">
                                    <p>Successful</p>
                                    <p>100%</p>
                                </div>
                            </td>
                        </tr>

                        <!-- ======COLUMN FOR FASTER PAYMENTS======= -->
                        <tr class="tr4">
                            <td class="colord">Gregory</td>
                            <td class="colord">Starter Plan</td>
                            <td class="colord">$450</td>
                            <td class="colord">$3550</td>
                            <td class="colord">3 June 2022</td>
                            <td>
                                <span class="ppppt4">Paid</span> <br>
                                <div class="tdbackgd">
                                    <p>Successful</p>
                                    <p>100%</p>
                                </div>
                            </td>
                        </tr>

                        <!-- ======COLUMN FOR SEPA======= -->
                        <tr class="tr2">
                            <td class="colord">Emily</td>
                            <td class="colord">Gold Plan</td>
                            <td class="colord">$4500</td>
                            <td class="colord">$11500</td>
                            <td class="colord">3 June 2022</td>
                            <td>
                                <span class="ppppt2">Paid</span> <br>
                                <div class="tdbackgd">
                                    <p>Successful</p>
                                    <p>100%</p>
                                </div>
                            </td>
                        </tr>

                        <!-- ======COLUMN FOR QIWI ======= -->
                        <tr class="tr4">
                            <td class="colord">Dennis</td>
                            <td class="colord">Gold Plan</td>
                            <td class="colord">$7900</td>
                            <td class="colord">$18800</td>
                            <td class="colord">3 June 2022</td>
                            <td>
                                <span class="ppppt4">Paid</span> <br>
                                <div class="tdbackgd">
                                    <p>Successful</p>
                                    <p>100%</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <!-- <div class="rightquowords">
                    <div class="rightquotes">
                        <i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i>
                    </div>
                
                    <div class="ahref">
                        <a href="#" class="lihover">More Instant Payouts Everyday</a>
                    </div>
                
                </div> -->
                </div>


                <!-- ===================== FOR MAXWIDTH 768PX ================================= -->
                <div class="maxwidthy768">
                    <table>
                        <tr class="tr1">
                            <th>USERNAME</th>
                            <th>INVESTMENT PLAN</th>
                            <th>AMOUNT INVESTED</th>
                            <th>DATE</th>
                            <th>TOTAL PROFITS</th>
                        </tr>

                        <tr class="tr2">
                            <td class="colord">David</td>
                            <td class="colord">Starter Plan</td>
                            <td class="colord">$400</td>
                            <td class="colord">$3000</td>
                            <td class="colord">3 June 2022</td>
                        </tr>

                        <!-- ======COLUMN FOR MASTERCARD======= -->
                        <tr class="tr4">
                            <td class="colord">Jason</td>
                            <td class="colord">Premium Plan</td>
                            <td class="colord">$900</td>
                            <td class="colord">$6400</td>
                            <td class="colord">3 June 2022</td>
                        </tr>

                        <!-- ======COLUMN FOR SWIFT======= -->
                        <tr class="tr2">
                            <td class="colord">Charlotte</td>
                            <td class="colord">Premium Plan</td>
                            <td class="colord">$700</td>
                            <td class="colord">$4000</td>
                            <td class="colord">3 June 2022</td>
                        </tr>

                        <!-- ======COLUMN FOR ACH======= -->
                        <tr class="tr4">
                            <td class="colord">Gary</td>
                            <td class="colord">Gold Plan</td>
                            <td class="colord">$2500</td>
                            <td class="colord">$10300</td>
                            <td class="colord">3 June 2022</td>
                        </tr>

                        <!-- ======COLUMN FOR DOMESTIC WIRE TRANSFER======= -->
                        <tr class="tr2">
                            <td class="colord">Scott</td>
                            <td class="colord">Premium Plan</td>
                            <td class="colord">$1000</td>
                            <td class="colord">$7200</td>
                            <td class="colord">3 June 2022</td>
                        </tr>

                        <!-- ======COLUMN FOR FASTER PAYMENTS======= -->
                        <tr class="tr4">
                            <td class="colord">Gregory</td>
                            <td class="colord">Starter Plan</td>
                            <td class="colord">$450</td>
                            <td class="colord">$3550</td>
                            <td class="colord">3 June 2022</td>
                        </tr>

                        <!-- ======COLUMN FOR SEPA======= -->
                        <tr class="tr2">
                            <td class="colord">Dennis</td>
                            <td class="colord">Gold Plan</td>
                            <td class="colord">$7900</td>
                            <td class="colord">$18800</td>
                            <td class="colord">3 June 2022</td>
                        </tr>

                    </table>
                </div>

            </div>

        </section>

        <!-- ================================================== FOOTER ================================================================ -->
        <?php require("./components/footer.php") ?>
    </center>
    <script src="main.js"></script>
    <script>
        $(document).ready(function() {
            $("#sta").click(function() {
                let uid = "<?php echo $id  ?>"
                if (uid !== "") {
                    window.location.href = "/dashboard"
                } else {
                    window.location.href = "/signin"
                }
            })

            $("#pre").click(function() {
                let uid = "<?php echo $id  ?>"
                if (uid !== "") {
                    window.location.href = "/dashboard"
                } else {
                    window.location.href = "/signin"
                }
            })
            $("#sil").click(function() {
                let uid = "<?php echo $id  ?>"
                if (uid !== "") {
                    window.location.href = "/dashboard"
                } else {
                    window.location.href = "/signin"
                }
            })

            $("#gol").click(function() {
                let uid = "<?php echo $id  ?>"
                if (uid !== "") {
                    window.location.href = "/dashboard"
                } else {
                    window.location.href = "/signin"
                }
            })
        });
    </script>
</body>

</html>