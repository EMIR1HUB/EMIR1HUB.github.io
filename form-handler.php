<?php

require_once 'config/connect.php';      //подключение к БД

// Отправка на почту
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$phone =$_POST['phone'];
$promo =$_POST['promo'];


$email_from = 'emirtesttemp@gmail.com';

$email_subject = 'Обратная связь курсы "КУРСЫ ВЕБ-РАЗРАБОТЧИКА"';

if($subject){
    $email_body = "Имя Пользователя: $name.\n".
            "Email Пользователя: $visitor_email.\n".
            "Предмет: $subject.\n".
            "Сообщение: $message.\n";
}
else{
    if($phone){
        if($promo){
            $email_body = "Имя Пользователя: $name.\n".
                    "Email Пользователя: $visitor_email.\n".
                    "Телефон: $phone.\n".
                    "Промокод: $promo.\n";
        }
        else{
            $email_body = "Имя Пользователя: $name.\n".
                "Email Пользователя: $visitor_email.\n".
                "Телефон: $phone.\n";
        }
    }
    else{
        $email_body = "Имя Пользователя: $name.\n".
                "Email Пользователя: $visitor_email.\n".
                "Сообщение: $message.\n";
    }
}


$to = "emir-23.03@mail.ru";

$headers .="От: $email_from \r\n";

$headers .= "Ответить на: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

// -----------------------------------------------------------------------------------------------------------------
// добавление в базу данных
mysqli_query($connect, query:"INSERT INTO `singed_up` (`id`, `name`, `email`, `phone`) VALUES (NULL, '$name', '$visitor_email', '$phone')");

/*
 * Переадресация на главную страницу
 */

header("Location: index.html");

?>