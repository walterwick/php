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
curl_close($ch);
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
curl_close($ch);
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
curl_close($ch);
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
curl_close($ch);
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


?>



<div class="finance">

<p class="usd"> USD/TL Kuru: <?php echo $usdRate; ?></p>
<p class="eur"> EUR/TL Kuru: <?php echo $eurRate; ?></p>
<p class="gbp"> GBP/TL Kuru: <?php echo $gbpRate; ?></p>
<p class="btc"> BTC/USD Kuru: <?php echo $btcRate; ?></p>
<p class="au"> ALTIN Kuru: <?php echo $goldRate; ?></p>
</div>

