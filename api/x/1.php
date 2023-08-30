<?php
function fetchValue($url, $regex, $index)
{
    $response = file_get_contents($url);
    if (preg_match_all($regex, $response, $matches)) {
        if (isset($matches[1][$index])) {
            return $matches[1][$index];
        } else {
            return "Veri çekilemedi.";
        }
    } else {
        return "Veri çekilemedi.";
    }
}

$usdRate = fetchValue("https://www.google.com/finance/quote/USD-TRY", '/<div class="YMlKec fxKbKc">([^<]+)/', 0);
$eurRate = fetchValue("https://www.google.com/finance/quote/EUR-TRY", '/<div class="YMlKec fxKbKc">([^<]+)/', 0);
$gbpRate = fetchValue("https://www.google.com/finance/quote/GBP-TRY", '/<div class="YMlKec fxKbKc">([^<]+)/', 0);
$btcRate = fetchValue("https://www.google.com/finance/quote/BTC-USD", '/<div class="YMlKec fxKbKc">([^<]+)/', 0);
/* $goldRate = fetchValue("https://php--midyeli63.repl.co/", '/<p class="au">([^<]+)/', 0);*/
$ggRate = fetchValue("https://bigpara.hurriyet.com.tr/altin/gram-altin-fiyati", '/<span class="value up">([^<]+)/', 0);

//sayı hangi classı alacağımı seçer 0 ilk clası seçer
//sayı hangi classı alacağımı seçer 0 ilk clası seçer
$q = fetchValue("https://www.google.com/finance/quote/USD-TRY", '/<div class="P6K39c">([^<]+)/', 0);
$w = fetchValue("https://www.google.com/finance/quote/EUR-TRY", '/<div class="P6K39c">([^<]+)/', 0);
$e = fetchValue("https://www.google.com/finance/quote/GBP-TRY", '/<div class="P6K39c">([^<]+)/', 0);
$r = fetchValue("https://www.google.com/finance/quote/BTC-USD", '/<div class="P6K39c">([^<]+)/', 0);
$ön2 = fetchValue("https://bigpara.hurriyet.com.tr/altin/gram-altin-fiyati/", '/<span class="text2">([^<]+)/', 0);
$ön3 = fetchValue("https://bigpara.hurriyet.com.tr/altin/ceyrek-altin-fiyati/", '/<span class="text2">([^<]+)/', 0);


$dmax = fetchValue("https://www.dmax.com.tr/canli-izle/", '/<div class="program-name">([^<]+)/', 0);
$tlc = fetchValue("https://www.tlctv.com.tr/", '/<div class="program-name">([^<]+)/', 0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KUR V1.2</title>

</head>

<body>

    <div class="banner">

        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Dollar-USD-icon.png" alt="usd">
                </div>
                <div class="right">
                    <p class="usd"> USD/TL Kuru: <?php echo $usdRate; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="gbp"> Öneceki Kapanış <?php echo $q; ?></p>
            </div>
        </div>



        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Euro-EUR-icon.png" alt="eur"></div>
                <div class="right">
                    <p class="eur"> EUR/TL Kuru: <?php echo $eurRate; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="gbp"> Öneceki Kapanış <?php echo $w; ?></p>
            </div>
        </div>

        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Pound-GBP-icon.png" alt="gbp"></div>
                <div class="right">
                    <p class="gbp"> GBP/TL Kuru: <?php echo $gbpRate; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="gbp"> Öneceki Kapanış <?php echo $e; ?></p>
            </div>
        </div>


        <div class="kur">
            <div class="top">
                <div class="left"><img class="rot" src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Bitcoin-BTC-icon.png" alt="btc"></div>
                <div class="right">
                    <p class="btc"> BTC/USD Kuru: <?php echo $btcRate; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="gbp"> Öneceki Kapanış <?php echo $r; ?></p>
            </div>
        </div>


        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/chrisl21/minecraft/64/Gold-Ingot-icon.png" alt="au"></div>
                <div class="right">
                    <p class="au">Ç. ALTIN Kuru: <?php echo $goldRate; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="gbp"> Öneceki Kapanış <?php echo $ön3; ?></p>
            </div>
        </div>


        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/chrisl21/minecraft/64/Gold-Ingot-icon.png" alt="au"></div>
                <div class="right">
                    <p class="gau">G. ALTIN Kuru: <?php echo $ggRate; ?></p>
                </div>
            </div>
            <div class="bottom">
                <p class="gbp"> Öneceki Kapanış <?php echo $ön2; ?></p>
            </div>
        </div>




        <div class="kur ss">
        <div class="top dmax">
                <p class="dmax"> DMAX: <a href="https://www.dmax.com.tr/canli-izle"><?php echo $dmax; ?></a></p>
            <div class="rights">
            </div>
        </div>
        <div class="bottom cc">
            <p class="tlc"> TLC:<a href="https://tlctv.com.tr/canli-izle"><?php echo $tlc; ?></a></p>

        </div>
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
    .dmax{display: grid;
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
    .tlc{
        color: white;
    }
</style>
    <?php
$goldRate = '';

// URL'yi belirleyin
$url = "https://bigpara.hurriyet.com.tr/altin/ceyrek-altin-fiyati/";

// cURL ile sayfayı çekin
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

// XPath ile hedef elementi bulma
$doc = new DOMDocument();
@$doc->loadHTML($response);
$xpath = new DOMXPath($doc);
$xpath_expression = '//*[@id="content"]/div[2]/div/div[2]/div[3]/span[2]';
$target_element = $xpath->query($xpath_expression);

// Eğer hedef element bulunursa içeriğini alabilirsiniz
if ($target_element->length > 0) {
    $goldRate = $target_element->item(0)->nodeValue;
    
} else {
    echo "Veri çekilemedi.";
}

// cURL bağlantısını kapatın
curl_close($ch);


?>
</html>
