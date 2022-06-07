<?php

// Отправка на почту
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_from = 'emirtesttemp@gmail.com';

$email_subject = "Обратная связь: $subject.";


$email_body = "Имя Пользователя: $name.\n".
        "Email Пользователя: $visitor_email.\n".
        "Сообщение: $message.\n";

$to = "emir-23.03@mail.ru";

$headers .="От: $email_from \r\n";

$headers .= "Ответить на: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);


header("Location: index.html");

?>