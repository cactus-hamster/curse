<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Вход в систему</title>
</head>
<body>
<div class="container mt-4" align="center" >
        <div class="col"style="display: table; width: 400px;">
            <h1>Форма авторизации</h1>
            <form action="auth.php" method="post">
                <input type="text" name="login" class="form-control" id="login" placeholder="Логин"><br>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Пароль"><br>
                <button class="btn btn-success">Авторизоваться</button><br>
            </form>
        </div>
</div>
</body>
</html>