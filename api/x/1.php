<!DOCTYPE html>
<html lang="en">

<?php
// USD döviz kuru için değişken tanımı
$usdRate = '';
// URL'yi belirleyin
$url = "https://www.google.com/finance/quote/USD-TRY";
// Veriyi çekmek için cURL kullanın
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
// Gerekli veriyi ayrıştırın
if (preg_match('/<div class="YMlKec fxKbKc">([^<]+)/', $response, $matches)) {
    $usdRate = $matches[1]; // Döviz kuru
   /*  echo "Dolar / Türk Lirası kuru: " . $usdRate; */
} else {
    echo "Veri çekilemedi.";
}
// cURL bağlantısını kapatın

//usd bitti




// EUR döviz kuru için değişken tanımı
$eurRate = '';
// URL'yi belirleyin
$url = "https://www.google.com/finance/quote/EUR-TRY";
// Veriyi çekmek için cURL kullanın
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
// Gerekli veriyi ayrıştırın
if (preg_match('/<div class="YMlKec fxKbKc">([^<]+)/', $response, $matches)) {
    $eurRate = $matches[1]; // Döviz kuru
   /*  echo "Euro / Türk Lirası kuru: " . $eurRate; */
} else {
    echo "Veri çekilemedi.";
}
// cURL bağlantısını kapatın

//eur bitti




// GBP döviz kuru için değişken tanımı
$gbpRate = '';
// URL'yi belirleyin
$url = "https://www.google.com/finance/quote/GBP-TRY";
// Veriyi çekmek için cURL kullanın
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
// Gerekli veriyi ayrıştırın
if (preg_match('/<div class="YMlKec fxKbKc">([^<]+)/', $response, $matches)) {
    $gbpRate = $matches[1]; // Döviz kuru
   /*  echo "Euro / Türk Lirası kuru: " . $eurRate; */
} else {
    echo "Veri çekilemedi.";
}
// cURL bağlantısını kapatın

//gbp bitti



$btcRate = '';
// BTC döviz kuru için değişken tanımı
// URL'yi belirleyin
$url = "https://www.google.com/finance/quote/BTC-USD";
// Veriyi çekmek için cURL kullanın
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
// Gerekli veriyi ayrıştırın

if (preg_match('/<div class="YMlKec fxKbKc">([^<]+)/', $response, $matches)) {
    $btcRate = $matches[1]; // Döviz kuru
   /*  echo "Euro / Türk Lirası kuru: " . $eurRate; */
} else {
    echo "Veri çekilemedi.";
}
// cURL bağlantısını kapatın

//btc bitti



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
//curl_close($ch);


$ggoldRate = '';

// URL'yi belirleyin
$url = "https://bigpara.hurriyet.com.tr/altin/gram-altin-fiyati/";

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
    $ggoldRate = $target_element->item(0)->nodeValue;
    
} else {
    echo "Veri çekilemedi.";
}

// cURL bağlantısını kapatın
curl_close($ch);




 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KUR V2</title>

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
            <div class="bottom"></div>
        </div>



        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Euro-EUR-icon.png" alt="eur"></div>
                <div class="right">
                    <p class="eur"> EUR/TL Kuru: <?php echo $eurRate; ?></p>
                </div>
            </div>
            <div class="bottom"></div>
        </div>

        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Pound-GBP-icon.png" alt="gbp"></div>
                <div class="right">
                    <p class="gbp"> GBP/TL Kuru: <?php echo $gbpRate; ?></p>
                </div>
            </div>
            <div class="bottom"></div>
        </div>


        <div class="kur">
            <div class="top">
                <div class="left"><img class="rot" src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/64/Bitcoin-BTC-icon.png" alt="btc"></div>
                <div class="right">
                    <p class="btc"> BTC/USD Kuru: <?php echo $btcRate; ?></p>
                </div>
            </div>
            <div class="bottom"></div>
        </div>


        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/chrisl21/minecraft/64/Gold-Ingot-icon.png" alt="au"></div>
                <div class="right">
                    <p class="au">Ç. ALTIN Kuru: <?php echo $goldRate; ?></p>
                </div>
            </div>
            <div class="bottom"></div>
        </div>


        <div class="kur">
            <div class="top">
                <div class="left"><img src="https://icons.iconarchive.com/icons/chrisl21/minecraft/64/Gold-Ingot-icon.png" alt="au"></div>
                <div class="right">
                    <p class="gau">G. ALTIN Kuru: <?php echo $ggoldRate; ?></p>
                </div>
            </div>
            <div class="bottom"></div>
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
        border: 2px solid rgba(179, 0, 0, 0.767);
    }

    .top {
        width: 100%;
        height: 50%;
        display: flex;
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

    .bottom {
        width: 100%;
        height: 50%;
        border-top: rgba(255, 255, 255, 0.418) solid 2px;
        background-color: var(--iç-renk);
    }

    @media screen and (max-width: 920px) {
        .banner {
            grid-template-columns: repeat(1, 1fr);
        }

        .kur {
            margin: 1rem 0rem 1rem 0;
        }
    }
</style>

</html>
