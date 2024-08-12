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
$ön3 = fetchValue("https://bigpara.hurriyet.com.tr/altin/ceyrek-altin-fiyati/", '/<span class="value up">([^<]+)/', 0);

$dmax = fetchValue("https://www.dmax.com.tr/canli-izle/", '/<div class="program-name">([^<]+)/', 0);
$tlc = fetchValue("https://www.tlctv.com.tr/", '/<div class="program-name">([^<]+)/', 0);

// Prepare the data to send to the Telegram API
$message = urlencode("USD-TRY: $q\nEUR-TRY: $w\nGBP-TRY: $e\nBTC-USD: $r\nGram Altın: $ön2\nWebsite Data: $ön3\nDMAX: $dmax\nTLC: $tlc");
$chat_id = '2090459804'; // Replace this with your actual chat ID

// Telegram API endpoint
$telegram_endpoint = "https://api.telegram.org/bot7010838445:AAHT2qsRo1U3jDkacdpJQhIB4zRb2IYjTS0/sendMessage?chat_id=2090459804&text=$message";

// Send data to Telegram
$response = file_get_contents($telegram_endpoint);

// Handle the response if needed
if ($response === false) {
    echo "Failed to send message to Telegram.";
} else {
    echo "Message sent to Telegram successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document 
    </title>
</head>
<body>
    <p class="usd"> USD-TRY <?php echo $q; ?></p>
    <p class="eur"> EUR-TRY <?php echo $w; ?></p>
    <p class="gbp"> GBP-TRY <?php echo $e; ?></p>
    <p class="btc"> BTC-USD <?php echo $r; ?></p>
    <p class="gbp"> GRAM <?php echo $ön2; ?></p>
    <p class="gbp"> ÇEYREK <?php echo $ön3; ?></p>
    <p class="dmax"> DMAX: <a href="https://www.dmax.com.tr/canli-izle"><?php echo $dmax; ?></a></p>
    <p class="tlc"> TLC:<a href="https://tlctv.com.tr/canli-izle"><?php echo $tlc; ?></a></p>

</body>
</html>
