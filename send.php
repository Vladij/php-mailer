<?php
require 'mailer/phpmailer/class.phpmailer.php';

//присваиваем переменные с формы

$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);

//описания переменных

$subject = 'Тема письма';

//пишем условия для получения данных с формы

if($_POST['name']){  //если поле 'name' заполнено
  message = "<p> Имя: " . $_POST['name'] . "</p>"; //если выполнено, то формируем строку
}
if($_POST['name']){  //если поле 'name' заполнено
  message = "<p> Имя: " . $_POST['name'] . "</p>"; //если выполнено, то формируем строку
}
//конец описания

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$mail->From = 'info@sudexpa.ru';      // от кого
$mail->FromName = 'Call';   // от кого
$mail->AddAddress('daniil_kim_7@mail.ru');   // кому - адрес, Имя
$mail->IsHTML(true);        // выставляем формат письма HTML
$mail->Subject = $subject;  // тема письма
$mail->Body = $message;
if(isset($_FILES['file_downloade'])) {
    if($_FILES['file_downloade']['error'] == 0){
        $mail->AddAttachment($_FILES['file_downloade']['tmp_name'],
                             $_FILES['file_downloade']['name']);
    }
}

// отправляем наше письмо
if(!$mail->send()) {
    echo 0;
} else {
    echo 1;
}

?>
<script>
     window.location = 'http://.../thank-you';
</script>