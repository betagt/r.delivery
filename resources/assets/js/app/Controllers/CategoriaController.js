module.exports = function ($scope, $http, $uibModal, $log) {

  $scope.titulo = '';
  $scope.editing = false;
  $scope.loading = false;
  $scope.estabelecimento = '';
  $scope.entity = {};
  $scope.token = '';

  $scope.listagem = {};
  $scope.total = 0;
  $scope.perPage = 10;

  $scope.errors = {};
  $scope.message = 'teste 123';

  $scope.animationsEnabled = true;

  $scope.openModal = function () {
    var modalInstance = $uibModal.open({
      animation: $scope.animationsEnabled,
      ariaLabelledBy: 'modal-title',
      ariaDescribedBy: 'modal-body',
      templateUrl: 'myModalContent.html',
      controller: 'ModalInstanceCtrl',
      resolve: {
        message: function () {
          return $scope.message;
        }
      }
    });
  };

  $scope.pagination = {
    current: 1
  };

  $scope.init = function (id) {
    $scope.estabelecimento = id;

    listar(id, 1);
  };

  $scope.pageChanged = function (pagina) {
    listar($scope.estabelecimento, pagina);
  };

  function listar(id, pagina) {
    $http.get('/ajax/categorias/' + id + '?page=' + pagina)
      .then(function (result) {
        $scope.listagem = result.data;

        $scope.total = result.data.meta.pagination.total;
      });
  };

  $scope.loadEntity = function (entity) {
    $scope.titulo = "Alterar Registro: " + entity.name;

    $scope.entity = entity;

    editForm(true);
  };

  var getToken = function () {
    $http.get('/ajax/token').success(function (result, status) {
      $scope.token = result;
    });
  };

  var editForm = function (checkOption) {
    $scope.message = '';

    $scope.errors = {};
    $scope.loading = false;

    $scope.editing = checkOption;
    if (checkOption) {
      getToken();
    }
  };

  $scope.novo = function (parent = 0) {
    $scope.titulo = "Adicionar Categoria";

    $scope.entity = {
      'estabelecimento_id': $scope.estabelecimento,
      'parent_id': parent,
      'name': '',
      'tipo': 1,
      'multi': 1
    };

    editForm(true);
  };

  $scope.cancelEntity = function () {
    $scope.entity = {};

    editForm(false);
  };

  $scope.delete = function (key, entity) {
    $http.get('/ajax/categorias/delete/' + entity.id)
      .success(function (data) {
        $scope.message = data;

        $scope.openModal();

        $scope.listagem.data.splice(key, 1);

        if ($scope.listagem.data.length  == 0)
        {
          listar($scope.estabelecimento, 1);
        }

        editForm(false);

        $scope.entity = {};
      })
      .error(function (data, status) {
          if (status == 422) {
            $scope.errors = data;

            $scope.loading = false;
          }
        }
      );
  };

  $scope.saveEntity = function (entity) {
    $scope.loading = true;
    if ($scope.entity.id) {
      $http.put('/ajax/categorias/update/' + $scope.entity.id, entity)
        .success(function (data) {
          $scope.message = data;

          $scope.openModal();

          editForm(false);

          $scope.entity = {};
        })
        .error(function (data, status) {
            if (status == 422) {
              $scope.errors = data;

              $scope.loading = false;
            }
          }
        );
    }
    else {
      $http.post('/ajax/categorias/create', entity)
        .success(function (data) {
          $scope.message = data;

          $scope.openModal();

          $scope.entity.id = data.id;

          $scope.listagem.data.unshift($scope.entity);

          editForm(false);

          $scope.entity = {};
        })
        .error(function (data, status) {
            if (status == 422) {
              $scope.errors = data;

              $scope.loading = false;
            }
          }
        );
    }
  };
};

