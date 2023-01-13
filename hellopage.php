<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf8_general_ci">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Система учета группу</title>
</head>
<body align="center" vertical-align="middle">
<table>
<tr><td width = '300px' height = '200px'></td><td></td></tr> <!--ряд с ячейками заголовков-->
<tr>
  <td>
    <table>
      <tr><td><button class="btn btn-secondary btn-sm" onclick="location.href='hellopage.php'">Главная страница</button></td><td></td></tr>
      <tr><td><button class="btn btn-primary btn-sm" onclick="location.href='attendance.php'">Отметить посещаемость</button></td><td></td></tr>
      <?php
      session_start();
      if($_SESSION['role']==='1')
      {
          echo '<tr>';
          echo'<td><button class="btn btn-primary btn-sm" onclick="location.href=';
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
      //Пишем приветствие
      echo '<h4>Добро пожаловать <span style="color:red;">'. $_SESSION['login'] .
      '</span> - вы вошли как <span style="color:red;">'.$_SESSION['name']."\r\n".'<p><a href="exit.php">Выйти.</a></p>';
   }?></td>
</tr> <!--ряд с ячейками тела таблицы-->
<tr></tr>
</table>

</body>
</html>