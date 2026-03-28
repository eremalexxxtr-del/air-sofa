<?php
// СЮДА ВСТАВЬ ТОКЕН СВОЕГО ТЕЛЕГРАМ-БОТА
$token = "ТВОЙ_ТОКЕН_БОТА"; 

// СЮДА ВСТАВЬ СВОЙ ID В ТЕЛЕГРАМЕ
$chat_id = "ТВОЙ_CHAT_ID"; 

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