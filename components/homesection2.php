<section class="container">
    <h1 class="text-center mt-3 ">
        Our Trade Pattern<br>
        <span class="underline1"></span>
    </h1>

    <!-- -->
    <div class="row ps-auto pe-auto justify-content-center pt-4">
        <div class="col-lg-6 col-md-6 col-12">
            <h2>
                We maintain the trade pattern
            </h2>
            <iframe width="500px" height="345px" src="https://www.youtube.com/embed/YYcwS98_L8s?autoplay=0&amp;mute=1&amp;loop=1"> </iframe>
        </div>

        <div class="col-lg-6 col-md-6 col-12 pe-2">
            <div class="" style="height: 400px;overflow-x: scroll; width: 100%;">
                <h1>Listing actual prices.</h1>
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
                                    <p> <?php echo round($data[$key]["price_change_percentage_24h"], 2) ?>%</p>
                                </i> </td>
                        </tr>

                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>

    </div>

</section>