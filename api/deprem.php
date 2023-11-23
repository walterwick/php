<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Son Depremler</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Son Depremler</h2>
        <hr>
        <?php
        $url = 'http://www.koeri.boun.edu.tr/scripts/lst9.asp';

        $context = stream_context_create(array(
            'http' => array(
                'header' => 'Content-type: text/html; charset=UTF-8',
            ),
        ));

        $content = file_get_contents($url, false, $context);

        if ($content !== false) {
            $startTag = '<pre>';
            $endTag = '</pre>';
            $startPos = strpos($content, $startTag);
            $endPos = strpos($content, $endTag, $startPos);

            if ($startPos !== false && $endPos !== false) {
                $preContent = substr($content, $startPos + strlen($startTag), $endPos - $startPos - strlen($startTag));

                echo '<div class="alert alert-info">';
                echo '<pre>';
                echo mb_convert_encoding($preContent, 'UTF-8', 'ISO-8859-9');
                echo '</pre>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger">Veri bulunamadı.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Veri çekme hatası.</div>';
        }
        ?>
    </div>
</body>
</html>
