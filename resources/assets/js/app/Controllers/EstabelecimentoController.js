module.exports = function ($scope, $http) {

  $scope.listagem = [];
  $scope.listagemCidades = [];
  $scope.title = "Cadastrar Registro";
  $scope.editing = false;
  $scope.column = 'col-md-12';
  $scope.entity = {};
  $scope.token = '';

  $scope.total = 0;
  $scope.perPage = 3;

  $scope.pagination = {
    current: 1
  };

  $scope.pageChanged = function (pagina) {
    listar(pagina);
  };

  function listar(pagina) {
    $http.get('/ajax/estabelecimentos?page=' + pagina)
      .then(function (result) {
        $scope.listagem = result.data;

        $scope.total = result.data.meta.pagination.total;
      });
  }

  listar(1);

  var listarCidades = function () {
    $http.get('/ajax/cidades').success(function (result, status) {
      $scope.listagemCidades = result.data;
    });
  };

  var getToken = function () {
    $http.get('/ajax/token').success(function (result, status) {
      $scope.token = result;
    });
  };

  var editForm = function (checkOption) {
    $scope.editing = checkOption;
    $scope.column = 'col-md-12';
    if (checkOption) {
      $scope.column = 'col-md-6';
      getToken();
    }
  };

  $scope.loadEntity = function (entity) {
    $scope.title = "Alterar Registro";

    listarCidades();

    $scope.entity = entity;

    editForm(true);
  };

  $scope.novo = function () {
    $scope.title = "Cadastrar Registro";

    listarCidades();

    $scope.entity = null;

    editForm(true);
  };

  $scope.cancelEntity = function () {
    $scope.entity = null;

    editForm(false);
  }

  $scope.saveEntity = function (entity) {

    if ($scope.entity.id) {
      alert('teste');
    } else {
      $http.post('/admin/estabelecimentos/save', entity).success(function (data, status) {
        listar(1);
      });

      delete $scope.entity;
    }

    editForm(false);

    $scope.entity = null;
  };

  $scope.removeEntity = function (entity) {

  };
};

