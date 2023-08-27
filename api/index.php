<?php
// USD döviz kuru için değişken tanım
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
curl_close($ch);


// dmax döviz kuru için değişken tanımı
$dmaxRate = '';
// URL'yi belirleyin
$url = "https://www.dmax.com.tr/canli-izle";
// Veriyi çekmek için cURL kullanın
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
// Gerekli veriyi ayrıştırın
if (preg_match('/<div class="program-name">([^<]+)/', $response, $matches)) {
    $dmaxRate = $matches[1]; // Döviz kuru
   /*  echo "Euro / Türk Lirası kuru: " . $eurRate; */
} else {
    echo "Veri çekilemedi.";
}
// cURL bağlantısını kapatın
//dmax bitti


// dmax döviz kuru için değişken tanımı
$tlcRate = '';
// URL'yi belirleyin
$url = "https://www.tlctv.com.tr/";
// Veriyi çekmek için cURL kullanın
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
// Gerekli veriyi ayrıştırın
if (preg_match('/<div class="program-name">([^<]+)/', $response, $matches)) {
    $tlcRate = $matches[1]; // Döviz kuru
   /*  echo "Euro / Türk Lirası kuru: " . $eurRate; */
} else {
    echo "Veri çekilemedi.";
}
// cURL bağlantısını kapatın
//dmax bitti






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doviz kuru</title>
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

</head>
<body>
<div class="finance">

<p class="usd"> USD/TL Kuru: <?php echo $usdRate; ?></p>
<p class="eur"> EUR/TL Kuru: <?php echo $eurRate; ?></p>
<p class="gbp"> GBP/TL Kuru: <?php echo $gbpRate; ?></p>
<p class="btc"> BTC/USD Kuru: <?php echo $btcRate; ?></p>
<p class="au">Ç. ALTIN Kuru: <?php echo $goldRate; ?></p>
<p class="dmax"> DMAX: <a href="https://www.dmax.com.tr/canli-izle"><?php echo $dmaxRate; ?></a></p>
<p class="tlc"> TLC:<a href="https://tlctv.com.tr/canli-izle"><?php echo $tlcRate;?></a></p>
    
</div>


</body>
</html>
