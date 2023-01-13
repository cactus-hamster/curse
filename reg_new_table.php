<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf8_general_ci">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-resource.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<title>Система учета успеваемости</title>
</head>
<body align="center">
<table>
<tr><td width = '300px'></td><td></td></tr> <!--ряд с ячейками заголовков-->
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
          echo'<td><button class="btn btn-primary btn-sm" onclick="location.href=';
          echo "'registration.php'";
          echo'">Добавить пользователя</button></td><td></td></tr>';

          echo '<tr>';
          echo'<td><button class="btn btn-secondary btn-sm" onclick="location.href=';
          echo "'reg_new_table.php'";
          echo'">Добавить группу</button></td><td></td></tr>';
      }
      ?>
      
    </table>
  </td>
  <td align="center" vertical-align="middle" >
  <div ng-app="myApp" ng-controller="myCtrl" >

<div class="row" >
    <div class="col-md-4" >
        <h1>3133</h1>
        <table class="table table-success table-striped">
            <tr ng-repeat="i in items">
                <td >{{i.id}}</td>
                <td style="width:900px">{{i.value}}</td>
                <td style="width:600px; ">
                <center><button class="btn btn-info" ng-click="editItem(i)">Редактировать</button>     
                  <button class="btn btn-danger" ng-click="removeItem(i)">Удалить</button>
                  </center></td>
            </tr>
        </table>

        <form class="form-group">
            <input class="form-control" type="text" ng-model="newItem" style="width:200px"></input>
            <button class="btn btn-success" ng-click="addItem(newItem)">Добавить</button>
        </form>
    </div>
</div>
</div>

<script>

angular.module('myApp',['ngResource']);

var app = angular.module('myApp', ['ngResource']);

app.factory('provider', function ($resource){
return {
    items : $resource('items.php?id=:id', {id: '@id'},
        {
            create : {method:'PUT', params:{add:true}, url:'items.php'}
        })
};
});

app.controller('myCtrl', ['$scope', 'provider', function($scope, provider) {

$scope.addItem = function(text)
{
    provider.items.create({value:text}, function(it){
            $scope.items.push(it);
        });
}

$scope.removeItem = function(item)
{
    provider.items.remove({id:item.id},
        function(){
            $scope.items.splice($scope.items.indexOf(item), 1);
        });
}

$scope.editItem = function(item)
{
    bootbox.prompt("Correct '"+item.value+"'", function(result) {
        if (result === null) 
        {
        } 
        else {
            provider.items.save({id:item.id, value:result}, function(){
                item.value = result;
            });
        }
    });
}

$scope.items = provider.items.query();
}]);
</script>
 </td>
</tr> <!--ряд с ячейками тела таблицы-->
<tr></tr>
</table>
</body>
</html>