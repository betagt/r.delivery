app.controller('EstabelecimentoController', function($scope, $http){
  $scope.listagem = [];
  $scope.editing = false;
  $scope.entity = {};

  var listar = function () {
    $http.get('/admin/estabelecimentos/ajax/listar').success(function (data, status) {
      $scope.listagem = data;
    });
  };

  listar();

  $scope.loadEntity = function(entity) {
    $scope.entity = entity;
  };

  $scope.novo = function () {

  };

  $scope.saveEntity = function(entity) {

  };

  $scope.editEntity = function(entity) {

  };

  $scope.removeEntity = function(entity) {

  };

});


