<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Formu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Dosya yükleme işlemleri
    $attachment_name = $_FILES['attachment']['name'];
    $attachment_temp = $_FILES['attachment']['tmp_name'];
    $attachment_size = $_FILES['attachment']['size'];

    // Dosya boyutu kontrolü
    $max_file_size = 2 * 1024 * 1024; // 2MB olarak ayarlanmıştır.

    if ($attachment_size > $max_file_size) {
        echo "Dosya boyutu 2MB'tan büyük olamaz.";
        exit;
    }

    // Dosyayı belirli bir klasöre taşı
    $upload_dir = 'uploads/'; // Bu klasörün oluşturulduğundan emin olun
    $upload_path = $upload_dir . $attachment_name;
    move_uploaded_file($attachment_temp, $upload_path);

    // Telegram'a bildirim gönderme işlemi
    $token = '6435977146:AAExFsusLAtoivKFKW01Ca1hCsQOVIf2H7I'; // Telegram bot tokeninizi buraya ekleyin
    $chat_id = '2090459804'; // Kullanıcı veya grup chat ID'nizi buraya ekleyin
    $message_text = "Yeni iletişim mesajı!\n\nAd Soyad: $name\nE-posta: $email\nKonu: $subject\nMesaj: $message";

    // Eğer dosya varsa, Telegram'a dosya gönder
    if (!empty($attachment_name)) {
        $file_url = "https://api.telegram.org/bot$token/sendDocument";
        $file_params = [
            'chat_id' => $chat_id,
            'document' => new CURLFile(realpath($upload_path))
        ];

        $ch_file = curl_init($file_url);
        curl_setopt($ch_file, CURLOPT_POST, 1);
        curl_setopt($ch_file, CURLOPT_POSTFIELDS, $file_params);
        curl_setopt($ch_file, CURLOPT_RETURNTRANSFER, true);
        $response_file = curl_exec($ch_file);
        curl_close($ch_file);
    }

    $telegram_url = "https://api.telegram.org/bot$token/sendMessage";
    $telegram_params = [
        'chat_id' => $chat_id,
        'text' => $message_text
    ];

    $ch = curl_init($telegram_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $telegram_params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Bildirim gönderildiğini kontrol et
    if ($response === false) {
        echo "Bildirim gönderme hatası: " . curl_error($ch);
    } else {
        // SweetAlert ile uyarı göster
        echo "<script>
                swal('Mesajınız Gönderildi', 'Teşekkür ederiz!', 'success')
                .then((value) => {
                    window.location.href = 'index.php'; // Anasayfaya yönlendir
                });
              </script>";
    }
}
?>

<div class="container mt-5">
    <h1>İletişim Formu</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Ad Soyad:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">E-posta Adresi:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="subject">Konu:</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="form-group">
            <label for="message">Mesaj:</label>
            <textarea class="form-control" id="message" name="message" required></textarea>
        </div>
        <div class="form-group">
            <label for="attachment">Dosya/Görsel Ekle (Maksimum 2MB):</label>
            <input type="file" class="form-control-file" id="attachment" name="attachment">
        </div>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
