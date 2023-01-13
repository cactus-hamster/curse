<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf8_general_ci">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Регистрация</title>
</head>
<body>
<table>
<tr><td width = '500px'></td><td></td></tr> <!--ряд с ячейками заголовков-->
<tr>
  <td>
    <table>
      <tr><td><button class="btn btn-primary btn-sm" onclick="location.href='hellopage.php'">Главная страница</button></td><td></td></tr>
      <tr><td><button class="btn btn-primary btn-sm">Отметить посещаемость</button></td><td></td></tr>
      <?php
      session_start();
      if($_SESSION['role']==='1')
      {
          echo '<tr>';
          echo'<td><button class="btn btn-secondary btn-sm" onclick="location.href=';
          echo "'registration.php'";
          echo'">Добавить пользователя</button></td><td></td></tr>';
          echo '<tr>';
          echo'<td><button class="btn btn-primary btn-sm" onclick="location.href=';
          echo "'reg_new_table.php'";
          echo'">Добавить группу</button></td><td></td></tr>';
      }
      ?>
    </table>
  </td>
  <td align="center" vertical-align="middle"><?php
    if($_SESSION['user'] === false){
      echo '<h3>Привет Гость, доступ закрыт авторизируйтесь!</h3>'."\r\n";
   }
   //Если пользователь авторизовался
   if($_SESSION['user'] === true) {
   echo '<div class="container mt-4" align="center">
    <div class="col" style="display: table; width: 400px;">
        <h1>Форма регистрации</h1>
        <form action="check.php" method="post">
            <input type="text" name="login" class="form-control" id="login" placeholder="Логин"><br>
            <input type="text" name="name" class="form-control" id="name" placeholder="Имя"><br>
            <input type="password" name="pass" class="form-control" id="pass" placeholder="Пароль"><br>
            <select style="display: table; width: 400px;height: 50px; text-align: center" name="role">
                <option selected>Доступ</option>
                <option value="1">Администратор</option>
                <option value="2">Преподаватель</option>
                <option value="3">Староста</option>
            </select></br>
            <input type="text" name="dotup" class="form-control" id="dotup" placeholder="Группы"><br>
            <input class="btn btn-success" type="submit" value="Зарегистрироваться" /><br>
        </form>
    </div>
</div>';
   }?></td>
</tr> <!--ряд с ячейками тела таблицы-->
<tr></tr>
</table>

</body>
</html>

