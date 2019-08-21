<?php
if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6Lc2EK8UAAAAAKLYihtlKgADTwRR05Kc9yG9LtSd';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if($responseData->success) {
        $to = 'itestmail1@yandex.ru';//'sergej.sidr@bk.ru,MOSEVROREMONT@MAIL.RU'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Заполнена форма калькулятора'; //Загаловок сообщения
        $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['name'].'</p>                
                        <p>Электронный адрес: '.$_POST['email'].'</p>                
                        <p>Номер телефона без ( + ): '.$_POST['phone'].'</p>                
                        <p>Сообщение: '.$_POST['message'].'</p>                           
                    </body>
                </html>';
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: SmartyCMS Support <robot@smartycms.ru>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
        echo 'ok!';
    } else {
        die();
    }
} else {
    echo 'recaptcha_err';
}