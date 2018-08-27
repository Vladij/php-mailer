<form action="" method="POST" id="form">
    <input type="text" name="name" />
    <input type="tel" name="phone">
    <input type="email" name="email">
    <input type="file" name="files">
    <input type="submit" name="submit" id="up">
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"> //подключаем внешнюю библиотеку для выполнения скриптов
    $(function () {
        $('#form').on('submit', function (e) {
            e.preventDefault();//отключаем событие при нажатии кнопки
            var forma = $('#form').serialize();

            $.ajax({
                url: 'send.php',
                type: 'POST',
                data: forma,
                success: function (msg) {
                    if(msg == 'success'){
                        $(".up").val("Отправлено");
                    }else{
                        $(".up").val("Ошибка");
                    }setTimeout(function () {
                        $(".up").val("Отправить");
                    }, 3000);
                }
            });
        });
    });
</script>