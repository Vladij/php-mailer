<?php
require 'phpmailer/class.phpmailer.php';

//присваиваем переменные с формы

$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);

//описания переменных

$subject = 'Тема письма';

//пишем условия для получения данных с формы

if($_POST['name']){  //если поле 'name' заполнено
  $message = "<p> Имя: " . $_POST['name'] . "</p>"; //если выполнено, то формируем строку и записываем в переменную
}
if($_POST['phone']){  //если поле 'phone' заполнено
  $message .= "<p> Телефон: " . $_POST['phone'] . "</p>";
}
if($_POST['email']){  //если поле 'phone' заполнено
    $message .= "<p> E-mail: " . $_POST['email'] . "</p>";
}
//конец описания

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$mail->From = 'info@info.ru';      // от кого
$mail->FromName = 'Name from';   // от кого
$mail->AddAddress('email@email.com');   // кому - адрес, Имя
$mail->IsHTML(true);        // выставляем формат письма HTML
$mail->Subject = $subject;  // тема письма
$mail->Body = $message;
if(isset($_FILES['files'])) { //добавляем возможность отправки !!!файла!!! на почту через input type="file" с name="files"
    if($_FILES['files']['error'] == 0){
        $mail->AddAttachment($_FILES['files']['tmp_name'],
                             $_FILES['files']['name']);
    }
}
if(isset($_FILES['files'])) { //добавляем возможность отправки !!!изображения!!! на почту через input type="file" с name="files"
    if($_FILES['files']['error'] == 0){
        $mail->AddEmbeddedImage($_FILES['files']['tmp_name'],
            $_FILES['files']['name']);
    }
}
// отправляем наше письмо
if(!$mail->send()) {
    echo "failed";
} else {
    echo "Success";
}

?>
<script>
     window.location = 'http://.../thank-you'; //мгновенная переадресация на другую страницу
</script>