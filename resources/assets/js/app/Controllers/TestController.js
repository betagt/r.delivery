module.exports = function ($scope, $http, $log) {
  $scope.edit = false;
  $scope.loadList = false;
  $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';

  $scope.estabelecimento = '';
  $scope.categoria = {};
  $scope.lista = {};

  $scope.init = function (id) {
    $scope.estabelecimento = id;

    $scope.listar();
  };

  $scope.listar = function () {
    $scope.loadList = true;
    $http.get('/ajax/categorias/' + $scope.estabelecimento)
      .then(function (result) {
        $scope.lista = result.data;

        $scope.loadList = false;
      });
  };

  $scope.novo = function(id=0)
  {
    $scope.editing(true);

    $scope.categoria = {
      'parent_id' : id,
      'name': '',
      'tipo': 1,
      'multi': 1
    };
  };

  $scope.editing = function(check)
  {
    $scope.edit = check;
    $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
    if (check)
    {
      $scope.column = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';
    }
    return;
  };

  $scope.loadCategoria = function(categoria)
  {
    $scope.categoria = categoria;

    $scope.editing(true);
  }
};

