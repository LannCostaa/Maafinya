<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dapatkan nama dari form
    $name = $_POST['name'];

    // Token dan chat ID bot Telegram
    $botToken = "7595276003:AAH_K5VI6YosFAzu_h6XfNDhZ-qc_pj4wGQ";
    $chatID = "1180705952";

    // Pesan yang akan dikirimkan
    $message = "Nama yang dimasukkan: " . $name;

    // URL API Telegram
    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    // Data untuk dikirimkan ke API
    $postData = [
        'chat_id' => $chatID,
        'text' => $message
    ];

    // Kirim permintaan POST ke API Telegram
    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($postData),
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // Tampilkan pesan sukses atau gagal
    if ($result) {
        echo "Nama berhasil dikirim ke bot Telegram.";
    } else {
        echo "Gagal mengirim pesan.";
    }
}
?>
