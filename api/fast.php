<?php
$JSON = json_decode(file_get_contents('https://api.genelpara.com/embed/para-birimleri.json'), true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAST Api</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    <div class="banner">

        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Dollar-USD-icon.png" alt="usd">
                </div>
                <div class="right">
                    <p class="usd"> USD/TL Kuru: <?php echo $JSON['USD']['satis']; ?> </p>
                </div>
            </div>
            <div class="bottom">
                <p class="last"> Öneceki Kapanış: <?php echo $JSON['USD']['degisim']; ?></p>
            </div>
        </div>



        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Euro-EUR-icon.png" alt="eur"></div>
                <div class="right">
                    <p class="eur"> EUR/TL Kuru: <?php echo $JSON['EUR']['satis']; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="last"> Öneceki Kapanış: <?php echo $JSON['EUR']['degisim']; ?> </p>
            </div>
        </div>

        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Pound-GBP-icon.png" alt="gbp"></div>
                <div class="right">
                    <p class="gbp"> GBP/TL Kuru: <?php echo $JSON['GBP']['satis']; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="last"> Öneceki Kapanış: <?php echo $JSON['GBP']['degisim']; ?> </p>
            </div>
        </div>
        <div class="kur">
            <div class="top">
                <div class="left"><img class="rot" src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Bitcoin-BTC-icon.png" alt="btc"></div>
                <div class="right">
                    <p class="btc"> BTC/USD Kuru: <?php echo $JSON['BTC']['satis']; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="last"> Öneceki Kapanış <?php echo $JSON['BTC']['degisim']; ?></p>
            </div>
        </div>


        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/chrisl21/minecraft/64/Gold-Ingot-icon.png" alt="au"></div>
                <div class="right">
                    <p class="au">Ç. ALTIN Kuru: <?php echo $JSON['C']['satis']; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="last"> Öneceki Kapanış <?php echo $JSON['C']['degisim']; ?> </p>
            </div>
        </div>


        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/chrisl21/minecraft/64/Gold-Ingot-icon.png" alt="au"></div>
                <div class="right">
                    <p class="gau">G. ALTIN Kuru: <?php echo $JSON['GA']['satis']; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="last"> Öneceki Kapanış <?php echo $JSON['GA']['degisim']; ?></p>
            </div>
        </div>




        <div class="kur ss">
            <div class="top dmax">
                <p class="dmax"> DMAX: <a href="https://www.dmax.com.tr/canli-izle"></a></p>
                <div class="rights">
                </div>
            </div>
            <div class="bottom cc">
                <p class="tlc"> TLC:<a href="https://tlctv.com.tr/canli-izle"></a></p>

            </div>
        </div>
        <div class="kur end">
            <iframe width="100%" height="50%" src="https://api.genelpara.com/iframe/?symbol=para-birimleri&pb=,USD,EUR,GA,C,BTC&stil=stil-3&renk=siyah" frameborder="0"></iframe>
            <iframe width="100%" height="50%" src="https://api.genelpara.com/iframe/?symbol=doviz&doviz=USD,EUR,GBP,CHF,CAD&stil=stil-1&renk=siyah" frameborder="0"></iframe>
        </div>
    </div>




</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    :root {
        --iç-renk: #333;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    body {
        background: #000000;
        color: white;
        font-size: 1.45rem;

    }

    a {
        color: navy;
    }

    .banner {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); */
        place-items: center;
    }

    .kur {
        height: 20vh;
        width: 88%;
        margin: 1rem .7rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 2px solid rgba(87, 0, 0, 0.767);
        border-radius: .6rem;
        transition: .7s;
    }

    .top {
        width: 100%;
        height: 50%;
        display: flex;
    }

    .dmax {
        display: grid;
        place-items: center;
    }

    .left {
        width: 30%;
        height: 100%;
        background-color: var(--iç-renk);
        border-right: 2px solid rgba(255, 255, 255, 0.397);
        display: grid;
        place-items: center;
    }

    .right {
        width: 70%;
        height: 100%;
        background-color: var(--iç-renk);
        display: grid;
        place-items: center;
    }

    #time {
        height: 20px;
        width: 100%;
        background: red;
    }

    .ss {
        background: #333;
        color: white;
    }

    .kur:hover {
        transform: scale(1.05);
        background: #373737;
    }

    .bottom {
        width: 100%;
        height: 50%;
        border-top: rgba(255, 255, 255, 0.418) solid 2px;
        background-color: var(--iç-renk);
        display: grid;
        place-items: center;
        color: #ffffff85;
    }

    @media screen and (max-width: 920px) {
        .banner {
            grid-template-columns: repeat(1, 1fr);
        }

        .kur {
            margin: 1rem 0rem 1rem 0;
        }
    }

    .tlc {
        color: white;
    }

    .end {
        grid-column: 2/4;
        background: #333;
        width: 95%;
    }
</style>

</html>
