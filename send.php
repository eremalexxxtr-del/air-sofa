<?php
// СЮДА ВСТАВЬ ТОКЕН СВОЕГО ТЕЛЕГРАМ-БОТА
$token = "8659714254:AAGTGwIEIhMBhDU0kP2xDYDKG8KvmMEUTF8"; 

// СЮДА ВСТАВЬ СВОЙ ID В ТЕЛЕГРАМЕ
$chat_id = "981760227"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST['name']));
    $phone = strip_tags(trim($_POST['phone']));
    $package = strip_tags(trim($_POST['package']));
    $source = strip_tags(trim($_POST['source']));

    if (!empty($name) && !empty($phone)) {
        // Формируем сообщение
        $txt = "🔥 <b>НОВАЯ ЗАЯВКА | AIR SOFA</b> 🔥%0A";
        $txt .= "👤 Имя: <b>" . $name . "</b>%0A";
        $txt .= "📞 Телефон: <b>" . $phone . "</b>%0A";
        $txt .= "📦 Пакет: <b>" . $package . "</b>%0A";
        $txt .= "🌐 Источник: " . $source;

        // Отправляем в Telegram
        $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}";
        $sendToTelegram = @file_get_contents($url);

        if ($sendToTelegram) {
            http_response_code(200);
            echo "Success";
        } else {
            http_response_code(500);
            echo "Error";
        }
    } else {
        http_response_code(400);
        echo "Bad Request";
    }
} else {
    http_response_code(403);
    echo "Forbidden";
}
?>