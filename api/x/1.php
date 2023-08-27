php 6.5


<?php

$goldRate = '';

// URL'yi belirleyin
$url = "https://www.google.com/finance/quote/USD-TRY";

// cURL ile sayfayı çekin
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

// XPath ile hedef elementi bulma
$doc = new DOMDocument();
@$doc->loadHTML($response);
$xpath = new DOMXPath($doc);
$xpath_expression = '//*[@id="yDmH0d"]/c-wiz[2]/div/div[4]/div/main/div[2]/c-wiz/div/div[1]/div/div[1]/div/div[1]/div/span/div/div';
$target_element = $xpath->query($xpath_expression);

// Eğer hedef element bulunursa içeriğini alabilirsiniz
if ($target_element->length > 0) {
    $goldRate = $target_element->item(0)->nodeValue;
   // echo "ALTIN Kuru: " . $goldRate;
} else {
    echo "Veri çekilemedi.";
}

// cURL bağlantısını kapatın
curl_close($ch);


<p class="au"> ALTIN Kuru: <?php echo $goldRate; ?></p>


phpinfo();
?>
    
