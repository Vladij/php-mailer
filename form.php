<form action="" method="POST" id="form">
    <input type="text" name="name" />
    <input type="tel" name="phone">
    <input type="email" name="email">
    <input type="file" name="files">
    <input type="submit" name="submit" id="up">
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> //подключаем внешнюю библиотеку для выполнения скриптов
    $(function () {
        $('#form').on('submit', function (e) {
            e.preventDefault();//отключаем событие при нажатии кнопки
            var forma = $('#form').serialize();

            $.ajax({
                url: 'send.php',
                type: 'POST',
                data: forma,
                success: function () {
                        $("#up").val("Отправлено");
                    }
                });
            });
        });
</script>
