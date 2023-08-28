<?php
function fetchValue($url, $regex, $index) {
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
//sayı hangi classı alacağımı seçer 0 ilk clası seçer
$q = fetchValue("https://www.google.com/finance/quote/USD-TRY", '/<div class="YMlKec fxKbKc">([^<]+)/', 0);
$w = fetchValue("https://www.google.com/finance/quote/EUR-TRY", '/<div class="YMlKec fxKbKc">([^<]+)/', 0);
$e = fetchValue("https://www.google.com/finance/quote/GBP-TRY", '/<div class="YMlKec fxKbKc">([^<]+)/', 0);
$r = fetchValue("https://www.google.com/finance/quote/BTC-USD", '/<div class="YMlKec fxKbKc">([^<]+)/', 0);
$ön2 = fetchValue("https://bigpara.hurriyet.com.tr/altin/gram-altin-fiyati/", '/<span class="value up">([^<]+)/', 0);
$ön3 = fetchValue("https://bigpara.hurriyet.com.tr/altin/ceyrek-altin-fiyati/", '/<span class="value up">([^<]+)/', 1);

$dmax = fetchValue("https://www.dmax.com.tr/canli-izle/", '/<div class="program-name">([^<]+)/', 0);
$tlc = fetchValue("https://www.tlctv.com.tr/", '/<div class="program-name">([^<]+)/', 0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="gbp"> Dünkü Kapanış <?php echo $q; ?></p>
    <p class="gbp"> Dünkü Kapanış <?php echo $w; ?></p>
    <p class="gbp"> Dünkü Kapanış <?php echo $e; ?></p>
    <p class="gbp"> Dünkü Kapanış <?php echo $r; ?></p>
    <p class="gbp"> Dünkü Kapanış <?php echo $ön2; ?></p>
    <p class="gbp"> Dünkü Kapanış <?php echo $ön3; ?></p>
    <p class="dmax"> DMAX: <a href="https://www.dmax.com.tr/canli-izle"><?php echo $dmax; ?></a></p>
    <p class="tlc"> TLC:<a href="https://tlctv.com.tr/canli-izle"><?php echo $tlc; ?></a></p>

</body>
</html>
